@php
  $products = \App\Models\Products::paginate(10);
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Products')

@section('content')
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  <x-basic-button :label="'Add new product'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.product')" />

  <div class="card mb-4">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Total Products'" :icon="'cart-outline'" :variant="'primary'" :growth="'danger'"
            :class="'border-end'"  />
          <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Top Sale'" :icon="'shopping-outline'" :variant="'info'" :growth="'danger'"
            :class="'border-end'" />
          <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Discount'" :icon="'wallet-giftcard'" :variant="'success'" :growth="'danger'"
            :class="'border-end'" />
          <x-product-card :datas="$products" :condition="\App\Models\Products::all()->count()" :label="'Sold Out'" :icon="'sale-outline'" :variant="'dark'"
            :growth="'danger'" />
        </div>
      </div>
    </div>
  </div>

  <x-products-tabel :title="'List of products'" :datas="$products" :fields="['no', 'product', 'category', 'price', 'stock', 'published on', 'actions']" />
@endsection
