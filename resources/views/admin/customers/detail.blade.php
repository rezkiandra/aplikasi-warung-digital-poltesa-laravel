@php
  $totalOrder = \App\Models\Order::where('customer_id', $customer->id)->count();
  $spentCost = number_format(\App\Models\Order::where('customer_id', $customer->id)->sum('total_price'), 2, ',', '.');

  $username = \App\Models\User::where('id', $customer->user_id)->first()->name;
  $email = \App\Models\User::where('id', $customer->user_id)->first()->email;
  $customer_id = Hash::make($customer->uuid);
  $customer_id = Str::substr($customer_id, 0, 10);
  $customer_id = Str::replace('$', '', $customer_id);
  $customer_id = Str::upper($customer_id);
@endphp

@extends('layouts.authenticated')
@section('title', 'Detail Customer')
@section('content')
  <x-detail-breadcrumbs :id="'Customer ID #' . $customer_id" :created="date('d F, H:i', strtotime($customer->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($customer->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($customer->created_at)) . ' AM'" />

  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <div class="card mb-4">
        <x-detail-form :image="asset('storage/' . $customer->image)" :name="$customer->full_name" :id="'#' . $customer_id" :phone="$customer->phone_number" :address="$customer->address"
          :status="$customer->status" :totalOrder="$totalOrder" :labelOrder="'Orders'" :spentCost="$spentCost" :labelCost="'Spent'" :username="$username"
          :email="$email" :status="$customer->status" :type="'button'" :href="route('admin.edit.customer', $customer->uuid)" :variant="'primary'"
          :icon="'pencil-outline'" :label="'Edit Details'" :class="'btn-sm'" />
      </div>
    </div>

    <x-detail-card-content>
      <x-detail-card :title="'Wishlist'" :description="'lorem'" :count="'4'" :countDescription="'Items in wishlist'" :icon="'star-outline'"
        :variant="'warning'" />
      <x-detail-card :title="'Cart'" :description="'lorem'" :count="'4'" :countDescription="'Items in cart'" :icon="'cart-outline'"
        :variant="'info'" />
    </x-detail-card-content>
  </div>
@endsection
