<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function dashboard()
  {
    return view('seller.dashboard');
  }

  public function products()
  {
    return view('seller.products.index');
  }

  public function orders()
  {
    return view('seller.orders');
  }

  public function bank_account()
  {
    return view('seller.bank_account');
  }
}
