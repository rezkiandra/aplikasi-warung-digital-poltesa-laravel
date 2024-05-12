@php
  $products = \App\Models\Products::where('seller_id', $seller->id)
      ->orderBy('id', 'desc')
      ->paginate(5);
  $totalProducts = \App\Models\Products::where('seller_id', $seller->id)->count();
  $totalEarnings = number_format(
      \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
          ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
          ->where('sellers.id', $seller->id)
          ->where('orders.status', 'paid')
          ->sum('total_price'),
      0,
      ',',
      '.',
  );

  $totalOrders = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
      ->where('sellers.id', $seller->id)
      ->count();

  $username = \App\Models\User::where('id', $seller->user_id)->first()->name;
  $email = \App\Models\User::where('id', $seller->user_id)->first()->email;
  $seller_id = Hash::make($seller->uuid);
  $seller_id = Str::substr($seller_id, 0, 10);
  $seller_id = Str::replace('$', '', $seller_id);
  $seller_id = Str::upper($seller_id);
@endphp
@extends('layouts.authenticated')
@section('title', 'Detail Penjual')
@section('content')
  <x-detail-breadcrumbs :id="'Seller ID #' . $seller_id" :created="date('d F, H:i', strtotime($seller->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($seller->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($seller->created_at)) . ' AM'" />

  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <div class="card mb-4">
        <x-detail-form :image="asset('storage/' . $seller->image)" :name="$seller->full_name" :id="'#' . $seller_id" :phone="$seller->phone_number" :address="$seller->address"
          :status="$seller->status" :totalOrder="$totalProducts" :labelOrder="'Produk'" :spentCost="'Rp ' . $totalEarnings" :labelCost="'Pendapatan'" :username="$username"
          :email="$email" :status="$seller->status" :type="'button'" :href="route('admin.edit.seller', $seller->uuid)" :variant="'primary'"
          :icon="'pencil-outline'" :label="'Edit Details'" :class="'btn-sm'" />
      </div>
    </div>

    <x-detail-card-content>
      <x-detail-card :title="'Pesanan'" :count="$totalOrders" :countDescription="'items pesanan'" :icon="'star-outline'" :variant="'warning'" />
      <x-detail-card :title="'Produk'" :count="$totalProducts" :countDescription="'items produk'" :icon="'cart-outline'" :variant="'info'" />
      @if ($products->count() > 0)
        <x-products-seller-detail :datas="$products" :title="'Produk terbaru'" />
      @endif
    </x-detail-card-content>
  </div>
@endsection
