<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Products;
use App\Models\Shipping;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use App\Models\ProductsCart;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Requests\UpdateBiodataRequest;

class CustomerController extends Controller
{
  protected $api_key;
  protected $endpoint;

  public function __construct()
  {
    $this->api_key = config('rajaongkir.key');
    $this->endpoint = config('rajaongkir.endpoint');
  }

  public function index()
  {
    $categories = ProductCategory::has('product')->get('slug');
    $data = [
      'foodProducts' => $this->getTopProductsByCategory('makanan'),
      'beautyProducts' => $this->getTopProductsByCategory('kecantikan'),
    ];

    return view('customer.home', compact('categories', 'data'));
  }

  public function dashboard()
  {
    if (!auth()->user()->customer) {
      return view('customer.anonymous', ['orders' => collect([])]);
    }

    $bulan = [
      'Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04',
      'Mei' => '05', 'Jun' => '06', 'Jul' => '07', 'Agu' => '08',
      'Sep' => '09', 'Okt' => '10', 'Nov' => '11', 'Des' => '12'
    ];
    $tahun = Carbon::now()->year;
    $customerId = auth()->user()->customer->id;

    $data = [
      'labels' => array_keys($bulan),
      'data' => []
    ];

    foreach ($bulan as $monthName => $monthNumber) {
      $totalOrders = Order::where('customer_id', $customerId)
        ->where('status', 'sudah bayar')
        ->whereYear('created_at', $tahun)
        ->whereMonth('created_at', $monthNumber)
        ->sum('total_price');

      $totalShipping = Shipping::join('orders', 'shippings.order_id', '=', 'orders.id')
        ->where('orders.customer_id', $customerId)
        ->where('shippings.status', 'diterima')
        ->whereYear('shippings.created_at', $tahun)
        ->whereMonth('shippings.created_at', $monthNumber)
        ->sum('shippings.price');

      $data['data'][] = $totalOrders + $totalShipping;
    }

    $orders = Order::where('customer_id', $customerId)->get();
    $spent = $orders->where('status', 'sudah bayar');
    $shippingCost = Shipping::where('customer_id', $customerId)->where('status', 'diterima')->sum('price');

    $topProducts = Order::select('product_id', DB::raw('SUM(quantity) as total'))
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('orders.customer_id', $customerId)
      ->where('status', 'sudah bayar')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->orderBy('products.price', 'desc')
      ->take(5)
      ->get();

    $stats = [
      'paid' => $spent->count(),
      'unpaid' => $orders->where('status', 'belum bayar')->count(),
      'expired' => $orders->where('status', 'kadaluarsa')->count(),
      'cancelled' => $orders->where('status', 'dibatalkan')->count(),
      'spentValue' => 'Rp ' . number_format($spent->sum('total_price') + $shippingCost, 0, ',', '.'),
      'shippingCost' => 'Rp ' . number_format($shippingCost, 0, ',', '.'),
      'titleSpent' => 'Pengeluaran',
      'descSpent' => 'Total pengeluaran keseluruhan',
    ];

    $labelCart = 'Keranjang Produk';
    $valueCart = ProductsCart::where('customer_id', $customerId)->count();

    $labelWishlist = 'Wishlist Produk';
    $valueWishlist = Wishlist::where('customer_id', $customerId)->count();

    $orders = Order::with('product')->where('customer_id', $customerId)
      ->orderBy('created_at', 'desc')
      ->paginate(6);

    return view('customer.dashboard', compact(
      'orders',
      'data',
      'stats',
      'topProducts',
      'labelCart',
      'valueCart',
      'labelWishlist',
      'valueWishlist'
    ));
  }

  public function products(Request $request)
  {
    $query = $request->input('search');
    $categorySlug = $request->input('category');

    $products = Products::query();

    if ($query) {
      $products->where('name', 'LIKE', "%{$query}%");
    }

    if ($categorySlug) {
      $category = ProductCategory::where('slug', $categorySlug)->first();
      if ($category) {
        $products->where('category_id', $category->id);
      }
    }

    $products = $products->orderBy('category_id', 'asc')->get();
    $totalProducts = $products->count();

    return view('pages.products', compact('products', 'totalProducts'));
  }

  public function faq()
  {
    return view('customer.faq');
  }

  public function product(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)
      ->where('id', '!=', $product->id)
      ->get();

    return view('customer.detail-product', compact('product', 'relatedProducts'));
  }

  public function biodata()
  {
    $gender = ['laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'];
    $currentCustomer = Customer::where('user_id', Auth::user()->id)->first();
    $customer = Customer::where('user_id', Auth::user()->id)->get();

    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];
    $city_id = $customer->pluck('origin')->first();
    $city_name = $this->getCityName($city_id);

    return view('customer.biodata', compact('customer', 'cities', 'city_name', 'gender', 'currentCustomer'));
  }

  public function cart()
  {
    $carts = Auth::user()->customer
      ? ProductsCart::where('customer_id', Auth::user()->customer->id)->get()
      : collect([]);

    return view('customer.cart', compact('carts'));
  }

  public function wishlist()
  {
    $wishlists = Auth::user()->customer
      ? Wishlist::where('customer_id', Auth::user()->customer->id)->get()
      : collect([]);

    $user_role = Auth::user()->role_id ?? '';
    return view('customer.wishlist', compact('wishlists', 'user_role'));
  }

  public function orders()
  {
    $customerId = Auth::user()->customer->id ?? null;

    $orders = $customerId
      ? Order::with('product')->where('customer_id', $customerId)->orderBy('created_at', 'desc')->paginate(8)
      : collect([]);

    $orderCounts = [
      'paid' => Order::where('customer_id', $customerId)->where('status', 'sudah bayar')->count(),
      'unpaid' => Order::where('customer_id', $customerId)->where('status', 'belum bayar')->count(),
      'expire' => Order::where('customer_id', $customerId)->where('status', 'kadaluarsa')->count(),
      'cancelled' => Order::where('customer_id', $customerId)->where('status', 'dibatalkan')->count(),
    ];

    return view('customer.orders', compact('orders', 'orderCounts'));
  }

  public function settings()
  {
    $userCustomer = User::where('uuid', Auth::user()->uuid)->first();
    return view('customer.settings', compact('userCustomer'));
  }

  public function updateProfile(UserRequest $request, string $uuid)
  {
    $userCustomer = User::where('uuid', $uuid)->firstOrFail();

    $userCustomer->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->new_password
        ? Hash::make($request->new_password)
        : $userCustomer->password,
    ]);

    Alert::toast('Berhasil update profile', 'success');
    return redirect()->back();
  }

  public function store(BiodataRequest $request)
  {
    Customer::create([
      'uuid' => Str::uuid(),
      'user_id' => Auth::user()->id,
      'nik_nim' => $request->nik_nim,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'origin' => $request->origin,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'image' => $request->image->store('customers', 'public'),
      'status' => 'active',
    ]);

    Alert::toast('Berhasil menambahkan biodata', 'success');
    return redirect()->route('customer.biodata');
  }

  public function update(UpdateBiodataRequest $request, string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    $customerImage = $customer->image;

    if ($request->hasFile('image')) {
      if ($customerImage) {
        Storage::delete('public/' . $customerImage);
      }
      $customer->update([
        'image' => $request->image->store('customers', 'public'),
      ]);
    }

    $customer->update($request->only([
      'nik_nim', 'full_name', 'slug', 'address', 'origin', 'phone_number', 'gender', 'status'
    ]));

    Alert::toast('Berhasil mengupdate biodata', 'success');
    return redirect()->route('customer.biodata');
  }

  private function getCityName($city_id)
  {
    $response = Http::get("{$this->endpoint}/city", [
      'key' => $this->api_key,
    ]);

    $cities = $response->json()['rajaongkir']['results'] ?? [];

    foreach ($cities as $city) {
      if ($city['city_id'] == $city_id) {
        return $city['city_name'];
      }
    }

    return null;
  }

  private function getTopProductsByCategory($categorySlug)
  {
    return Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('product_categories', 'products.category_id', '=', 'product_categories.id', 'left')
      ->where('product_categories.slug', $categorySlug)
      ->where('status', 'sudah bayar')
      ->orderBy('products.price', 'desc')
      ->orderBy('quantity', 'desc')
      ->take(4)
      ->get(['products.*', 'orders.*']);
  }
}
