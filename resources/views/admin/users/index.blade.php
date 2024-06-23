@extends('layouts.authenticated')
@section('title', 'Pengguna')
@section('content')
  <h4 class="mb-1">Daftar Pengguna</h4>
  <p class="mb-3">Seorang pengguna akan menjadi sebagai admin, penjual, atau pelanggan</p>
  <x-basic-button :label="'Tambah Pengguna'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.user')" />

  <div class="row g-4 mb-4">
    <x-user-card :datas="$users" :label="'Sesi'" :icon="'account-group-outline'" :variant="'primary'" :condition="$totalUsers"
      :description="'Jumlah Pengguna'" />
    <x-user-card :datas="$users" :label="'Role Admin'" :icon="'laptop'" :variant="'danger'" :condition="$totalAdmins" />
    <x-user-card :datas="$users" :label="'Role Seller'" :icon="'store-outline'" :variant="'info'" :condition="$totalSellers" />
    <x-user-card :datas="$users" :label="'Role Customer'" :icon="'account-outline'" :variant="'warning'" :condition="$totalCustomers" />
  </div>

  <x-user-table :title="'Data Pengguna'" :datas="$users" :fields="['No', 'Username / Email - Slug', 'Role', 'Dibuat Pada', 'Aksi']" />
@endsection
