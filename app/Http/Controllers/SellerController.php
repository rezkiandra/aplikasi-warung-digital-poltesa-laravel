<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function dashboard()
  {
    return view('seller.dashboard');
  }

  public function orders()
  {
    return view('seller.orders.index');
  }

  public function settings()
  {
    return view('seller.settings');
  }
}
