@php
  $products = \App\Models\Products::paginate(10);
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
  $productPercentage = round((\App\Models\Products::count() ?? 0 / \App\Models\ProductCategory::count()) * 100, 2);
  $productPrePercentage = \App\Models\Products::count();

  $totalOrders = \App\Models\Order::all()->count();
  $totalTopSale = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalDiscount = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left');
@endphp

@extends('layouts.authenticated')
@section('title', 'Products')

@section('content')
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  <x-basic-button :label="'Add new product'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.product')" />

  <x-product-separator>
    <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Products'" :icon="'cart-outline'" :variant="$productPercentage > 0 ? 'primary' : 'danger'"
      :percentage="$productPercentage ? '+' . $productPercentage . '%' : '-' . $productPrePercentage . '%'" :class="'border-end'" :totalOrders="$totalOrders . ' orders'" />
    <x-product-card :datas="$products" :condition="\App\Models\Order::where('product_id', '>=', 20)->count()" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'" :class="'border-end'"
      :totalOrders="$totalOrders . ' orders'" />
    <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'"
      :class="'border-end'" :totalOrders="$totalOrders . ' orders'" />
    <x-product-card :datas="$products" :condition="\App\Models\Products::where('stock', '=', 0)->count()" :label="'Out of Stock'" :icon="'sale-outline'" :variant="'dark'"
      :totalOrders="$totalOrders . ' orders'" />
  </x-product-separator>

  <x-products-tabel :title="'List of products'" :datas="$products" :fields="['no', 'product', 'category / seller', 'price', 'stock', 'published on', 'actions']" />
@endsection
