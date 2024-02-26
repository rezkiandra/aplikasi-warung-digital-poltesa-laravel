@extends('layouts.authenticated')

@section('title', 'Sellers')

@section('content')
  {{-- <x-basic-button :label="'Add new role'" :icon="'plus'" :class="'w-0 text-uppercase'" :variant="'primary'" :href="route('admin.create.role')" /> --}}
  {{-- <x-role-table :title="'List of roles'" :fields="['No', 'Role Name', 'Created at', 'Updated at', 'Actions']" :datas="$roles" /> --}}

  <h4 class="mb-1">Seller list</h4>
  <p class="mb-3">A seller selling the products</p>

  <div class="row g-4 mb-4">
    <x-seller-card :datas="$sellers" :label="'Session'" :icon="'account-outline'" :variant="'primary'" />
    <x-seller-card :datas="$sellers" :label="'Paid sellers'" :icon="'account-plus-outline'" :variant="'danger'" />
    <x-seller-card :datas="$sellers" :label="'Active sellers'" :icon="'account-check-outline'" :variant="'success'" />
    <x-seller-card :datas="$sellers" :label="'Pending sellers'" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-seller-table :title="'List of sellers'" :datas="$sellers" :fields="['No', 'Username', 'Created at', 'Updated at']" />
@endsection
