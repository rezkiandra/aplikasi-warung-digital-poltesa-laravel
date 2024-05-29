@php
  $user = \App\Models\User::pluck('name', 'id')->toArray();
  $gender = [
      'male' => 'male',
      'female' => 'female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $role = \App\Models\Role::where('role_name', '!=', 'Admin')->pluck('role_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Tambah Pengguna')

@section('content')
  <x-create-form :title="'Tambah pengguna baru'" :action="route('admin.store.user')" :route="route('admin.users')">
    <div class="row">
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Username'" :name="'name'" :type="'text'" :placeholder="'John Doe'" :value="old('name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="old('email')"
            :placeholder="'johndoe@email.com'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Role'" :name="'role_id'" :type="'select'" :options="$role"
            :select="'Pilih Role'" :value="old('role_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Password'" :name="'password'" :type="'password'" :value="old('password')"
            :placeholder="'*******'" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Konfirmasi Password'" :name="'konfirmasi'" :type="'password'" :value="old('konfirmasi')"
            :placeholder="'*******'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
  </x-create-form>
@endsection
