<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
  public function index()
  {
    return view('seller.products.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('seller.products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
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
      'category_id' => $request->category_id,
      'image' => $request->image->store('products', 'public'),
    ]);

    Alert::toast('Successfully created new product', 'success');
    return redirect()->route('seller.products');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $slug)
  {
    $product = Products::where('slug', $slug)->firstOrFail();
    $relatedProducts = Products::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
    return view('seller.products.detail', compact('product', 'relatedProducts'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $uuid)
  {
    $product = Products::where('uuid', $uuid)->firstOrFail();
    return view('seller.products.edit', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ProductsRequest $request, string $uuid)
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
        'category_id' => $request->category_id,
      ]);
    }

    Alert::toast('Successfully updated product', 'success');
    return redirect()->route('seller.products');
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

    Alert::toast('Successfully deleted product', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('seller.products');
  }
}
