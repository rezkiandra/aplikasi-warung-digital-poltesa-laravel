@extends('layouts.authenticated')

@section('title', 'Customers')

@section('content')
  {{-- <x-basic-button :label="'Add new role'" :icon="'plus'" :class="'w-0 text-uppercase'" :variant="'primary'" :href="route('admin.create.role')" /> --}}
  {{-- <x-role-table :title="'List of roles'" :fields="['No', 'Role Name', 'Created at', 'Updated at', 'Actions']" :datas="$roles" /> --}}

  <h4 class="mb-1">Customer list</h4>
  <p class="mb-3">A customer will purchase the products</p>

  <div class="row g-4 mb-4">
    <x-customer-card :datas="$customers" :label="'Session'" :icon="'account-outline'" :variant="'primary'" />
    <x-customer-card :datas="$customers" :label="'Paid customers'" :icon="'account-plus-outline'" :variant="'danger'" />
    <x-customer-card :datas="$customers" :label="'Active customers'" :icon="'account-check-outline'" :variant="'success'" />
    <x-customer-card :datas="$customers" :label="'Pending customers'" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-customer-table :title="'List of customers'" :datas="$customers" :fields="['No', 'Username', 'Created at', 'Updated at']" />
@endsection
