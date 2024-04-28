@php
  $users = \App\Models\User::orderBy('role_id', 'asc')->paginate(10);
  $totalUsers = \App\Models\User::count();
  $totalAdmins = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Admin')
      ->count();
  $totalSellers = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Seller')
      ->count();
  $totalCustomers = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Customer')
      ->count();

  $userPercentage = round((\App\Models\User::count() ?? 0 / \App\Models\User::count()) * 100, 2);
  $userPercentage = $userPercentage > 100 ? 100 : $userPercentage;
  $userPrePercentage = \App\Models\User::count();

  $adminPercentage = round((\App\Models\User::where('role_id', 1)->count() ?? 0 / \App\Models\User::count()) * 100, 2);
  $adminPercentage = $adminPercentage > 100 ? 100 : $adminPercentage;
  $adminPrePercentage = \App\Models\User::count();

  $sellerPercentage = round((\App\Models\User::where('role_id', 2)->count() ?? 0 / \App\Models\User::count()) * 100, 2);
  $sellerPercentage = $sellerPercentage > 100 ? 100 : $sellerPercentage;
  $sellerPrePercentage = \App\Models\User::count();

  $customerPercentage = round(
      (\App\Models\User::where('role_id', 3)->count() ?? 0 / \App\Models\User::count()) * 100,
      2,
  );
  $customerPercentage = $customerPercentage > 100 ? 100 : $customerPercentage;
  $customerPrePercentage = \App\Models\User::count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pengguna')
@section('content')
  <h4 class="mb-1">Daftar Pengguna</h4>
  <p class="mb-3">Seorang pengguna akan menjadi sebagai admin, penjual, atau pelanggan</p>
  <x-basic-button :label="'Tambah Pelanggan'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.user')" />

  <div class="row g-4 mb-4">
    <x-user-card :datas="$users" :label="'Sesi'" :icon="'account-group-outline'" :variant="'primary'" :condition="$totalUsers"
      :description="'Jumlah Pengguna'" :percentage="$userPercentage ? '+' . $userPercentage . '%' : '-' . $userPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Role Admin'" :icon="'laptop'" :variant="'danger'" :condition="$totalAdmins"
      :percentage="$adminPercentage ? '+' . $adminPercentage . '%' : '-' . $adminPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Role Seller'" :icon="'store-outline'" :variant="'info'" :condition="$totalSellers"
      :percentage="$sellerPercentage ? '+' . $sellerPercentage . '%' : '-' . $sellerPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Role Customer'" :icon="'account-outline'" :variant="'warning'" :condition="$totalCustomers"
      :percentage="$customerPercentage ? '+' . $customerPercentage . '%' : '-' . $customerPrePercentage . '%'" />
  </div>

  <x-user-table :title="'Data Pengguna'" :datas="$users" :fields="['No', 'Username / Email - Slug', 'Role', 'Dibuat Pada', 'Aksi']" />
@endsection
