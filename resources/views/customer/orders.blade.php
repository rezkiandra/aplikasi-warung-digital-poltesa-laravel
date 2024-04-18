@php
  if (Auth::user()->customer) {
      $customer_id = Auth::user()->customer->id;
  } else {
      $customer_id = null;
  }

  $countOrder = \App\Models\Order::where('customer_id', $customer_id)->count();
  $countUnpaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'unpaid')->count();
  $countPaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'paid')->count();
  $countCancelled = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'cancelled')->count();
@endphp


@extends('layouts.authenticated')
@section('title', 'Orders')
@section('content')
  <h4 class="mb-1">Orders</h4>
  <p class="mb-3">List of orders</p>

  <x-detail-order>
    <x-detail-order-item :label="'Total Orders'" :icon="'wallet-giftcard'" :class="'border-end'" :variant="'primary'" :condition="$countOrder" />
    <x-detail-order-item :label="'Unpaid'" :icon="'wallet-outline'" :class="'border-end'" :variant="'danger'" :condition="$countUnpaid" />
    <x-detail-order-item :label="'Completed'" :icon="'check-all'" :class="'border-end'" :variant="'success'" :condition="$countPaid" />
    <x-detail-order-item :label="'Cancelled'" :icon="'alert-circle-outline'" :variant="'dark'" :condition="$countCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
