<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ProductsCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsCartController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $customer_id = Auth::user()->customer->id;
    $product_id = $request->product_id;
    $quantity = $request->quantity;

    $cart = ProductsCart::where('customer_id', $customer_id)
      ->where('product_id', $product_id)
      ->first();

    if ($cart) {
      $newQuantity = $cart->quantity + $quantity;
      $cart->update([
        'quantity' => $newQuantity
      ]);
    } else {
      ProductsCart::create([
        'customer_id' => $customer_id,
        'product_id' => $product_id,
        'quantity' => $quantity
      ]);
    }

    Alert::toast('Successfully added to cart', 'success');
    return redirect()->back();
  }

  public function update(Request $request)
  {
    $customer_id = $request->input('customer_id');
    $product_id = $request->input('product_id');
    $newQuantity = $request->input('quantity');

    $cart = ProductsCart::where('customer_id', $customer_id)
      ->where('product_id', $product_id)
      ->firstOrFail();

    $cart->update([
      'customer_id' => $customer_id,
      'product_id' => $product_id,
      'quantity' => $newQuantity
    ]);
  }

  public function destroy(string $id)
  {
    $cart = ProductsCart::findOrFail($id);
    $cart->delete();

    Alert::toast('Successfully deleted from cart', 'success');
    return redirect()->back();
  }
}
