@php
  if (Auth::user()->customer) {
      $customer_id = Auth::user()->customer->id;
  } else {
      $customer_id = null;
  }

  $countOrder = \App\Models\Order::where('customer_id', $customer_id)->count();
  $countUnpaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'unpaid')->count();
  $countPaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'paid')->count();
  $countCancelled = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'cancelled')->count();
@endphp


@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan anda yang selesai, belum dibayar, dan dibatalkan</p>

  <x-detail-order>
    <x-detail-order-item :label="'Jumlah Pesanan'" :icon="'wallet-giftcard'" :class="'border-end'" :variant="'primary'" :condition="$countOrder" />
    <x-detail-order-item :label="'Pesanan Belum Bayar'" :icon="'wallet-outline'" :class="'border-end'" :variant="'danger'" :condition="$countUnpaid" />
    <x-detail-order-item :label="'Pesanan Selesai'" :icon="'check-all'" :class="'border-end'" :variant="'success'" :condition="$countPaid" />
    <x-detail-order-item :label="'Pesanan Dibatalkan'" :icon="'alert-circle-outline'" :variant="'dark'" :condition="$countCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
