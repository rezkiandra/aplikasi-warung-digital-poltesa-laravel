@php
  $products = \App\Models\Products::paginate(10);
  $totalProducts = \App\Models\Products::count();
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();

  $totalOrders = \App\Models\Order::all()->count();
  $totalTopSale = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalDiscount = 0;
  $totalOutOfStock = \App\Models\Products::where('stock', '=', 0)->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Produk')
@section('content')
  <h4 class="mb-1">Daftar Produk</h4>
  <p class="mb-3">Sebuah produk akan dibeli oleh pelanggan</p>
  @if (Auth::user()->role_id == 2)
    <x-basic-button :label="'Tambah Produk'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.product')" />
  @endif

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalProducts" :label="'Produk'" :icon="'cart-outline'" :variant="'primary'"
      :class="'border-end'" :description="'Jumlah Produk'" />
    <x-product-card :datas="$products" :condition="$totalTopSale" :label="'Produk Paling Laku'" :icon="'shopping-outline'" :variant="'info'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalDiscount" :label="'Produk Diskon'" :icon="'wallet-giftcard'" :variant="'success'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalOutOfStock" :label="'Produk Habis'" :icon="'sale-outline'" :variant="'dark'" />
  </x-product-separator>

  <x-products-tabel :title="'Data Produk'" :datas="$products" :fields="['no', 'produk', 'kategori / penjual', 'harga', 'stok', 'Publish Pada', 'Aksi']" />
@endsection
