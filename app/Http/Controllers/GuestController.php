<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
  public function index()
  {
    $topProducts = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('status', 'paid')->orderBy('total_price', 'desc')->limit(4)->get('products.*', 'orders.*');
    return view('pages.home', compact('topProducts'));
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
