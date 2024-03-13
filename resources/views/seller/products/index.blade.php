@php
  $products = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->paginate(10);
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
  $productPercentage = round((\App\Models\Products::count() ?? 0 / \App\Models\ProductCategory::count()) * 100, 2);
  $productPrePercentage = \App\Models\Products::count();

  $totalOrders = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->join('sellers', 'sellers.id', '=', 'products.seller_id', 'left')
      ->where('seller_id', Auth::user()->seller->id)
      ->count();
  $totalTopSale = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalDiscount = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalOutOfStock = \App\Models\Products::where('stock', '=', 0)->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Products')

@section('content')
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  @if (Auth::user()->role_id == 2)
    <x-basic-button :label="'Add new product'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('seller.create.product')" />
  @endif

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalOrders" :label="'Products'" :icon="'cart-outline'" :variant="'primary'"
      :percentage="$productPercentage ? '+' . $productPercentage . '%' : '-' . $productPrePercentage . '%'" :class="'border-end'" :totalOrders="'Total products'" />
    <x-product-card :datas="$products" :condition="$totalTopSale" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'"
      :percentage="$totalTopSale ? '+' . $totalTopSale . '%' : '-' . $totalTopSale . '%'" :class="'border-end'" :totalOrders="$totalOrders . ' orders'" />
    <x-product-card :datas="$products" :condition="$totalDiscount" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'"
      :percentage="$totalDiscount ? '+' . $totalDiscount . '%' : '-' . $totalDiscount . '%'" :class="'border-end'" :totalOrders="$totalOrders . ' orders'" />
    <x-product-card :datas="$products" :condition="$totalOutOfStock" :label="'Out of Stock'" :icon="'sale-outline'" :variant="'dark'"
      :percentage="$totalOutOfStock ? '+' . $totalOutOfStock . '%' : '-' . $totalOutOfStock . '%'" :totalOrders="$totalOrders . ' orders'" />
  </x-product-separator>

  <x-product-tabel-seller :title="'List of products'" :datas="$products" :fields="['no', 'product', 'category', 'price', 'stock', 'published on', 'actions']" />
@endsection
