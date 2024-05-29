@extends('layouts.authenticated')
@section('title', 'Pesanan')
@section('content')
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan anda yang selesai, belum dibayar, dan dibatalkan</p>

  <x-detail-order>
    <x-detail-order-item :label="'Selesai'" :icon="'check'" :variant="'success'" :condition="$countPaid" />
    <x-detail-order-item :label="'Belum Bayar'" :icon="'off'" :variant="'warning'" :condition="$countUnpaid" />
    <x-detail-order-item :label="'Kadaluarsa'" :icon="'remove'" :variant="'danger'" :condition="$countExpire" />
    <x-detail-order-item :label="'Dibatalkan'" :icon="'minus'" :variant="'dark'" :condition="$countCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection
