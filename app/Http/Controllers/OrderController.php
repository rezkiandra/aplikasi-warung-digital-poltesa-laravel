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
    // config midtrans production
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production', true);
    Config::$isSanitized = config('midtrans.is_sanitized', true);
    Config::$is3ds = config('midtrans.is_3ds', true);

    // config midtrans sandbox
    // Config::$serverKey = config('midtrans.sandbox_server_key');
    // Config::$isProduction = config('midtrans.sandbox_is_production');
    // Config::$isSanitized = config('midtrans.sandbox_is_sanitized');
    // Config::$is3ds = config('midtrans.sandbox_is_3ds');
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

  public function checkout(string $uuid)
  {
    $fee = 0;
    $order = Order::where('uuid', $uuid)->firstOrFail();

    $params = array(
      'items' => array(
        array(
          'id' => $order->product->uuid,
          'price' => $order->product->price,
          'quantity' => $order->quantity,
          'name' => $order->product->name
        ),
      ),
      'billing_address' => array(
        'first_name' => $order->customer->full_name,
        'address' => $order->customer->address,
        'email' => $order->customer->user->email,
      ),
      'transaction_details' => array(
        'order_id' => $order->uuid,
        'gross_amount' => $order->product->price * $order->quantity + $fee,
      ),
      'customer_details' => array(
        'first_name' => $order->customer->full_name,
        'phone' => $order->customer->phone_number,
        'email' => $order->customer->user->email,
      ),
    );

    $snapToken = Snap::getSnapToken($params);
    $order->update([
      'status' => 'paid',
      'snap_token' => $snapToken
    ]);

    return view('customer.checkout', compact('order', 'snapToken'));
  }

  public function destroy(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->delete();

    Alert::toast('Successfully deleted an order', 'success');
    return redirect()->route('customer.orders');
  }
}
