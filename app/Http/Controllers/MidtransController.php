<?php

namespace App\Http\Controllers;

use Midtrans;
use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class MidtransController extends Controller
{
  public function __construct()
  {
    // config midtrans production
    // Config::$serverKey = config('midtrans.server_key');
    // Config::$isProduction = config('midtrans.is_production', true);
    // Config::$isSanitized = config('midtrans.is_sanitized', true);
    // Config::$is3ds = config('midtrans.is_3ds', true);

    // config midtrans sandbox
    Config::$serverKey = config('midtrans.sandbox_server_key');
    Config::$isProduction = config('midtrans.sandbox_is_production', false);
    Config::$isSanitized = config('midtrans.sandbox_is_sanitized', true);
    Config::$is3ds = config('midtrans.sandbox_is_3ds', true);
  }

  public function processPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    $params = array(
      'transaction_details' => array(
        'order_id' => $order->uuid,
        'gross_amount' => $order->total_price + ($order->product->price / 100) * 3
      ),
      'item_details' => array(
        [
          'id' => $order->product->uuid,
          'price' => $order->product->price + ($order->product->price / 100) * 3,
          'quantity' => $order->quantity,
          'name' => $order->product->name
        ]
      ),
      'customer_details' => array(
        'first_name' => $order->customer->full_name,
        'email' => Auth::user()->email,
        'address' => $order->customer->full_name,
        'phone' => $order->customer->phone_number
      ),
    );

    try {
      $snapToken = Snap::getSnapToken($params);
      $order->snap_token = $snapToken;
      $order->save();
    } catch (Exception $e) {
      $response_body = json_decode($e->getMessage(), true);
      dd($response_body);
      return redirect()->back();
    }

    return view('customer.order-detail', compact('order', 'snapToken'));
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

    $order->product->increment('stock', $order->quantity);
    $order->product->update();

    Alert::toast('Pesanan dibatalkan', 'success');
    return view('customer.order-detail', compact('order'));
  }

  public function callback(Request $request)
  {
    $serverKey = config('midtrans.server_key');
    $hashed = hash(
      'sha512',
      $request->order_id . $request->status_code . $request->gross_amount . $serverKey
    );

    try {
      if ($hashed === $request->signature_key || $request->fraud_status == 'accept') {
        $order = Order::where('uuid', $request->order_id)->firstOrFail();
        if ($request->transaction_status == 'settlement') {
          $order->update([
            'status' => 'paid',
            'payment_method' => $request->payment_type,
            'store' => $request->store,
            'payment_code' => $request->payment_code,
            'expiry_time' => $request->expiry_time,
            'transaction_time' => $request->transaction_time,
            'issuer' => $request->issuer,
            'biller_code' => $request->biller_code,
            'bill_key' => $request->bill_key,
          ]);
        } elseif ($request->transaction_status == 'pending') {
          $order->update([
            'status' => 'unpaid',
            'payment_method' => $request->payment_type,
            'store' => $request->store,
            'payment_code' => $request->payment_code,
            'expiry_time' => $request->expiry_time,
            'transaction_time' => $request->transaction_time,
            'issuer' => $request->issuer,
            'biller_code' => $request->biller_code,
            'bill_key' => $request->bill_key,
          ]);
        } elseif ($request->transaction_status == 'expire') {
          $order->update([
            'status' => 'expire',
            'payment_method' => $request->payment_type,
            'store' => $request->store,
            'payment_code' => $request->payment_code,
            'expiry_time' => $request->expiry_time,
            'transaction_time' => $request->transaction_time,
            'issuer' => $request->issuer,
            'biller_code' => $request->biller_code,
            'bill_key' => $request->bill_key,
          ]);
          $order->product->increment('stock', $order->quantity);
          $order->product->update();
        } elseif ($request->transaction_status == 'cancel') {
          $order->update([
            'status' => 'cancelled',
            'payment_method' => $request->payment_type,
            'store' => $request->store,
            'payment_code' => $request->payment_code,
            'expiry_time' => $request->expiry_time,
            'transaction_time' => $request->transaction_time,
            'issuer' => $request->issuer,
            'biller_code' => $request->biller_code,
            'bill_key' => $request->bill_key,
          ]);
        }
      }
    } catch (Exception $e) {
      return $e;
    }
  }
}
