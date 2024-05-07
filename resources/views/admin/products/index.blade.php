@php
  $products = \App\Models\Products::paginate(10);
  $totalProducts = $products->count();
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
  $productPercentage = round((\App\Models\Products::count() ?? 0 / \App\Models\ProductCategory::count()) * 100, 2);
  $productPrePercentage = \App\Models\Products::count();

  $totalOrders = \App\Models\Order::all()->count();
  $totalTopSale = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalDiscount = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
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
      :percentage="$productPercentage ? '+' . $productPercentage . '%' : '-' . $productPrePercentage . '%'" :class="'border-end'" :description="'Jumlah Produk'" />
    <x-product-card :datas="$products" :condition="$totalTopSale" :label="'Produk Teratas'" :icon="'shopping-outline'" :variant="'info'"
      :percentage="$totalTopSale ? '+' . $totalTopSale . '%' : '-' . $totalTopSale . '%'" :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalDiscount" :label="'Produk Diskon'" :icon="'wallet-giftcard'" :variant="'success'"
      :percentage="$totalDiscount ? '+' . $totalDiscount . '%' : '-' . $totalDiscount . '%'" :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalOutOfStock" :label="'Produk Habis'" :icon="'sale-outline'" :variant="'dark'"
      :percentage="$totalOutOfStock ? '+' . $totalOutOfStock . '%' : '-' . $totalOutOfStock . '%'" />
  </x-product-separator>

  <x-products-tabel :title="'Data Produk'" :datas="$products" :fields="['no', 'produk', 'kategori / penjual', 'harga', 'stok', 'Publish Pada', 'Aksi']" />
@endsection
