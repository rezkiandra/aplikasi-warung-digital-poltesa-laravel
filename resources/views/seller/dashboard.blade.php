@php
  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard seller';
  $label = 'Total Produk';
  $value = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('seller.products');

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
  $topCustomers = \App\Models\Order::selectRaw('customer_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $topProducts = \App\Models\Order::selectRaw('product_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $products = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->paginate(6);
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
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

    {{-- <x-top-sellers-card :datas="$sellers" :title="'Penjual Teratas 🎉'" /> --}}
    <x-top-customers-card :datas="$topCustomers" :title="'Pelanggan Teratas 🎉'" />
    <x-top-products-card :datas="$topProducts" :title="'Penjualan Produk Teratas 🎉'" />

    <x-product-table-card :datas="$products" />
  </x-content-card>
@endsection
