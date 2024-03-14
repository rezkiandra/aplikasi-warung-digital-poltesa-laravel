@extends('layouts.authenticated')

@section('title', 'Add Role')

@section('content')
  <x-create-form :title="'Add new role'" :action="route('admin.store.role')" :route="route('admin.roles')">
    <x-form-floating>
      <x-input-form-label :label="'Role Name'" :name="'role_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'" :value="old('role_name')" />
    </x-form-floating>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
