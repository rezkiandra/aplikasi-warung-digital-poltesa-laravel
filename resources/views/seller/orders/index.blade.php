@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan pelanggan yang membeli produk anda</p>

  <x-detail-order>
    <x-detail-order-item :label="'Selesai'" :icon="'basket-check-outline'" :class="'border-end'" :variant="'success'" :condition="$totalPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'basket-off-outline'" :class="'border-end'" :variant="'warning'" :condition="$totalUnpaid" />
    <x-detail-order-item :label="'Kadaluarsa'" :icon="'basket-remove-outline'" :class="'border-end'" :variant="'danger'" :condition="$totalExpire" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'basket-minus-outline'" :class="'border-end'" :variant="'dark'" :condition="$totalCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
