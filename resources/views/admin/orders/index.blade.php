@extends('layouts.authenticated')

@section('title', 'Orders')

@section('content')
  <h4 class="mb-1">Order list</h4>
  <p class="mb-3">A order will show when customers have purchase the product</p>

  {{-- <div class="row g-4 mb-4">
    <x-user-card :datas="$users" :label="'Session'" :icon="'account-outline'" :variant="'primary'" />
    <x-user-card :datas="$users" :label="'Paid users'" :icon="'account-plus-outline'" :variant="'danger'" />
    <x-user-card :datas="$users" :label="'Active users'" :icon="'account-check-outline'" :variant="'success'" />
    <x-user-card :datas="$users" :label="'Pending users'" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-user-table :title="'List of users'" :datas="$users" :fields="['No', 'Username', 'Email', 'Role', 'Created at', 'Updated at', '#']" /> --}}
@endsection
