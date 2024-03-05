<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
  public function createSeller()
  {
    return view('admin.sellers.create');
  }

  public function storeSeller(SellerRequest $request)
  {
    Seller::create([
      'uuid' => Str::uuid('id'),
      'user_id' => $request->user_id,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('sellers', 'public'),
      'account_number' => $request->account_number,
      'status' => $request->status,
    ]);

    Alert::toast('Successfully created new seller', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.sellers');
  }

  public function showSeller(string $slug)
  {
    $seller = Seller::where('slug', $slug)->firstOrFail();
    return view('admin.sellers.detail', compact('seller'));
  }

  public function editSeller(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    return view('admin.sellers.edit', compact('seller'));
  }

  public function updateSeller(SellerRequest $request, string $uuid)
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
        'user_id' => $request->user_id,
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $request->status,
      ]);
    }

    Alert::toast('Successfully updated seller', 'success');
    return redirect()->route('admin.sellers');
  }

  public function destroySeller(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $seller->delete();

    if ($seller->image) {
      Storage::delete('public/' . $seller->image);
    }

    Alert::toast('Successfully deleted seller', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.sellers');
  }

  public function createCustomer()
  {
    return view('admin.customers.create');
  }

  public function storeCustomer(CustomerRequest $request)
  {
    Customer::create([
      'uuid' => Str::uuid('id'),
      'user_id' => $request->user_id,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('sellers', 'public'),
      'account_number' => $request->account_number,
      'status' => $request->status,
    ]);

    Alert::toast('Successfully created new customer', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.customers');
  }

  public function showCustomer(string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    return view('admin.customers.detail', compact('customer'));
  }

  public function editCustomer(string $uuid)
  {
    $customer = Customer::where('uuid', $uuid)->firstOrFail();
    return view('admin.customers.edit', compact('customer'));
  }

  public function updateCustomer(CustomerRequest $request, string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    $customerImage = Customer::where('slug', $slug)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($customerImage) {
        Storage::delete('public/' . $customerImage);
      }
      $customer->update([
        'image' => $request->image->store('customer', 'public'),
      ]);
    } else {
      $customer->update([
        'user_id' => $request->user_id,
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $request->status,
      ]);
    }

    Alert::toast('Successfully updated customer', 'success');
    return redirect()->route('admin.customers');
  }

  public function destroyCustomer(string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    $customer->delete();

    if ($customer->image) {
      Storage::delete('public/' . $customer->image);
    }

    Alert::toast('Successfully deleted customer', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.customers');
  }

  public function createUser()
  {
    return view('admin.users.create');
  }

  public function storeUser(UserRequest $request)
  {
    User::create([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $request->role_id,
      'password' => $request->password,
    ]);

    Alert::toast('Successfully created new user', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.users');
  }

  public function showUser(string $slug)
  {
    $user = User::where('slug', $slug)->firstOrFail();
    return view('admin.customers.detail', compact('user'));
  }

  public function editUser(string $uuid)
  {
    $user = User::where('uuid', $uuid)->firstOrFail();
    return view('admin.customers.edit', compact('user'));
  }

  public function updateUser(UserRequest $request, string $uuid)
  {
    $user = User::where('uuid', $uuid)->firstOrFail();
    $user->update([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $request->role_id,
      'password' => $request->password,
    ]);

    Alert::toast('Successfully updated customer', 'success');
    return redirect()->route('admin.users');
  }

  public function destroyUser(string $slug)
  {
    $user = User::where('slug', $slug)->firstOrFail();
    $user->delete();

    Alert::toast('Successfully deleted user', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.users');
  }
}
