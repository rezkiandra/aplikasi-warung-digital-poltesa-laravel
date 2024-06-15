<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
  public function ongkir(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('customer.ongkir.index', compact('order'));
  }

  public function cekOngkir(OrderRequest $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $origin = $order->seller->origin;
    $destination = $order->customer->origin;
    $weight = $order->product->weight;

    $api_key = config('rajaongkir.key');
    $response = Http::withHeaders([
      'key' => $api_key,
    ])->post('https://api.rajaongkir.com/starter/cost', [
      'origin' => $origin,
      'destination' => $destination,
      'weight' => $weight,
      'courier' => $request->courier,
    ]);

    // dd($response->json());
    $response = $response['rajaongkir'];

    return view('customer.ongkir.cek', compact('response', 'order'));
  }
}
