@php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
  $productPrePercentageCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();

  $totalProductCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();
  $productPercentageCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductTopSaleCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPercentageTopSaleCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
          ->where('orders.product_id', '>=', 20)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  // $productPercentageDiscountCurrentSeller = round(
  //     (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
  //         ->where('orders.product_id', '>=', 20)
  //         ->count() ??
  //         0 / \App\Models\ProductCategory::count()) *
  //         100,
  //     2,
  // );

  // $productPercentageOutOfStockCurrentSeller = round(
  //     (\App\Models\Products::where('stock', '=', 0)
  //         ->where('seller_id', Auth::user()->seller->id)
  //         ->count() ??
  //         0 / \App\Models\ProductCategory::count()) *
  //         100,
  //     2,
  // );

@endphp

@extends('layouts.authenticated')
@section('title', 'Products')

@section('content')
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  <x-basic-button :label="'Add new product'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('seller.create.product')" />

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalProductCurrentSeller" :label="'Products'" :icon="'cart-outline'" :variant="'primary'"
      :percentage="$productPercentageCurrentSeller
          ? '+' . $productPercentageCurrentSeller . '%'
          : '-' . $productPrePercentageCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total products'" />

    <x-product-card :datas="$products" :condition="$totalProductTopSaleCurrentSeller" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'"
      :percentage="$productPercentageTopSaleCurrentSeller
          ? '+' . $productPercentageTopSaleCurrentSeller . '%'
          : '-' . $productPercentageCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total top sale'" />

    {{-- <x-product-card :datas="$products" :condition="$totalDiscountCurrentSeller" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'"
      :percentage="$totalDiscountCurrentSeller
          ? '+' . $totalDiscountCurrentSeller . '%'
          : '-' . $totalDiscountCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total discount'" /> --}}

    {{-- <x-product-card :datas="$products" :condition="$totalOutOfStockCurrentSeller" :label="'Out of Stock'" :icon="'sale-outline'" :variant="'dark'"
      :percentage="$totalOutOfStockCurrentSeller
          ? '+' . $totalOutOfStockCurrentSeller . '%'
          : '-' . $totalOutOfStockCurrentSeller . '%'" :totalOrders="'Total out of stock'" /> --}}
  </x-product-separator>

  <x-product-tabel-seller :title="'List of products'" :datas="$products" :fields="['no', 'product', 'category', 'price', 'stock', 'published on', 'actions']" />
@endsection
