@extends('layouts.authenticated')

@section('title', 'Users')

@section('content')
  {{-- <x-basic-button :label="'Add new role'" :icon="'plus'" :class="'w-0 text-uppercase'" :variant="'primary'" :href="route('admin.create.role')" /> --}}
  {{-- <x-role-table :title="'List of roles'" :fields="['No', 'Role Name', 'Created at', 'Updated at', 'Actions']" :datas="$roles" /> --}}

  <h4 class="mb-1">User list</h4>
  <p class="mb-3">A user can be a customer or seller</p>

  <div class="row g-4 mb-4">
    <x-user-card :datas="$users" :label="'Session'" :icon="'account-outline'" :variant="'primary'" />
    <x-user-card :datas="$users" :label="'Paid users'" :icon="'account-plus-outline'" :variant="'danger'" />
    <x-user-card :datas="$users" :label="'Active users'" :icon="'account-check-outline'" :variant="'success'" />
    <x-user-card :datas="$users" :label="'Pending users'" :icon="'account-search-outline'" :variant="'warning'" />
  </div>

  <x-user-table :title="'List of users'" :datas="$users" :fields="['No', 'Username', 'Email', 'Role', 'Created at', 'Updated at', '#']" />
@endsection
