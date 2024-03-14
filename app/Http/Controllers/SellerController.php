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

  public function settings()
  {
    return view('seller.settings');
  }
}
