@extends('layouts.authenticated')
@section('title', 'Penjual')
@section('content')
  <h4 class="mb-1">Daftar Penjual</h4>
  <p class="mb-3">Seorang penjual akan menjual berbagai macam produk</p>
  <x-basic-button :label="'Tambah penjual'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.seller')" />

  <div class="row g-4 mb-4">
    <x-seller-card :datas="$sellers" :label="'Sesi'" :count="$sellerCount" :description="'Jumlah Penjual'" :icon="'account-outline'"
      :variant="'primary'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Aktif'" :count="$activeSeller" :icon="'account-check-outline'" :variant="'success'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Tidak Aktif'" :count="$inactiveSeller" :icon="'account-off-outline'" :variant="'danger'" />
    <x-seller-card :datas="$sellers" :label="'Penjual Pending'" :count="$pendingSeller" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-seller-table :title="'Data Penjual'" :datas="$sellers" :fields="['No', 'Penjual', 'Gender / Alamat', 'Status / Nomor HP', 'Bank', 'Dibuat Pada', 'Aksi']" />
@endsection
