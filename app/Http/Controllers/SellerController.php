<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Products;

class SellerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function dashboard()
  {
    if (auth()->user()->seller) {
      $products = Products::where('seller_id', Auth::user()->seller->id)->orderBy('created_at', 'desc')->paginate(6) ?? collect([]);
      return view('seller.dashboard', compact('products'));
    } else {
      $products = collect([]);
      return view('seller.anonymous', compact('products'));
    }
  }

  public function orders()
  {
    return view('seller.orders.index');
  }

  public function orderDetail(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('seller.orders.detail', compact('order'));
  }

  public function settings()
  {
    return view('seller.settings');
  }

  public function updateProfile(UserRequest $request, string $uuid)
  {
    $userSeller = User::where('uuid', $uuid)->firstOrFail();
    $userSeller->update([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $userSeller->role_id,
      'password' => $userSeller->password ?? Hash::make($request->new_password),
    ]);

    Alert::toast('Berhasil update profile', 'success');
    return redirect()->back();
  }
}
