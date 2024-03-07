@php
  $totalProducts = \App\Models\Products::where('seller_id', $user->id)->count();
  $totalEarnings = number_format(
      \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
          ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
          ->where('sellers.id', $user->id)
          ->sum('products.price'),
      2,
      ',',
      '.',
  );
  $user_id = Hash::make($user->uuid);
  $user_id = Str::substr($user_id, 0, 10);
  $user_id = Str::replace('$', '', $user_id);
  $user_id = Str::upper($user_id);
@endphp
@extends('layouts.authenticated')
@section('title', 'Detail User')
@section('content')
  <x-detail-breadcrumbs :id="'User ID #' . $user_id" :created="date('d F, H:i', strtotime($user->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($user->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($user->created_at)) . ' AM'" />
  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <div class="card mb-4">
        <x-detail-user :image="asset('materio/assets/img/avatars/3.png')" :id="'#' . $user_id" :username="$user->name" :email="$user->email" :role="$user->role->role_name"
          :type="'button'" :href="route('admin.edit.user', $user->uuid)" :variant="'primary'" :icon="'pencil-outline'" :label="'Edit Details'"
          :class="'btn-sm'" />
      </div>
    </div>
  </div>
@endsection
