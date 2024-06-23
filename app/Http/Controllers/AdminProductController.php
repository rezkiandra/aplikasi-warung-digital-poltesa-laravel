<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProductController extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = ProductCategory::pluck('name', 'id')->toArray();
    $seller = Seller::pluck('full_name', 'id')->toArray();
    return view('admin.products.create', compact('categories', 'seller'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ProductsRequest $request)
  {
    Products::create([
      'uuid' => Str::uuid('id'),
      'seller_id' => $request->seller_id,
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'description' => $request->description,
      'price' => $request->price,
      'stock' => $request->stock,
      'category_id' => $request->category_id,
      'image' => $request->image->store('products', 'public'),
    ]);

    Alert::toast('Berhasil menambahkan produk baru', 'success');
    return redirect()->route('admin.products');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('admin.products.detail', compact('product', 'relatedProducts'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $uuid)
  {
    $product = Products::where('uuid', $uuid)->firstOrFail();
    $categories = ProductCategory::pluck('name', 'id')->toArray();
    return view('admin.products.edit', compact('product', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ProductsRequest $request, string $uuid)
  {
    $product = Products::where('uuid', $uuid)->firstOrFail();
    $productImage = Products::where('uuid', $uuid)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($productImage) {
        Storage::delete('public/' . $productImage);
      }
      $product->update([
        'image' => $request->image->store('products', 'public'),
      ]);
    } else {
      $product->update([
        'uuid' => Str::uuid('id'),
        'seller_id' => $request->seller_id,
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => $request->category_id,
      ]);
    }

    Alert::toast('Berhasil mengupdate produk', 'success');
    return redirect()->route('admin.products');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $product->delete();

    if ($product->image) {
      Storage::delete('public/' . $product->image);
    }

    Alert::toast('Berhasil menghapus produk', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.products');
  }
}
