<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
  public function store(Request $request, string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    Shipping::create([
      'uuid' => Str::uuid(''),
      'order_id' => $order->id,
      'courier' => $request->courier,
      'code' => $request->code,
      'etd' => $request->etd,
      'description' => $request->description,
      'price' => $request->price,
    ]);

    Alert::toast('Berhasil menambahkan pengiriman', 'success');
    return redirect()->route('customer.orders');
  }

  public function edit(string $uuid)
  {
    $shipping = Shipping::where('uuid', $uuid)->firstOrFail();
    return view('seller.orders.edit', compact('shipping'));
  }

  public function update(ShippingRequest $request, string $uuid)
  {
    $shipping = Shipping::where('uuid', $uuid)->firstOrFail();
    $shipping->update([
      'status' => $request->shipping_status,
      'resi' => $request->resi,
    ]);

    Alert::toast('Berhasil mengubah status pengiriman', 'success');
    return redirect()->route('seller.orders');
  }
}
