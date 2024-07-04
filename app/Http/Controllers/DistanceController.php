<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
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
    return view('customer.ongkir.index', compact('order'));
  }

  public function cekOngkir(Request $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();

    $weight = $order->product->weight;
    $courier = $request->courier;

    $order->update(['order_type' => $request->order_type]);

    if ($request->order_type == 'jasa_kirim' && $request->courier == 'maxim driver') {
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

        $biayaMaximPerKm = Setting::getValue('maxim_cost');
        $biayaAdmin      = Setting::getValue('admin_cost');

        $biayaJarak = ceil($distance * $biayaMaximPerKm);
        $biayaTotal = ceil($biayaJarak + $order->total_price + $biayaAdmin);

        $biayaMaxim = number_format($biayaMaximPerKm, 0, ',', '.');
        $biayaAdmin = number_format($biayaAdmin, 0, ',', '.');
        $biayaJarak = number_format($biayaJarak, 0, ',', '.');
        $biayaTotal = number_format($biayaTotal, 0, ',', '.');

        $data = [
          'courier' => $courier,
          'jarakKm' => $jarakKm . ' kilometer',
          'duration' => $duration . ' menit',
          'biayaMaxim' => $biayaMaxim,
          'biayaAdmin' => $biayaAdmin,
          'biayaJarak' => $biayaJarak,
          'biayaTotal' => $biayaTotal,
        ];

        return view('customer.ongkir.maxim', compact('order', 'data'));
      } else {
        return response()->json(['error' => 'Unable to fetch distance'], $response->status());
      }
    } elseif ($request->order_type == 'jasa_kirim' && $request->courier != 'maxim driver') {
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
    } else {
      Alert::toast('Tipe pesanan akan diambil sendiri', 'success');
      return redirect()->route('customer.orders');
    }

    return response()->json([]);
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
