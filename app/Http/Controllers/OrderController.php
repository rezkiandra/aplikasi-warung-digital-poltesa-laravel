<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
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
  public function __construct()
  {
    Config::$serverKey = config('midtrans.sandbox_server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');
  }

  public function store(Request $request)
  {
    Order::create([
      'uuid' => Str::uuid('id'),
      'customer_id' => Auth::user()->customer->id,
      'product_id' => $request->product_id,
      'quantity' => $request->quantity,
      'total_price' => $request->total_price,
    ]);

    $product = Products::find($request->product_id);
    $product->decrement('stock', $request->quantity);
    $product->update();

    $productCart = ProductsCart::where('customer_id', Auth::user()->customer->id)
      ->where('product_id', $request->product_id);
    $productCart->delete();

    Alert::toast('Successfully maked an order', 'success');
    return redirect()->route('customer.orders');
  }

  public function show(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('customer.order-detail', compact('order'));
  }

  public function update(Request $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->update([
      'status' => 'paid',
    ]);

    Alert::toast('Successfully paid an order', 'success');
    return redirect()->route('customer.orders');
  }

  public function destroy(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->delete();

    Alert::toast('Successfully deleted an order', 'success');
    return redirect()->route('customer.orders');
  }
}
