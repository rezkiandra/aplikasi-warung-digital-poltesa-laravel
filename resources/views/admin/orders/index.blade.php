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
    <x-detail-order-item :label="'Jumlah Pesanan'" :icon="'wallet-giftcard'" :class="'border-end'" :variant="'primary'" :condition="$totalOrders" />
    <x-detail-order-item :label="'Pesanan Belum Dibayar'" :icon="'wallet-outline'" :class="'border-end'" :variant="'danger'" :condition="$totalUnpaid" />
    <x-detail-order-item :label="'Pesanan Selesai'" :icon="'check-all'" :class="'border-end'" :variant="'success'" :condition="$totalPaid" />
    <x-detail-order-item :label="'Pesanan Dibatalkan'" :icon="'alert-circle-outline'" :variant="'dark'" :condition="$totalCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
