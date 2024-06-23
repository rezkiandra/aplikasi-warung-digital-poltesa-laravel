@extends('layouts.authenticated')
@section('title', 'Pelanggan')
@section('content')
  <h4 class="mb-1">Daftar Pelanggan</h4>
  <p class="mb-3">Seorang pelanggan akan membeli berbagai macam produk yang tersedia</p>
  <x-basic-button :label="'Tambah pelanggan'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.customer')" />
  <div class="row g-4 mb-4">
    <x-customer-card :datas="$customers" :label="'Sesi'" :count="$customerCount" :description="'Jumlah Pelanggan'" :icon="'account-outline'"
      :variant="'primary'" :condition="$customerCount" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Aktif'" :count="$activeCustomer" :icon="'account-check-outline'" :variant="'success'"
      :condition="$activeCustomer" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Tidak Aktif'" :count="$inactiveCustomer" :icon="'account-off-outline'" :variant="'danger'"
      :condition="$inactiveCustomer" />
    <x-customer-card :datas="$customers" :label="'Pelanggan Pending'" :count="$pendingCustomer" :icon="'account-search-outline'" :variant="'warning'"
      :condition="$pendingCustomer" />
  </div>
  <x-customer-table :title="'Data Pelanggan'" :datas="$customers" :fields="['No', 'Pelanggan', 'Gender / Alamat', 'Status / Nomor HP', 'Dibuat Pada', 'Aksi']" />
@endsection
