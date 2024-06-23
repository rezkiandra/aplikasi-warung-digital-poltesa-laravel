<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Http;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OngkirController extends Controller
{
  protected $api_key;
  protected $endpoint;

  public function __construct()
  {
    $this->api_key = config('rajaongkir.key');
    $this->endpoint = config('rajaongkir.endpoint');
  }

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

    $response = Http::withHeaders([
      'key' => $this->api_key,
    ])->post($this->endpoint . '/cost', [
      'origin' => $origin,
      'destination' => $destination,
      'weight' => $weight,
      'courier' => $request->courier,
    ]);

    $response = $response['rajaongkir'];
    return view('customer.ongkir.cek', compact('response', 'order'));
  }
}
