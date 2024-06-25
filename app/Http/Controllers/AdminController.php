<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Products;
use App\Models\BankAccount;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  public function dashboard()
  {
    $bulanJan = date('01');
    $bulanFeb = date('02');
    $bulanMar = date('03');
    $bulanApr = date('04');
    $bulanMei = date('05');
    $bulanJun = date('06');
    $bulanJul = date('07');
    $bulanAgu = date('08');
    $bulanSep = date('09');
    $bulanOkt = date('10');
    $bulanNov = date('11');
    $bulanDes = date('12');

    $tahun = Carbon::now()->year;
    $data = [
      'labels'  => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      'sudah bayar'    => [
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'belum bayar'  => [
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'kadaluarsa'  => [
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'dibatalkan'  => [
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
    ];

    $totalSeller = Seller::count();
    $totalCustomer = Customer::count();
    $totalProduct = Products::count();
    $totalOrder = Order::count();

    $topSellers = Order::selectRaw('seller_id, count(*) as total')
      ->where('orders.status', 'sudah bayar')
      ->groupBy('seller_id')
      ->selectRaw('SUM(orders.total_price) as total_price')
      ->orderBy('total_price', 'desc')
      ->take(5)
      ->get();

    $topCustomers = Order::selectRaw('customer_id, count(*) as total')
      ->where('orders.status', 'sudah bayar')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

    $topProducts = Order::select('product_id', DB::raw('SUM(quantity) as total'))
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->orderBy('products.price', 'desc')
      ->take(5)
      ->get();

    $users = User::with('seller', 'customer')->orderBy('role_id', 'asc')->paginate(8);
    return view('admin.dashboard', compact('data', 'totalSeller', 'totalCustomer', 'totalProduct', 'totalOrder', 'topSellers', 'topCustomers', 'topProducts', 'users'));
  }

  public function sellers()
  {
    $sellers = Seller::paginate(10);
    $sellerCount = Seller::all()->count();
    $activeSeller = Seller::where('status', 'active')->count();
    $inactiveSeller = Seller::where('status', 'inactive')->count();
    $pendingSeller = Seller::where('status', 'pending')->count();

    return view('admin.sellers.index', compact('sellers', 'sellerCount', 'activeSeller', 'inactiveSeller', 'pendingSeller'));
  }

  public function customers()
  {
    $customers = Customer::paginate(10);
    $customerCount = $customers->count();
    $activeCustomer = Customer::where('status', 'active')->count();
    $inactiveCustomer = Customer::where('status', 'inactive')->count();
    $pendingCustomer = Customer::where('status', 'pending')->count();

    return view('admin.customers.index', compact('customers', 'customerCount', 'activeCustomer', 'inactiveCustomer', 'pendingCustomer'));
  }

  public function users()
  {
    $users = User::orderBy('role_id', 'asc')->paginate(10);
    $totalUsers = User::count();
    $totalAdmins = User::join('roles', 'users.role_id', '=', 'roles.id', 'left')->where('role_name', 'Admin')->count();
    $totalSellers = User::join('roles', 'users.role_id', '=', 'roles.id', 'left')->where('role_name', 'Seller')->count();
    $totalCustomers = User::join('roles', 'users.role_id', '=', 'roles.id', 'left')->where('role_name', 'Customer')->count();
    return view('admin.users.index', compact('users', 'totalUsers', 'totalAdmins', 'totalSellers', 'totalCustomers'));
  }

  public function products()
  {
    $products = Products::paginate(10);
    $totalProducts = Products::count();
    $categories = ProductCategory::pluck('name', 'id')->toArray();

    $totalTopSale = Order::where('product_id', '>=', 3)->count();
    $totalDiscount = 0;
    $totalOutOfStock = Products::where('stock', '=', 0)->count();
    return view('admin.products.index', compact('products', 'totalProducts', 'categories', 'totalTopSale', 'totalDiscount', 'totalOutOfStock'));
  }

  public function orders()
  {
    $orders = Order::paginate(10);
    $totalPaid = Order::where('status', 'sudah bayar')->count();
    $totalUnpaid = Order::where('status', 'belum bayar')->count();
    $totalExpire = Order::where('status', 'kadaluarsa')->count();
    $totalCancelled = Order::where('status', 'dibatalkan')->count();

    return view('admin.orders.index', compact('orders', 'totalPaid', 'totalUnpaid', 'totalExpire', 'totalCancelled'));
  }

  public function detailOrder(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    return view('admin.orders.detail', compact('order'));
  }

  public function roles()
  {
    $roles = Role::all();
    $user_level = User::where('role_id', 1)->get('name');
    return view('admin.roles.index', compact('roles', 'user_level'));
  }

  public function product_category()
  {
    $category = ProductCategory::paginate(10);
    return view('admin.product_category.index', compact('category'));
  }

  public function bank_account()
  {
    $banks = BankAccount::paginate(10);
    return view('admin.bank_account.index', compact('banks'));
  }

  public function settings()
  {
    $user = User::where('role_id', '1')->first();
    return view('admin.settings.index', compact('user'));
  }
}
