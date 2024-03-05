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

  public function createCustomer()
  {
    return view('admin.customers.create');
  }

  public function storeSeller(SellerRequest $request)
  {
    Seller::create([
      'user_id' => $request->user_id,
      'uuid' => Str::uuid('id'),
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

  public function storeCustomer(CustomerRequest $request)
  {
    Customer::create([
      'full_name' => $request->full_name,
      'uuid' => Str::uuid('id'),
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('customers', 'public'),
      'account_number' => $request->account_number,
    ]);

    Alert::toast('Successfully created new customer', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.customers');
  }

  public function showSeller(string $slug)
  {
    $seller = Seller::where('slug', $slug)->firstOrFail();
    return view('admin.sellers.detail', compact('seller'));
  }

  public function showCustomer(string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    return view('admin.customers.detail', compact('customer'));
  }

  public function editSeller(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    return view('admin.sellers.edit', compact('seller'));
  }

  public function editCustomer(string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    return view('admin.customers.edit', compact('customer'));
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

  public function updateCustomer(CustomerRequest $request, string $slug)
  {
    $customer = Customer::where('slug', $slug)->firstOrFail();
    $customerImage = Customer::where('slug', $slug)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($customerImage) {
        Storage::delete('public/' . $customerImage);
      }
      $customer->update([
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'image' => $request->image->store('customer', 'public'),
        'account_number' => $request->account_number,
      ]);
    }

    Alert::toast('Successfully updated customer', 'success');
    return redirect()->route('admin.customers');
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
}
