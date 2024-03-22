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
    ProductsCart::create([
      'user_id' => Auth::user()->id,
      'product_id' => $request->product_id,
      'quantity' => $request->quantity
    ]);

    Alert::toast('Successfully added to cart', 'success');
    return redirect()->back()->route('customer.products');
  }

  /**
   * Display the specified resource.
   */
  public function show(ProductsCart $productsCart)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ProductsCart $productsCart)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, ProductsCart $productsCart)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ProductsCart $productsCart)
  {
    //
  }
}
