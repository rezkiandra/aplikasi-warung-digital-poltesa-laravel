@extends('layouts.authenticated')

@section('title', 'Roles')

@section('content')
  {{-- <x-basic-button :label="'Add new role'" :icon="'plus'" :class="'w-0 text-uppercase'" :variant="'primary'" :href="route('admin.create.role')" /> --}}
  {{-- <x-role-table :title="'List of roles'" :fields="['No', 'Role Name', 'Created at', 'Updated at', 'Actions']" :datas="$roles" /> --}}

  <h4 class="mb-1">Roles list</h4>
  <p class="mb-3">A role provides a set of permissions to be assigned</p>
  <x-roles-card :datas="$roles" />
@endsection
