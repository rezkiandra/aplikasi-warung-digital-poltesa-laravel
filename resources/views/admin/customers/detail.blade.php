@extends('layouts.authenticated')
@section('title', 'Detail Pelanggan')
@section('content')
  <x-detail-breadcrumbs :id="'Customer ID #' . $customer_id" :created="date('d F, H:i', strtotime($customer->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($customer->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($customer->created_at)) . ' AM'" />

  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card mb-4">
        <x-detail-form :image="asset('storage/' . $customer->image)" :name="$customer->full_name" :id="'#' . $customer_id" :phone="$customer->phone_number" :address="$customer->address"
          :status="$customer->status" :totalOrder="$totalOrder" :labelOrder="'Pesanan'" :spentCost="'Rp ' . $spentCost" :labelCost="'Pembelian'" :username="$username"
          :email="$email" :status="$customer->status" :type="'button'" :href="route('admin.edit.customer', $customer->uuid)" :variant="'primary'"
          :icon="'pencil-outline'" :label="'Edit Details'" :class="'btn-sm'" />
      </div>
    </div>

    <x-detail-card-content>
      <x-detail-card :title="'Wishlist'" :count="$totalWishlist" :countDescription="'items produk'" :icon="'star-outline'" :variant="'warning'" />
      <x-detail-card :title="'Keranjang'" :count="$totalCarts" :countDescription="'items produk'" :icon="'cart-outline'" :variant="'info'" />
      @if ($orders->count() > 0)
        <x-orders-customer-detail :datas="$orders" />
      @endif
    </x-detail-card-content>
  </div>
@endsection
