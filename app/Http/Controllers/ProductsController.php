<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\EditProductsRequest;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products::where('seller_id', Auth::user()->seller->id)->paginate(8);
    return view('seller.products.index', compact('products'));
  }

  public function create()
  {
    return view('seller.products.create');
  }

  public function store(ProductsRequest $request)
  {
    $seller_id = Seller::where('user_id', Auth::user()->id)->pluck('id')->first();

    Products::create([
      'uuid' => Str::uuid('id'),
      'seller_id' => $seller_id,
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'description' => $request->description,
      'price' => $request->price,
      'stock' => $request->stock,
      'weight' => $request->weight,
      'unit' => $request->unit,
      'category_id' => $request->category_id,
      'image' => $request->image->store('products', 'public'),
    ]);

    Alert::toast('Berhasil menambahkan produk baru', 'success');
    return redirect()->route('seller.products');
  }

  public function show(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('seller.products.detail', compact('product', 'relatedProducts'));
  }

  public function edit(string $uuid)
  {
    $product = Products::where('uuid', $uuid)->firstOrFail();
    return view('seller.products.edit', compact('product'));
  }

  public function update(EditProductsRequest $request, string $uuid)
  {
    $product = Products::where('uuid', $uuid)->firstOrFail();
    $productImage = Products::where('uuid', $uuid)->pluck('image')->first();
    $seller_id = Seller::where('user_id', Auth::user()->id)->pluck('id')->first();

    if ($request->hasFile('image')) {
      if ($productImage) {
        Storage::delete('public/' . $productImage);
      }
      $product->update([
        'image' => $request->image->store('products', 'public'),
      ]);
    } else {
      $product->update([
        'seller_id' => $seller_id,
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'weight' => $request->weight,
        'unit' => $request->unit,
        'category_id' => $request->category_id,
      ]);
    }

    Alert::toast('Berhasil mengupdate produk', 'success');
    return redirect()->route('seller.products');
  }

  public function destroy(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $product->delete();

    if ($product->image) {
      Storage::delete('public/' . $product->image);
    }

    Alert::toast('Berhasil menghapus produk', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('seller.products');
  }
}
