@extends('layouts.authenticated')
@section('title', 'Produk')
@section('content')
  <h4 class="mb-1">Daftar Produk</h4>
  <p class="mb-3">Sebuah produk akan dibeli oleh pelanggan</p>
  @if (Auth::user()->seller)
    <x-basic-button :label="'Tambah Produk'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.product')" />
  @endif

  <x-product-separator>
    <x-product-card :datas="$products" :condition="$totalProducts" :label="'Produk'" :icon="'cart-outline'" :variant="'primary'"
      :class="'border-end'" :description="'Jumlah Produk'" />
    <x-product-card :datas="$products" :condition="$totalTopSale" :label="'Produk Paling Laku'" :icon="'shopping-outline'" :variant="'info'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalDiscount" :label="'Produk Diskon'" :icon="'wallet-giftcard'" :variant="'success'"
      :class="'border-end'" />
    <x-product-card :datas="$products" :condition="$totalOutOfStock" :label="'Produk Habis'" :icon="'sale-outline'" :variant="'dark'" />
  </x-product-separator>

  <x-products-tabel :title="'Data Produk'" :datas="$products" :fields="['no', 'produk', 'kategori / penjual', 'harga', 'stok', 'terjual', 'Publish Pada', 'Aksi']" />
@endsection

{{-- @push('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endpush

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <script>
    $(document).ready(function() {
      $('#productsTable').DataTable();
    });
  </script>
@endpush --}}
