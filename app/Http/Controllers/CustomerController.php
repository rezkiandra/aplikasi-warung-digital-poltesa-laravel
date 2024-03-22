<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
  public function index()
  {
    return view('customer.home');
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
    return view('customer.detail-product', compact('product', 'relatedProducts'));
  }
}
