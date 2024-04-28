@php
  $orders = \App\Models\Order::with('seller')->paginate(10);
@endphp

@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan pelanggan yang membeli produk anda</p>

  <x-order-tabel :orders="$orders" />
@endsection
