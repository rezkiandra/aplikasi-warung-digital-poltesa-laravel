@php
  if (Auth::user()->customer) {
      $customer_id = Auth::user()->customer->id;
  } else {
      $customer_id = null;
  }

  $countPaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'paid')->count();
  $countUnpaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'unpaid')->count();
  $countExpire = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'expire')->count();
  $countCancelled = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'cancelled')->count();
@endphp


@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan anda yang selesai, belum dibayar, dan dibatalkan</p>

  <x-detail-order>
    <x-detail-order-item :label="'Selesai'" :icon="'basket-check-outline'" :class="'border-end'" :variant="'success'" :condition="$countPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'basket-off-outline'" :class="'border-end'" :variant="'warning'" :condition="$countUnpaid" />
    <x-detail-order-item :label="'Kadaluarsa'" :icon="'basket-remove-outline'" :class="'border-end'" :variant="'danger'" :condition="$countExpire" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'basket-minus-outline'" :class="'border-end'" :variant="'dark'" :condition="$countCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
