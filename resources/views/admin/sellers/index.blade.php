@php
  $sellerCount = \App\Models\Seller::all()->count();
@endphp

@extends('layouts.authenticated')

@section('title', 'Sellers')

@section('content')
  <h4 class="mb-1">Seller list</h4>
  <p class="mb-3">A seller selling the products</p>
  <x-basic-button :label="'Add new seller'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.seller')" />

  <div class="row g-4 mb-4">
    <x-seller-card :datas="$sellers" :label="'Session'" :count="$sellerCount" :description="'Total sellers'" :icon="'account-outline'"
      :variant="'primary'" />
    <x-seller-card :datas="$sellers" :label="'Active sellers'" :count="$sellerCount" :icon="'account-check-outline'" :variant="'success'" />
    <x-seller-card :datas="$sellers" :label="'Unactive sellers'" :count="$sellerCount" :icon="'account-off-outline'" :variant="'danger'" />
    <x-seller-card :datas="$sellers" :label="'Pending sellers'" :count="$sellerCount" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-seller-table :title="'List of sellers'" :datas="$sellers" :fields="['No', 'Seller', 'Products', 'Gender / Address', 'Status / Phone', 'Bank', 'Created At', 'Actions']" />
@endsection
