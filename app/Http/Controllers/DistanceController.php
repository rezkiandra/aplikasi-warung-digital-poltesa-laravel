<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class DistanceController extends Controller
{
  protected $api_mapbox;
  protected $api_raja_ongkir;
  protected $raja_ongkir_endpoint;
  protected $direction_endpoint;
  protected $geocoding_endpoint;

  public function __construct()
  {
    $this->api_mapbox            = config('google.mapbox_api');
    $this->api_raja_ongkir       = config('rajaongkir.key');
    $this->raja_ongkir_endpoint  = config('rajaongkir.endpoint');
    $this->direction_endpoint = config('google.mapbox_direction_endpoint');
    $this->geocoding_endpoint = config('google.mapbox_geocoding_endpoint');
  }

  public function ongkir(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();

    $data = [
      'order_type' => [
        'jasa kirim' => 'Jasa Kirim',
        'ambil sendiri' => 'Ambil Sendiri',
      ],
      'courier' => [
        'jne' => 'JNE',
        'Maxim' => 'MAXIM',
      ],
    ];

    return view('customer.ongkir.index', compact('order', 'data'));
  }

  public function cekOngkir(OrderRequest $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $weight = $order->product->weight;

    $order->update([
      'order_type' => $request->order_type,
      'courier' => $request->courier,
    ]);

    return ($request->order_type == 'jasa kirim')
      ? (($request->courier == 'Maxim')
        ? tap($this->handleMaximCourier($order), function () {
          Alert::toast('Tipe pesanan menggunakan jasa kirim', 'success');
        })
        : tap($this->handleOtherCouriers($order, $weight, $request), function () {
          Alert::toast('Tipe pesanan menggunakan jasa kirim', 'success');
        }))
      : tap(redirect()->route('customer.orders'), function () {
        Alert::toast('Tipe pesanan akan diambil sendiri', 'success');
      });
  }

  private function handleMaximCourier($order)
  {
    $origin = $order->seller->address;
    $destination = $order->customer->address;

    $originCoordinates = $this->geocodeAddress($origin);
    $destinationCoordinates = $this->geocodeAddress($destination);

    if (!$originCoordinates || !$destinationCoordinates) {
      return response()->json(['error' => 'Invalid address'], 400);
    }

    $coordinates = $originCoordinates . ';' . $destinationCoordinates;

    $response = Http::get($this->direction_endpoint . '/driving/' . $coordinates, [
      'access_token' => $this->api_mapbox,
    ]);

    if ($response->successful()) {
      $data = $response->json();
      $route = $data['routes'][0] ?? null; // Ambil rute pertama jika ada

      if (!$route) {
        return response()->json(['error' => 'No routes found'], 404);
      }

      $distance = $route['distance'] ?? 0;
      $duration = $route['duration'] ?? 0;

      $jarakKm = round($distance * 0.001, 2); // konversi ke kilometer
      $duration = round($duration / 60, 2); // konversi ke menit

      $biayaMaxim = Setting::getValue('maxim_cost'); // per kilometer
      $biayaJarak = ceil($jarakKm * $biayaMaxim);
      $biayaTotal = ceil($biayaJarak + $order->total_price);

      $data = [
        'courier' => $order->courier,
        'jarakKm' => $jarakKm . ' kilometer',
        'duration' => $duration . ' menit',
        'biayaMaxim' => $biayaMaxim,
        'biayaJarak' => $biayaJarak,
        'biayaTotal' => $biayaTotal,
      ];

      // dd($data);

      return view('customer.ongkir.maxim', compact('order', 'data'));
    } else {
      return response()->json(['error' => 'Unable to fetch distance'], $response->status());
    }
  }

  private function handleOtherCouriers($order, $weight, $request)
  {
    $origin = $order->seller->origin;
    $destination = $order->customer->origin;

    $response = Http::withHeaders([
      'key' => $this->api_raja_ongkir,
    ])->post($this->raja_ongkir_endpoint . '/cost', [
      'origin' => $origin,
      'destination' => $destination,
      'weight' => $weight,
      'courier' => $request->courier,
    ]);

    $response = $response['rajaongkir'];
    return view('customer.ongkir.cek', compact('response', 'order'));
  }


  private function geocodeAddress($address)
  {
    $response = Http::get($this->geocoding_endpoint . '.places/' . urlencode($address) . '.json', [
      'access_token' => $this->api_mapbox
    ]);

    if ($response->successful()) {
      $data = $response->json();
      if (isset($data['features'][0]['geometry']['coordinates'])) {
        $coordinates = $data['features'][0]['geometry']['coordinates'];
        return implode(',', $coordinates);
      }
    }

    return null;
  }
}
