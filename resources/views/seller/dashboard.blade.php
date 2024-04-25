@php
  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard seller';
  $label = 'Total Produk';
  $value = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->count();
  $actionLabel = 'Selengkapnya';

  // Transaction Card
  $title = 'Transaksi';
  $description = 'Total transaksi dibulan ini';

  // Earnings Card
  $earnings = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->orderBy('orders.created_at', 'desc')
      ->take(5)
      ->get();
  $titleEarnings = 'Total Pendapatan';
  $earningsValue = 'Rp' . number_format($earnings->sum('total_price'), 2, '.', ',');
  $descriptionEarnings = 'Total pendapatan dibulan ini';

  // Transaction Item Card
  $totalOrders = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->count();
  $totalPaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'unpaid')
      ->count();
  $totalCancelled = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'cancelled')
      ->count();

  // Top Card Content
  // get top buying customers
  // $customers = \App\Models\Order::join('customers', 'orders.customer_id', '=', 'customers.id', 'left')
  //     ->orderBy('orders.created_at', 'desc')
  //     ->take(5)
  //     ->get();
  $customers = \App\Models\Order::join('customers', 'orders.customer_id', '=', 'customers.id', 'left')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->orderBy('orders.created_at', 'desc')
      ->take(5)
      ->get();

  $products = \App\Models\Products::where('seller_id', auth()->user()->seller->id)
      ->take(5)
      ->get();

  $orders = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->orderBy('orders.created_at', 'desc')
      ->take(5)
      ->get();
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Jumlah Pesanan'" :value="$totalOrders" :variant="'info'" :icon="'account-group-outline'" />
      <x-transaction-item-card :label="'Pesanan Selesai'" :value="$totalPaid" :variant="'success'" :icon="'account-multiple-outline'" />
      <x-transaction-item-card :label="'Pesanan Belum Dibayar'" :value="$totalUnpaid" :variant="'warning'" :icon="'package'" />
      <x-transaction-item-card :label="'Pesanan Dibatalkan'" :value="$totalCancelled" :variant="'danger'" :icon="'basket-outline'" />
    </x-transactions-card>

    {{-- <x-bar-graph-card /> --}}
    <x-earnings-card :title="$titleEarnings" :description="$descriptionEarnings" :earnings="$earningsValue" />
    {{-- <x-four-card>
      <x-graph-card-content />
      <x-graph-card-content />
      <x-graph-card-content />
      <x-graph-card-content />
    </x-four-card> --}}

    {{-- <x-top-sellers-card :datas="$sellers" :title="'Penjual Teratas'" /> --}}
    <x-top-customers-card :datas="$customers" :title="'Pelanggan Teratas'" />
    <x-top-products-card :datas="$products" :title="'Penjualan Produk Teratas'" />

    {{-- <x-order-table-card :datas="$orders" /> --}}
  </x-content-card>
@endsection
