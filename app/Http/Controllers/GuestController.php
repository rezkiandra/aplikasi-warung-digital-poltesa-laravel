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
    $categories = ProductCategory::has('product')->get('slug');
    $data = [
      'foodProducts' => $this->getTopProductsByCategory('makanan'),
      'beautyProducts' => $this->getTopProductsByCategory('kecantikan'),
    ];

    return view('pages.home', compact('categories', 'data'));
  }

  public function products(Request $request)
  {
    $query = $request->input('search');
    $categorySlug = $request->input('category');

    $products = Products::query();

    if ($query) {
      $products->where('name', 'LIKE', "%{$query}%");
    }

    if ($categorySlug) {
      $category = ProductCategory::where('slug', $categorySlug)->first();
      if ($category) {
        $products->where('category_id', $category->id);
      }
    }

    $products = $products->orderBy('category_id', 'asc')->get();
    $totalProducts = $products->count();

    return view('pages.products', compact('products', 'totalProducts'));
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

  private function getTopProductsByCategory($categorySlug)
  {
    return Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('product_categories', 'products.category_id', '=', 'product_categories.id', 'left')
      ->where('product_categories.slug', $categorySlug)
      ->where('status', 'sudah bayar')
      ->orderBy('products.price', 'desc')
      ->orderBy('quantity', 'desc')
      ->take(4)
      ->get(['products.*', 'orders.*']);
  }
}
