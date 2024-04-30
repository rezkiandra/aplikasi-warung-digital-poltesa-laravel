@extends('layouts.authenticated')

@section('title', 'Tambah Role')

@section('content')
  <x-create-form :title="'Tambah role baru'" :action="route('admin.store.role')" :route="route('admin.roles')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Role'" :name="'role_name'" :type="'text'" :placeholder="'Superadmin, Editor, Maintainer'" :value="old('role_name')" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
