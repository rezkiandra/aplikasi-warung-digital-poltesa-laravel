@extends('layouts.authenticated')
@section('title', 'Produk')
@section('content')
  <h4 class="mb-1">Daftar Produk</h4>
  <p class="mb-3">Sebuah produk akan dibeli oleh pelanggan</p>
  @if ($currentSeller->status == 'active')
    <x-alert :type="'primary'" :message="'Status anda sebagai penjual telah aktif. Anda dapat mengelola berbagai produk!'" :icon="'account-check-outline'" />
    <x-basic-button :label="'Tambah Produk'" :icon="'plus'" :class="'w-0 text-uppercase mb-3'" :variant="'primary'" :href="route('seller.create.product')" />
  @elseif($currentSeller->status == 'pending')
    <x-alert :type="'warning'" :message="'Status anda sebagai penjual masih pending. Silahkan hubungi admin untuk menyetujui sebagai penjual!'" :icon="'account-search-outline'" />
  @elseif ($currentSeller->status == 'inactive')
    <x-alert :type="'danger'" :message="'Status anda sebagai penjual sudah tidak aktif. Silahkan hubungi admin untuk mengaktifkan kembali sebagai penjual!.'" :icon="'account-off-outline'" />
  @endif

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalProductCurrentSeller" :label="'Produk'" :icon="'cart-outline'" :variant="'primary'"
      :class="'border-end'" :description="'Jumlah Produk'" />
    <x-product-card :datas="$products" :condition="$totalProductTopSaleCurrentSeller" :label="'Produk Terjual'" :icon="'shopping-outline'" :variant="'info'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalProductDiscountCurrentSeller" :label="'Produk Diskon'" :icon="'wallet-giftcard'" :variant="'success'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalProductOutOfStockCurrentSeller" :label="'Produk Habis'" :icon="'sale-outline'" :variant="'dark'" />
  </x-product-separator>

  <x-products-tabel-seller :title="'Data Produk'" :datas="$products" />
@endsection
