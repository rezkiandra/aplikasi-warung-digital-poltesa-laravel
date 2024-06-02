@php
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard customer';
  $label = 'Total Pesanan';
  $value = '0';
  $actionLabel = 'Selengkapnya';
  $route = route('customer.orders');

  $title = 'Pesanan';
  $description = 'Total pesanan akhir ini';
  $alertMessage = 'Biodata anda belum lengkap. Silahkan dilengkapi untuk melakukan layanan!';
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-alert :type="'warning py-lg-3 py-md-3'" :message="$alertMessage" :icon="'account-search-outline'" />
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Selesai'" :variant="'success'" :icon="'basket-check-outline'" />
      <x-transaction-item-card :label="'Belum Bayar'" :variant="'warning'" :icon="'basket-off-outline'" />
      <x-transaction-item-card :label="'Kadaluarsa'" :variant="'danger'" :icon="'basket-remove-outline'" />
      <x-transaction-item-card :label="'Dibatalkan'" :variant="'dark'" :icon="'basket-minus-outline'" />
    </x-transactions-card>
  </x-content-card>
@endsection
