@extends('layouts.authenticated')

@section('title', 'Create Role')

@section('content')
  <x-create-role :label="'Role Name'" :title="'Create new role'" :action="route('admin.store.role')" :route="route('admin.roles')" :name="'role_name'"
    :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'" :value="old('role_name')" :variant="'primary'" :icon="'check-circle-outline'" />
@endsection
