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

@section('title', 'Customers')

@section('content')
  <h4 class="mb-1">Customers list</h4>
  <p class="mb-3">A customer will purchase the product</p>
  <x-basic-button :label="'Add new customer'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.customer')" />

  <div class="row g-4 mb-4">
    <x-customer-card :datas="$customers" :label="'Session'" :count="$customerCount" :description="'Total customers'" :icon="'account-outline'"
      :variant="'primary'" :percentage="$customerPercentage ? '+' . $customerPercentage . '%' : '-' . $customerPrePercentage . '%'" :condition="$customerCount" />
    <x-customer-card :datas="$customers" :label="'Active customers'" :count="$activeCustomer" :icon="'account-check-outline'" :variant="'success'"
      :percentage="$customerActivePercentage
          ? '+' . $customerActivePercentage . '%'
          : '-' . $customerActivePrePercentage . '%'" :condition="$activeCustomer" />
    <x-customer-card :datas="$customers" :label="'Unactive customers'" :count="$inactiveCustomer" :icon="'account-off-outline'" :variant="'danger'"
      :percentage="$customerInactivePercentage
          ? '+' . $customerInactivePercentage . '%'
          : '-' . $customerInactivePrePercentage . '%'" :condition="$inactiveCustomer" />
    <x-customer-card :datas="$customers" :label="'Pending customers'" :count="$pendingCustomer" :icon="'account-search-outline'" :variant="'warning'"
      :percentage="$customerPendingPercentage
          ? '+' . $customerPendingPercentage . '%'
          : '-' . $customerPendingPrePercentage . '%'" :condition="$pendingCustomer" />
  </div>

  <x-customer-table :title="'List of sellers'" :datas="$customers" :fields="['No', 'Customer', 'Gender / Address', 'Status / Phone', 'Bank', 'Created At', 'Actions']" />
@endsection
