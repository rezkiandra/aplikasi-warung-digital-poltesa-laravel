@php
  $users = \App\Models\User::paginate(10);
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

  $customerPercentage = round((\App\Models\User::where('role_id', 3)->count() ?? 0 / \App\Models\User::count()) * 100, 2);
  $customerPercentage = $customerPercentage > 100 ? 100 : $customerPercentage;
  $customerPrePercentage = \App\Models\User::count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Users')
@section('content')
  <h4 class="mb-1">User list</h4>
  <p class="mb-3">A user can be a customer or seller</p>
  <x-basic-button :label="'Add new user'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.user')" />

  <div class="row g-4 mb-4">
    <x-user-card :datas="$users" :label="'Session'" :icon="'account-outline'" :variant="'primary'" :condition="$totalUsers"
      :description="'Total users'" :percentage="$userPercentage ? '+' . $userPercentage . '%' : '-' . $userPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Admin Role'" :icon="'account-plus-outline'" :variant="'danger'" :condition="$totalAdmins"
      :percentage="$adminPercentage ? '+' . $adminPercentage . '%' : '-' . $adminPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Seller Role'" :icon="'account-check-outline'" :variant="'success'" :condition="$totalSellers" :percentage="$sellerPercentage ? '+' . $sellerPercentage . '%' : '-' . $sellerPrePercentage . '%'" />
    <x-user-card :datas="$users" :label="'Customer Role'" :icon="'account-search-outline'" :variant="'warning'" :condition="$totalCustomers" :percentage="$customerPercentage ? '+' . $customerPercentage . '%' : '-' . $customerPrePercentage . '%'" />
  </div>

  <x-user-table :title="'List of users'" :datas="$users" :fields="['No', 'Username / Email - Slug', 'Role Name', 'Created at', 'Actions']" />
@endsection
