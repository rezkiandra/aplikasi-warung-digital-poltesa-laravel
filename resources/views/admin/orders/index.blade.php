@php
  $orders = \App\Models\Order::paginate(10);
  $totalPaid = \App\Models\Order::where('status', 'sudah bayar')->count();
  $totalUnpaid = \App\Models\Order::where('status', 'belum bayar')->count();
  $totalExpire = \App\Models\Order::where('status', 'kadaluarsa')->count();
  $totalCancelled = \App\Models\Order::where('status', 'dibatalkan')->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Daftar Pesanan</h4>
  <p class="mb-3">Sebuah pesanan akan diproses ketika pelanggan menyelesaikan pembelian</p>

  <x-detail-order>
    <x-detail-order-item :label="'Sudah Bayar'" :icon="'basket-check-outline'" :class="'border-end'" :variant="'success'" :condition="$totalPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'basket-minus-outline'" :class="'border-end'" :variant="'warning'" :condition="$totalUnpaid" />
    <x-detail-order-item :label="'Kadaluarsa'" :icon="'basket-off-outline'" :class="'border-end'" :variant="'danger'" :condition="$totalExpire" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'basket-remove-outline'" :variant="'dark'" :condition="$totalCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
