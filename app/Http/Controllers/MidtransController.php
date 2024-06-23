<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    try {
      $order = Order::with(['shipping', 'product', 'customer.user'])->where('uuid', $uuid)->firstOrFail();
      $shippingCost = $order->shipping->price;
      $adminCost = 1000;
      $grossAmount = $order->total_price + $shippingCost + $adminCost;

      $params = $this->buildPaymentParams($order, $grossAmount, $adminCost);

      $snapToken = Snap::getSnapToken($params);
      $order->snap_token = $snapToken;
      $order->save();

      return view('customer.checkout', compact('order', 'snapToken'));
    } catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => json_decode($e->getMessage(), true)]);
    }
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
    $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    try {
      if ($hashed === $request->signature_key || $request->fraud_status == 'accept') {
        $order = Order::where('uuid', $request->order_id)->firstOrFail();

        $commonData = [
          'payment_method' => $request->payment_type,
          'store' => $request->store,
          'payment_code' => $request->payment_code,
          'expiry_time' => $request->expiry_time,
          'transaction_time' => $request->transaction_time,
          'issuer' => $request->issuer,
          'biller_code' => $request->biller_code,
          'bill_key' => $request->bill_key,
        ];

        switch ($request->transaction_status) {
          case 'settlement':
            $order->update(array_merge($commonData, ['status' => 'sudah bayar']));
            break;
          case 'pending':
            $order->update(array_merge($commonData, ['status' => 'belum bayar']));
            break;
          case 'expire':
            $order->update(array_merge($commonData, ['status' => 'kadaluarsa']));
            $order->product->increment('stock', $order->quantity);
            $order->product->update();
            break;
        }
      }
    } catch (Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }

  private function buildPaymentParams($order, $grossAmount, $adminCost)
  {
    return [
      'transaction_details' => [
        'order_id' => $order->uuid,
        'currency' => 'IDR',
        'gross_amount' => $grossAmount,
      ],
      'item_details' => [
        [
          'id' => $order->product->uuid,
          'name' => $order->product->name,
          'price' => $order->product->price,
          'quantity' => $order->quantity,
          'weight' => $order->product->weight
        ],
        [
          'id' => $order->shipping->uuid,
          'name' => $order->shipping->courier . ' - ' . $order->shipping->code,
          'price' => $order->shipping->price,
          'quantity' => 1
        ],
        [
          'id' => 'ADM-01',
          'name' => 'Biaya Admin',
          'price' => $adminCost,
          'quantity' => 1
        ],
      ],
      'customer_details' => [
        'first_name' => $order->customer->full_name,
        'email' => $order->customer->user->email,
        'address' => $order->customer->address,
        'phone' => $order->customer->phone_number,
        'gender' => $order->customer->gender,
        'shipping_address' => [
          'first_name' => $order->customer->full_name,
          'phone' => $order->customer->phone_number,
          'address' => $order->customer->address,
        ],
      ],
    ];
  }
}
