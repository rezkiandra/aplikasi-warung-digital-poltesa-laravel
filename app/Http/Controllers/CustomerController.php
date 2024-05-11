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
use App\Models\Wishlist;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
  public function index()
  {
    return view('customer.home');
  }

  public function dashboard()
  {
    if (Auth::user()->customer) {
      $orders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->orderBy('created_at', 'desc')->paginate(5);
    } else {
      $orders = collect([]);
    }
    return view('customer.dashboard', compact('orders'));
  }

  public function products(Request $request)
  {
    $filter = $request->input('filter');
    $query = Products::query();

    if ($filter) {
      $products = $query->where('category_id', $filter)->get();
    } else {
      $products = Products::orderBy('category_id', 'asc')->get();
    }

    return view('customer.products', compact('products'));
  }

  public function faq()
  {
    return view('customer.faq');
  }

  public function product(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    return view('pages.detail-product', compact('product'));
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

  public function wishlist()
  {
    if (Auth::user()->customer) {
      $wishlists = Wishlist::where('customer_id', Auth::user()->customer->id)->get();
    } else {
      $wishlists = collect([]);
    }
    return view('customer.wishlist', compact('wishlists'));
  }

  public function orders()
  {
    if (Auth::user()->customer) {
      $orders = Order::with('product')->where('customer_id', Auth::user()->customer->id)->orderBy('created_at', 'asc')->paginate(8);
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
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->new_password) ?? $userCustomer->password,
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
