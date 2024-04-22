@php
  $sellerCount = \App\Models\Seller::all()->count();
  $activeSeller = \App\Models\Seller::where('status', 'active')->count();
  $inactiveSeller = \App\Models\Seller::where('status', 'inactive')->count();
  $pendingSeller = \App\Models\Seller::where('status', 'pending')->count();
  $sellerPercentage = round((\App\Models\Seller::count() ?? 0 / \App\Models\Seller::count()) * 100, 2);
  $sellerPrePercentage = \App\Models\Seller::count();

  $sellerActivePercentage = round(
      (\App\Models\Seller::where('status', 'active')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerActivePrePercentage = \App\Models\Seller::where('status', 'active')->count();
  $sellerInactivePercentage = round(
      (\App\Models\Seller::where('status', 'inactive')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerInactivePrePercentage = \App\Models\Seller::where('status', 'inactive')->count();
  $sellerPendingPercentage = round(
      (\App\Models\Seller::where('status', 'pending')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerPendingPrePercentage = \App\Models\Seller::where('status', 'pending')->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Sellers')
@section('content')
  <h4 class="mb-1">Seller list</h4>
  <p class="mb-3">A seller selling the products</p>
  <x-basic-button :label="'Add new seller'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.seller')" />

  <div class="row g-4 mb-4">
    <x-seller-card :datas="$sellers" :label="'Session'" :count="$sellerCount" :description="'Total sellers'" :icon="'account-outline'"
      :variant="'primary'" :growth="$sellerPercentage ? '+' . $sellerPercentage . '%' : '-' . $sellerPrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Active sellers'" :count="$activeSeller" :icon="'account-check-outline'" :variant="'success'"
      :growth="$sellerActivePercentage ? '+' . $sellerActivePercentage . '%' : '-' . $sellerActivePrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Unactive sellers'" :count="$inactiveSeller" :icon="'account-off-outline'" :variant="'danger'"
      :growth="$sellerInactivePercentage
          ? '+' . $sellerInactivePercentage . '%'
          : '-' . $sellerInactivePrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Pending sellers'" :count="$pendingSeller" :icon="'account-search-outline'" :variant="'warning'"
      :growth="$sellerPendingPercentage
          ? '+' . $sellerPendingPercentage . '%'
          : '-' . $sellerPendingPrePercentage . '%'" />
  </div>

  <x-seller-table :title="'List of sellers'" :datas="$sellers" :fields="['No', 'Seller', 'Products', 'Gender / Address', 'Status / Phone', 'Bank', 'Created At', 'Actions']" />
@endsection
