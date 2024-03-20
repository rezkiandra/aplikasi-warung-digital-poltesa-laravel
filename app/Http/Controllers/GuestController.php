<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
  public function index()
  {
    return view('pages.home');
  }

  public function products()
  {
    $products = Products::all();
    return view('pages.products', compact('products'));
  }

  public function product(string $slug)
  {

    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('pages.detail-product', compact('product', 'relatedProducts')); 
  }
}
