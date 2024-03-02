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
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('sellers', 'public'),
    ]);

    Alert::toast('Successfully created new seller', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.sellers');
  }

  public function storeCustomer(CustomerRequest $request)
  {
    Customer::create([
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('customers', 'public'),
    ]);

    Alert::toast('Successfully created new customer', 'success');
    session()->flash('action', 'store');
    return redirect()->route('admin.customers');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}
