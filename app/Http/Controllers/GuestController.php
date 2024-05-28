<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
  public function index()
  {
    $foodProducts = Products::where('category_id', 1)->get();
    $fashionProducts = Products::where('category_id', 2)->get();
    $parfumeProducts = Products::where('category_id', 3)->get();
    $beautyProducts = Products::where('category_id', 4)->get();
    return view('pages.home', compact('fashionProducts', 'parfumeProducts', 'foodProducts', 'beautyProducts'));
  }

  public function products(Request $request)
  {
    if ($request->search) {
      $query = $request->input('search');
      $products = Products::where('name', 'LIKE', "%{$query}%")->get();
      $totalProducts = $products->count();
    } else {
      $products = Products::orderBy('category_id', 'asc')->get();
      $totalProducts = $products->count();
    }
    $category = ProductCategory::pluck('name', 'id')->toArray();
    return view('pages.products', compact('products', 'totalProducts', 'category'));
  }

  public function faq()
  {
    return view('pages.faq');
  }

  public function product(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('pages.detail-product', compact('product', 'relatedProducts'));
  }
}
