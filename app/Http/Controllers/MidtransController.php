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
    Config::$appendNotifUrl = config('app.url') . '/midtrans-callback';

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
        'order_id' => Str::uuid(),
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
    try {
      $snapToken = Snap::getSnapToken($params);
      $order->snap_token = $snapToken;
      $order->save();
    } catch (Exception $e) {
      $responseBody = json_decode($e->getMessage(), true);
      if (isset($responseBody['error_messages']) && in_array("transaction_details.order_id has already been taken", $responseBody['error_messages'])) {
        Alert::toast('info', 'Terjadi kesalahan, Order ID sudah digunakan. Silakan coba lagi.');
        return redirect()->back();
      } else {
        Alert::toast('info', 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
        return redirect()->back();
      }
    }

    return view('customer.checkout', compact('order', 'snapToken'));
  }

  public function detailPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('customer.order-detail', compact('order'));
  }

  public function successPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->update(['status' => 'paid']);
    return view('customer.success-payment', compact('order'));
  }

  public function cancelPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $order->update(['status' => 'cancelled']);
    return view('customer.cancel-payment', compact('order'));
  }

  public function callback(Request $request)
  {
    $order = Order::where('uuid', $request->order_id)->firstOrFail();
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha256', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashed === $request->signature_key) {
      if ($request->transaction === 'capture' || $request->transaction === 'settlement') {
        $order->update(['status' => 'paid']);
      } elseif ($request->transaction === 'pending') {
        $order->update(['status' => 'pending']);
      } elseif ($request->transaction === 'deny' || $request->transaction === 'cancel') {
        $order->update(['status' => 'cancelled']);
      } elseif ($request->transaction === 'expire') {
        $order->update(['status' => 'expired']);
      }
    }
  }
}
