@php
  // Greetings Card
  $greetings = 'Halo, Admin';
  $descriptionGreetings = 'Selamat datang di dashboard admin';
  $label = 'Total Pengguna';
  $value = \App\Models\User::count();
  $actionLabel = 'Selengkapnya';

  // Transaction Card
  $title = 'Transaksi'; 
  $description = 'Total transaksi dibulan ini';

  // Transaction Item Card
  $totalSeller = \App\Models\Seller::count();
  $totalCustomer = \App\Models\Customer::count();
  $totalProduct = \App\Models\Products::count();
  $totalOrder = \App\Models\Order::count();

  // Top Card Content
  $sellers = \App\Models\Seller::take(5)->get();
  $customers = \App\Models\Customer::take(5)->get();
  $orders = \App\Models\Order::take(5)->get();
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')

@section('content')
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Seller'" :value="$totalSeller" :variant="'info'" :icon="'account-group-outline'" />
      <x-transaction-item-card :label="'Customer'" :value="$totalCustomer" :variant="'success'" :icon="'account-multiple-outline'" />
      <x-transaction-item-card :label="'Product'" :value="$totalProduct" :variant="'warning'" :icon="'package'" />
      <x-transaction-item-card :label="'Order'" :value="$totalOrder" :variant="'danger'" :icon="'basket-outline'" />
    </x-transactions-card>

    {{-- <x-bar-graph-card />
    <x-earnings-card />
    <x-four-card>
      <x-graph-card-content />
      <x-graph-card-content />
      <x-graph-card-content />
      <x-graph-card-content />
    </x-four-card> --}}

    <x-top-sellers-card :datas="$sellers" :title="'Top Earnings Seller'" />

    <x-user-table-card />
  </x-content-card>
@endsection
