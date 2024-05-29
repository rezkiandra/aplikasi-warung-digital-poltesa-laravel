@php
  $orders = \App\Models\Order::with('seller')->paginate(10);

  $totalPaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->count();

  $totalUnpaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'unpaid')
      ->count();

  $totalExpire = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'expire')
      ->count();

  $totalCancelled = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'cancelled')
      ->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan pelanggan yang membeli produk anda</p>

  <x-detail-order>
    <x-detail-order-item :label="'Selesai'" :icon="'basket-check-outline'" :class="'border-end'" :variant="'success'" :condition="$totalPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'basket-off-outline'" :class="'border-end'" :variant="'warning'" :condition="$totalUnpaid" />
    <x-detail-order-item :label="'Kadaluarsa'" :icon="'basket-remove-outline'" :class="'border-end'" :variant="'danger'" :condition="$totalExpire" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'basket-minus-outline'" :class="'border-end'" :variant="'dark'" :condition="$totalCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
