<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleMapsController extends Controller
{
  protected $api_key;
  protected $endpoint;

  public function __construct()
  {
    $this->api_key = config('google.api_key');
    $this->endpoint = config('google.endpoint');
  }

  public function ongkir(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('customer.ongkir.index', compact('order'));
  }

  public function cekOngkir(Request $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $origin = $order->seller->origin;
    $destination = $order->customer->origin;

    try {
      if ($request->order_type == 'jasa_kirim') {
        $response = Http::get($this->endpoint . urlencode($origin) . "&destinations=" . urlencode($destination) . '&key=' . $this->api_key);
        dd($response->json());

        $order->update(['order_type' => 'jasa_kirim']);

        Alert::toast('Tipe pesanan menggunakan jasa kirim', 'success');
        return view('customer.ongkir.cek', compact('response', 'order'));
      } else {
        $order->update(['order_type' => 'ambil_sendiri']);

        Alert::toast('Tipe pesanan akan diambil sendiri', 'success');
        return redirect()->route('customer.orders');
      }
    } catch (Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
    }
  }
}
