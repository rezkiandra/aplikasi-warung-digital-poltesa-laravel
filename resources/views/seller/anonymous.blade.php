@php
  $alertMessage = 'Biodata anda belum lengkap. Silahkan dilengkapi untuk menggunakan layanan!';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard seller';
  $label = 'Total Produk';
  $value = '0';
  $actionLabel = 'Selengkapnya';
  $route = route('seller.products');

  $title = 'Produk';
  $description = 'Total transaksi akhir ini';

  $titleEarnings = 'Total Pendapatan';
  $descriptionEarnings = 'Total pendapatan akhir ini';
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-alert :type="'warning py-lg-3 py-md-3'" :message="$alertMessage" :icon="'account-search-outline'" />
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Pesanan'" :value="'0'" :variant="'info'" :icon="'basket-outline'" />
      <x-transaction-item-card :label="'Selesai'" :value="'0'" :variant="'success'" :icon="'basket-check-outline'" />
      <x-transaction-item-card :label="'Belum Baayar'" :value="'0'" :variant="'warning'" :icon="'basket-off-outline'" />
      <x-transaction-item-card :label="'Dibatalkan'" :value="'0'" :variant="'danger'" :icon="'basket-remove-outline'" />
    </x-transactions-card>

    <x-earnings-card :title="$titleEarnings" :description="$descriptionEarnings" :earnings="'0'" />
    <x-top-customers-card :title="'Pelanggan Teratas 🎉'" />
    <x-top-products-card :title="'Penjualan Produk Teratas 🎉'" />
  </x-content-card>
@endsection
