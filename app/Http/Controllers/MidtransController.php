<?php

namespace App\Http\Controllers;

use Midtrans;
use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MidtransController extends Controller
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
    // Config::$isProduction = config('midtrans.sandbox_is_production', false);
    // Config::$isSanitized = config('midtrans.sandbox_is_sanitized', true);
    // Config::$is3ds = config('midtrans.sandbox_is_3ds', true);
  }

  public function processPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    $params = array(
      'transaction_details' => array(
        'order_id' => $order->uuid,
        'gross_amount' => $order->total_price
      ),
      'item_details' => array(
        [
          'id' => $order->product->uuid,
          'price' => $order->product->price,
          'quantity' => $order->quantity,
          'name' => $order->product->name
        ]
      ),
      'customer_details' => array(
        'first_name' => $order->customer->full_name,
        'email' => Auth::user()->email,
        'address' => $order->customer->gender,
        'phone' => $order->customer->phone_number
      ),
    );

    $snapToken = Snap::getSnapToken($params);
    $order->snap_token = $snapToken;
    $order->save();

    return view('customer.checkout', compact('order', 'snapToken'));
  }

  public function detailPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('customer.order-detail', compact('order'));
  }

  public function cancelPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->update(['status' => 'cancelled']);
    return view('customer.cancel-payment', compact('order'));
  }

  public function callback(Request $request)
  {
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashed === $request->signature_key) {
      $order = Order::where('uuid', $request->order_id)->firstOrFail();
      if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
        $order->update([
          'status' => 'paid',
          'payment_method' => $request->payment_type,
          'expiry_time' => $request->expiry_time,
          'issuer' => $request->issuer,
          'acquirer' => $request->acquirer
        ]);
      } elseif ($request->transaction_status == 'pending') {
        $order->update([
          'status' => 'pending',
          'payment_method' => $request->payment_type,
          'expiry_time' => $request->expiry_time,
          'issuer' => $request->issuer,
          'acquirer' => $request->acquirer
        ]);
      } elseif ($request->transaction_status == 'expire') {
        $order->update([
          'status' => 'expire',
          'payment_method' => $request->payment_type,
          'expiry_time' => $request->expiry_time,
          'issuer' => $request->issuer,
          'acquirer' => $request->acquirer
        ]);
      }
    }
  }
}
