@php
  $customerCount = \App\Models\Customer::all()->count();
  $activeCustomer = \App\Models\Customer::where('status', 'active')->count();
  $inactiveCustomer = \App\Models\Customer::where('status', 'inactive')->count();
  $pendingCustomer = \App\Models\Customer::where('status', 'pending')->count();
  $customerPercentage = round((\App\Models\Customer::count() ?? 0 / \App\Models\Customer::count()) * 100, 2);
  $customerPrePercentage = \App\Models\Customer::count();
  $customerActivePercentage = round(
      (\App\Models\Customer::where('status', 'active')->count() ?? 0 / \App\Models\Customer::count()) * 100,
      2,
  );
  $customerActivePrePercentage = \App\Models\Customer::where('status', 'active')->count();
  $customerInactivePercentage = round(
      (\App\Models\Customer::where('status', 'inactive')->count() ?? 0 / \App\Models\Customer::count()) * 100,
      2,
  );
  $customerInactivePrePercentage = \App\Models\Customer::where('status', 'inactive')->count();
  $customerPendingPercentage = round(
      (\App\Models\Customer::where('status', 'pending')->count() ?? 0 / \App\Models\Customer::count()) * 100,
      2,
  );
  $customerPendingPrePercentage = \App\Models\Customer::where('status', 'pending')->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pelanggan')
@section('content')
  <h4 class="mb-1">Daftar Pelanggan</h4>
  <p class="mb-3">Seorang pelanggan akan membeli berbagai macam produk yang tersedia</p>
  <x-basic-button :label="'Tambah pelanggan'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.customer')" />
  <div class="row g-4 mb-4">
    <x-customer-card :datas="$customers" :label="'Sesi'" :count="$customerCount" :description="'Jumlah Pelanggan'" :icon="'account-outline'"
      :variant="'primary'" :percentage="$customerPercentage ? '+' . $customerPercentage . '%' : '-' . $customerPrePercentage . '%'" :condition="$customerCount" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Aktif'" :count="$activeCustomer" :icon="'account-check-outline'" :variant="'success'"
      :percentage="$customerActivePercentage
          ? '+' . $customerActivePercentage . '%'
          : '-' . $customerActivePrePercentage . '%'" :condition="$activeCustomer" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Tidak Aktif'" :count="$inactiveCustomer" :icon="'account-off-outline'" :variant="'danger'"
      :percentage="$customerInactivePercentage
          ? '+' . $customerInactivePercentage . '%'
          : '-' . $customerInactivePrePercentage . '%'" :condition="$inactiveCustomer" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Pending'" :count="$pendingCustomer" :icon="'account-search-outline'" :variant="'warning'"
      :percentage="$customerPendingPercentage
          ? '+' . $customerPendingPercentage . '%'
          : '-' . $customerPendingPrePercentage . '%'" :condition="$pendingCustomer" />
  </div>
  <x-customer-table :title="'Data Pelanggan'" :datas="$customers" :fields="['No', 'Pelanggan', 'Gender / Alamat', 'Status / Nomor HP', 'Dibuat Pada', 'Aksi']" />
@endsection
