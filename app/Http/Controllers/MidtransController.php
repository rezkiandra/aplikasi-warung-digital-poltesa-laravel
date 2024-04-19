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
use Illuminate\Support\Str;

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
    // Config::$isProduction = config('midtrans.sandbox_is_production');
    // Config::$isSanitized = config('midtrans.sandbox_is_sanitized');
    // Config::$is3ds = config('midtrans.sandbox_is_3ds');
  }

  public function processPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    // if ($order->status === 'paid') {
    //   return redirect()->route('midtrans.success', $uuid)->with('message', 'Order sudah dibayar.');
    // }

    $params = array(
      'transaction_details' => array(
        'order_id' => rand(),
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
        echo "Order ID sudah digunakan";
        return redirect()->back()->with('error', 'Terjadi kesalahan, order ID sudah digunakan. Silakan coba lagi.');
      } else {
        // Handle error lainnya
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
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
    $order = Order::where('uuid', $uuid)->first();
    $order->status = 'paid';
    $order->save();

    return view('customer.success-payment', compact('order'));
  }

  public function cancelPayment(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    $order->status = 'cancelled';
    $order->product->stock += $order->quantity;
    $order->save();

    return view('customer.cancel-payment', compact('order'));
  }

  public function callbackHandler(Request $request)
  {
    // Logika untuk menangani callback dari Midtrans
    $data = $request->all(); // Mendapatkan data JSON yang dikirim oleh Midtrans

    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha256', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashed === $request->signature_key) {
      // Logika untuk menangani callback jika signature key valid
      if($request->status_code === '200') {
        $order = Order::where('uuid', $request->order_id)->first();
        $order->status = 'paid';
        // Mendapatkan metode pembayaran
        $paymentMethod = $request->payment_type;
        // Anda bisa melakukan logika tambahan dengan metode pembayaran, misalnya menyimpannya ke database
        $order->payment_method = $paymentMethod; // Pastikan kolom payment_method sudah ada di tabel orders
        $order->save();
      }
    }
  }
}
