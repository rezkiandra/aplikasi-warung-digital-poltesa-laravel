<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Products;
use App\Models\Wishlist;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use App\Models\ProductsCart;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditSellerRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\EditCustomerRequest;

class UserController extends Controller
{
  protected $api_key;
  protected $endpoint;

  public function __construct()
  {
    $this->api_key = config('rajaongkir.key');
    $this->endpoint = config('rajaongkir.endpoint');
  }

  public function createSeller()
  {
    $user = User::where('role_id', '2')
      ->join('sellers', 'users.id', '=', 'sellers.user_id', 'left')
      ->where('sellers.user_id', null)
      ->pluck('name', 'users.id')
      ->toArray();

    $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
    ];
    $status = [
      'active' => 'Aktif',
      'inactive' => 'Tidak Aktif',
      'pending' => 'pending',
    ];
    $bank = BankAccount::pluck('bank_name', 'id')->toArray();

    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];
    return view('admin.sellers.create', compact('user', 'gender', 'status', 'bank', 'cities'));
  }

  public function storeSeller(SellerRequest $request)
  {
    Seller::create([
      'uuid' => Str::uuid('id'),
      'user_id' => $request->user_id,
      'nik_nim' => $request->nik_nim,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'origin' => $request->origin,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('sellers', 'public'),
      'account_number' => $request->account_number,
      'status' => $request->status,
    ]);

    Alert::toast('Berhasil menambahkan penjual', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.sellers');
  }

  public function showSeller(string $slug)
  {
    $seller = Seller::where('slug', $slug)->firstOrFail();
    $products = Products::where('seller_id', $seller->id)->orderBy('id', 'desc')->paginate(5);

    $totalProducts = Products::where('seller_id', $seller->id)->count();
    $totalEarnings = Order::where('seller_id', $seller->id)->where('status', 'sudah bayar')->sum('total_price');
    $totalEarnings = number_format($totalEarnings, 0, ',', '.');

    $bank = BankAccount::pluck('bank_name', 'id')->toArray();
    $username = User::where('id', $seller->user_id)->first()->name;
    $email = User::where('id', $seller->user_id)->first()->email;
    $seller_id = Str::substr($seller->uuid, 0, 5);
    $seller_id = Str::upper($seller_id);

    return view('admin.sellers.detail', compact('seller', 'products', 'totalProducts', 'totalEarnings', 'bank', 'username', 'email', 'seller_id'));
  }

  public function editSeller(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $user = User::where('role_id', '2')->pluck('name', 'id')->toArray();
    $gender = [
      'Laki-laki' => 'laki-laki',
      'Perempuan' => 'perempuan',
    ];
    $status = [
      'active' => 'Aktif',
      'inactive' => 'Tidak Aktif',
      'pending' => 'Pending',
    ];
    $bank = BankAccount::pluck('bank_name', 'id')->toArray();

    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];

    $city_name = $this->getCityName($seller->origin);
    return view('admin.sellers.edit', compact('seller', 'user', 'gender', 'status', 'bank', 'cities', 'city_name'));
  }

  public function updateSeller(EditSellerRequest $request, string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $sellerImage = Seller::where('uuid', $uuid)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($sellerImage) {
        Storage::delete('public/' . $sellerImage);
      }
      $seller->update([
        'image' => $request->image->store('sellers', 'public'),
      ]);
    } else {
      $seller->update([
        'user_id' => $seller->user_id,
        'nik_nim' => $request->nik_nim,
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'origin' => $request->origin,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $request->status,
      ]);
    }

    Alert::toast('Berhasil mengupdate biodata penjual', 'success');
    return redirect()->route('admin.sellers');
  }

  public function destroySeller(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $seller->delete();

    if ($seller->image) {
      Storage::delete('public/' . $seller->image);
    }

    Alert::toast('Berhasil menghapus penjual', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.sellers');
  }

  public function createCustomer()
  {
    $user = User::where('role_id', '3')
      ->join('customers', 'users.id', '=', 'customers.user_id', 'left')
      ->where('customers.user_id', null)
      ->pluck('name', 'users.id')
      ->toArray();

    $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
    ];

    $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
    ];
    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];
    return view('admin.customers.create', compact('user', 'gender', 'status', 'cities'));
  }

  public function storeCustomer(CustomerRequest $request)
  {
    Customer::create([
      'uuid' => Str::uuid('id'),
      'user_id' => $request->user_id,
      'nik_nim' => $request->nik_nim,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'origin' => $request->origin,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'image' => $request->image->store('customers', 'public'),
      'status' => $request->status,
    ]);

    Alert::toast('Berhasil menambahkan pelanggan', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.customers');
  }

  public function showCustomer(string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    $orders = Order::where('customer_id', $customer->id)->orderBy('updated_at', 'desc')->paginate(5);
    $spentCost = Order::where('customer_id', $customer->id)->where('orders.status', 'paid')->sum('total_price');
    $spentCost = number_format($spentCost, 0, ',', '.');

    $totalOrder = Order::where('customer_id', $customer->id)->count();
    $totalCarts = ProductsCart::where('customer_id', $customer->id)->count();
    $totalWishlist = Wishlist::where('customer_id', $customer->id)->count();

    $username = User::where('id', $customer->user_id)->first()->name;
    $email = User::where('id', $customer->user_id)->first()->email;
    $customer_id = Str::substr($customer->uuid, 0, 5);
    $customer_id = Str::upper($customer_id);

    return view('admin.customers.detail', compact('customer', 'totalOrder', 'spentCost', 'totalCarts', 'totalWishlist', 'orders', 'username', 'email', 'customer_id'));
  }

  public function editCustomer(string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    $user = User::where('role_id', '2')->pluck('name', 'id')->toArray();
    $gender = [
      'male' => 'male',
      'female' => 'female',
    ];
    $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
    ];
    $bank = BankAccount::pluck('bank_name', 'id')->toArray();

    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];

    $city_name = $this->getCityName($customer->origin);
    return view('admin.customers.edit', compact('customer', 'user', 'gender', 'status', 'bank', 'cities', 'city_name'));
  }

  public function updateCustomer(EditCustomerRequest $request, string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    $customerImage = Customer::where('uuid', $uuid)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($customerImage) {
        Storage::delete('public/' . $customerImage);
      }
      $customer->update([
        'image' => $request->image->store('customer', 'public'),
      ]);
    } else {
      $customer->update([
        'user_id' => $customer->user_id,
        'nik_nim' => $request->nik_nim,
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'origin' => $request->origin,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'status' => $request->status,
      ]);
    }

    Alert::toast('Berhasil mengupdate biodata pelanggan', 'success');
    return redirect()->route('admin.customers');
  }

  public function destroyCustomer(string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    $customer->delete();

    if ($customer->image) {
      Storage::delete('public/' . $customer->image);
    }

    Alert::toast('Berhasil menghapus pelanggan', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.customers');
  }

  public function createUser()
  {
    $user = User::pluck('name', 'id')->toArray();
    $gender = [
      'male' => 'male',
      'female' => 'female',
    ];
    $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
    ];
    $role = Role::where('role_name', '!=', 'Admin')->pluck('role_name', 'id')->toArray();
    return view('admin.users.create', compact('user', 'gender', 'status', 'role'));
  }

  public function storeUser(AdminUserRequest $request)
  {
    User::create([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $request->role_id,
      'password' => Hash::make($request->password),
    ]);

    Alert::toast('Berhasil menambahkan pengguna', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.users');
  }

  public function showUser(string $slug)
  {
    $user = User::where('slug', $slug)->firstOrFail();
    $id = '#';
    if ($user->customer) {
      $image = asset('storage/' . $user->customer->image);
    } elseif ($user->seller) {
      $image = asset('storage/' . $user->seller->image);
    } elseif (auth()->user()->role_id == 1) {
      $image = asset('materio/assets/img/favicon/favicon.ico');
    } else {
      $image = asset('materio/assets/img/avatars/unknown.png');
    }
    $username = $user->name;
    $email = $user->email;
    $role = $user->role->role_name;
    $type = 'button';
    $href = route('admin.edit.user', $user->uuid);
    $variant = 'primary';
    $icon = 'pencil-outline me-2';
    $label = 'Edit Pengguna';
    $class = 'btn-sm w-100';

    $user_id = Hash::make($user->uuid);
    $user_id = Str::substr($user_id, 0, 10);
    $user_id = Str::replace('$', '', $user_id);
    $user_id = Str::upper($user_id);
    return view('admin.users.detail', compact('user', 'id', 'image', 'username', 'email', 'role', 'type', 'href', 'variant', 'icon', 'label', 'class', 'user_id'));
  }

  public function editUser(string $uuid)
  {
    $user = User::where('uuid', $uuid)->firstOrFail();
    $isDisabled = true;
    return view('admin.users.edit', compact('user', 'isDisabled'));
  }

  public function updateUser(UserRequest $request, string $uuid)
  {
    $user = User::where('uuid', $uuid)->firstOrFail();
    $user->update([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $request->role_id ?? $user->role_id,
      'password' => Hash::make($request->new_password) ?? $user->password,
    ]);

    Alert::toast('Berhasil mengupdate pengguna', 'success');
    return redirect()->route('admin.users');
  }

  public function destroyUser(string $uuid)
  {
    $user = User::where('uuid', $uuid)->firstOrFail();
    $user->delete();

    Alert::toast('Berhasil menghapus pengguna', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.users');
  }

  private function getCityName($city_id)
  {
    $response = Http::get("{$this->endpoint}/city", [
      'key' => $this->api_key,
    ]);

    $data = $response->json();

    if (isset($data['rajaongkir']['results']) && !empty($data['rajaongkir']['results'])) {
      foreach ($data['rajaongkir']['results'] as $result) {
        if ($result['city_id'] == $city_id) {
          return $result['city_name'];
        }
      }
    }

    return null;
  }
}
