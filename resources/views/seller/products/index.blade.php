@php
  $currentSeller = \App\Models\Seller::where('user_id', Auth::user()->id)->first();
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();

  $totalProductCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();
  $productPercentageCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductTopSaleCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPercentageTopSaleCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
          ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
          ->where('orders.product_id', '>=', 20)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductDiscountCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPercentageDiscountCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
          ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
          ->where('orders.product_id', '>=', 20)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductOutOfStockCurrentSeller = \App\Models\Products::where('stock', '=', 0)
      ->where('seller_id', Auth::user()->seller->id)
      ->count();
  $productPercentageOutOfStockCurrentSeller = round(
      (\App\Models\Products::where('stock', '=', 0)
          ->where('seller_id', Auth::user()->seller->id)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $productPrePercentageCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();
  $productPrePercentageTopSaleCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPrePercentageDiscountCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPrePentageOutOfStockCurrentSeller = \App\Models\Products::where('stock', '=', 0)->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Products')

@section('content')
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  @if ($currentSeller->status == 'active')
    <x-alert :type="'primary'" :message="'Your account is active. And you can add new product'" :icon="'account-check-outline'" />
    <x-basic-button :label="'Add new product'" :icon="'plus'" :class="'w-0 text-uppercase mb-3'" :variant="'primary'" :href="route('seller.create.product')" />
  @elseif($currentSeller->status == 'pending')
    <x-alert :type="'warning'" :message="'Your account is pending. Please wait for the admin to approve your account.'" :icon="'account-search-outline'" />
  @elseif ($currentSeller->status == 'inactive')
    <x-alert :type="'danger'" :message="'Your account is inactive. Please contact the admin to reactive your account.'" :icon="'account-off-outline'" />
  @endif

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalProductCurrentSeller" :label="'Products'" :icon="'cart-outline'" :variant="'primary'"
      :percentage="$productPercentageCurrentSeller
          ? '+' . $productPercentageCurrentSeller . '%'
          : '-' . $productPrePercentageCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total products'" />

    <x-product-card :datas="$products" :condition="$totalProductTopSaleCurrentSeller" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'"
      :percentage="$productPercentageTopSaleCurrentSeller
          ? '+' . $productPercentageTopSaleCurrentSeller . '%'
          : '-' . $productPrePercentageTopSaleCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total top sale'" />

    <x-product-card :datas="$products" :condition="$totalProductDiscountCurrentSeller" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'"
      :percentage="$productPercentageDiscountCurrentSeller
          ? '+' . $totalProductDiscountCurrentSeller . '%'
          : '-' . $productPrePercentageDiscountCurrentSeller . '%'" :class="'border-end'" :totalOrders="'Total discount'" />

    <x-product-card :datas="$products" :condition="$totalProductOutOfStockCurrentSeller" :label="'Out of Stock'" :icon="'sale-outline'" :variant="'dark'"
      :percentage="$productPercentageOutOfStockCurrentSeller
          ? '+' . $totalProductOutOfStockCurrentSeller . '%'
          : '-' . $productPrePentageOutOfStockCurrentSeller . '%'" :totalOrders="'Total out of stock'" />
  </x-product-separator>

  <x-products-tabel-seller :title="'List of products'" :datas="$products" />
@endsection
