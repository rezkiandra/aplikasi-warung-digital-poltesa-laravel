<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\ProductsCart;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
  public function __construct()
  {
    Config::$serverKey = config('midtrans.sandbox_server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');
  }

  public function index()
  {
    return view('customer.home');
  }

  public function dashboard()
  {
    return view('customer.dashboard');
  }

  public function products()
  {
    $products = Products::all();
    return view('customer.products', compact('products'));
  }

  public function product(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('pages.detail-product', compact('product', 'relatedProducts'));
  }

  public function biodata()
  {
    $customer = Customer::where('user_id', Auth::user()->id)->get();
    return view('customer.biodata', compact('customer'));
  }

  public function cart()
  {
    if (Auth::user()->customer) {
      $carts = ProductsCart::where('customer_id', Auth::user()->customer->id)->get();
    } else {
      $carts = collect([]);
    }
    return view('customer.cart', compact('carts'));
  }

  public function orders()
  {
    if (Auth::user()->customer) {
      // $orders = Order::where('customer_id', Auth::user()->customer->id)->get();
      $orders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->get();
    } else {
      $orders = collect([]);
    }
    return view('customer.orders', compact('orders'));
  }

  public function settings()
  {
    return view('customer.settings');
  }

  public function updateProfile(UserRequest $request, string $uuid)
  {
    $userCustomer = User::where('uuid', $uuid)->firstOrFail();
    $userCustomer->update([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $userCustomer->role_id,
      'password' => $userCustomer->password ?? Hash::make($request->new_password),
    ]);

    Alert::toast('Berhasil update profile', 'success');
    return redirect()->back();
  }

  public function store(BiodataRequest $request)
  {
    Customer::create([
      'uuid' => Str::uuid('id'),
      'user_id' => Auth::user()->id,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('customers', 'public'),
      'account_number' => $request->account_number,
    ]);

    Alert::toast('Successfully added biodata', 'success');
    return redirect()->route('customer.biodata');
  }

  public function update(BiodataRequest $request, string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    $customerImage = Customer::where('uuid', $uuid)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($customerImage) {
        Storage::delete('public/' . $customerImage);
      }
      $customer->update([
        'image' => $request->image->store('customers', 'public'),
      ]);
    } else {
      $customer->update([
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $customer->status,
      ]);
    }

    Alert::toast('Successfully updated biodata', 'success');
    return redirect()->route('customer.biodata');
  }
}
