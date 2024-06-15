<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\ProductsCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
  public function store(Request $request)
  {
    Order::create([
      'uuid' => Str::uuid()->toString(),
      'customer_id' => Auth::user()->customer->id,
      'product_id' => $request->product_id,
      'seller_id' => Products::find($request->product_id)->seller->id,
      'quantity' => $request->quantity,
      'total_price' => $request->total_price,
    ]);

    $product = Products::find($request->product_id);
    $product->decrement('stock', $request->quantity);
    $product->update();

    $productCart = ProductsCart::where('customer_id', Auth::user()->customer->id)
      ->where('product_id', $request->product_id);
    $productCart->delete();

    Alert::toast('Berhasil membuat pesanan baru', 'success');
    return redirect()->route('customer.orders');
  }

  public function show(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    return view('customer.ongkir.index', compact('order'));
  }

  public function update(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();

    Order::create([
      'uuid' => Str::uuid()->toString(),
      'customer_id' => Auth::user()->customer->id,
      'product_id' => $order->product_id,
      'seller_id' => $order->product->seller->id,
      'quantity' => $order->quantity,
      'total_price' => $order->total_price,
      'snap_token' => $order->snap_token,
    ]);

    Alert::toast('Berhasil membeli kembali produk', 'success');
    return redirect()->route('customer.orders');
  }
}
