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
@section('title', 'Penjual')
@section('content')
  <h4 class="mb-1">Daftar Penjual</h4>
  <p class="mb-3">Seorang penjual akan menjual berbagai macam produk</p>
  <x-basic-button :label="'Tambah penjual'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.seller')" />

  <div class="row g-4 mb-4">
    <x-seller-card :datas="$sellers" :label="'Sesi'" :count="$sellerCount" :description="'Jumlah Penjual'" :icon="'account-outline'"
      :variant="'primary'" :growth="$sellerPercentage ? '+' . $sellerPercentage . '%' : '-' . $sellerPrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Aktif'" :count="$activeSeller" :icon="'account-check-outline'" :variant="'success'"
      :growth="$sellerActivePercentage ? '+' . $sellerActivePercentage . '%' : '-' . $sellerActivePrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Tidak Aktif'" :count="$inactiveSeller" :icon="'account-off-outline'" :variant="'danger'"
      :growth="$sellerInactivePercentage
          ? '+' . $sellerInactivePercentage . '%'
          : '-' . $sellerInactivePrePercentage . '%'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Pending'" :count="$pendingSeller" :icon="'account-search-outline'" :variant="'warning'"
      :growth="$sellerPendingPercentage
          ? '+' . $sellerPendingPercentage . '%'
          : '-' . $sellerPendingPrePercentage . '%'" />
  </div>

  <x-seller-table :title="'Data Penjual'" :datas="$sellers" :fields="['No', 'Penjual', 'Gender / Alamat', 'Status / Nomor HP', 'Bank', 'Dibuat Pada', 'Aksi']" />
@endsection
