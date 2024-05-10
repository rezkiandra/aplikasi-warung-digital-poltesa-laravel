@php
  $orders = \App\Models\Order::paginate(10);
  $totalOrders = \App\Models\Order::all()->count();
  $totalUnpaid = \App\Models\Order::where('status', 'unpaid')->count();
  $totalPaid = \App\Models\Order::where('status', 'paid')->count();
  $totalCancelled = \App\Models\Order::where('status', 'cancelled')->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Daftar Pesanan</h4>
  <p class="mb-3">Sebuah pesanan akan diproses ketika pelanggan menyelesaikan pembelian</p>

  <x-detail-order>
    <x-detail-order-item :label="'Jumlah'" :icon="'basket-outline'" :class="'border-end'" :variant="'info'" :condition="$totalOrders" />
    <x-detail-order-item :label="'Selesai'" :icon="'basket-check-outline'" :class="'border-end'" :variant="'success'" :condition="$totalPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'basket-off-outline'" :class="'border-end'" :variant="'danger'" :condition="$totalUnpaid" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'basket-remove-outline'" :variant="'dark'" :condition="$totalCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
