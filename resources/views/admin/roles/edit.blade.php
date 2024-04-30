@extends('layouts.authenticated')
@section('title', 'Edit Role')
@section('content')
  <x-edit-form :title="'Edit spesifik role'" :action="route('admin.update.role', $role->slug)" :route="route('admin.roles')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Role'" :name="'role_name'" :type="'text'" :placeholder="'Superadmin, Editor, Maintainer'" :value="$role->role_name" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-edit-form>
@endsection
