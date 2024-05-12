@php
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
@section('title', 'Edit Pengguna')
@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <x-edit-form :title="'Edit spesifik pengguna'" :action="route('admin.update.user', $user->uuid)" :route="route('admin.users')" :class="'col-lg-12'">
      <div class="row">
        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Username'" :name="'name'" :type="'text'" :value="$user->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="$user->email" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Password Lama'" name="password" :type="'text'" :value="$user->password" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Password Baru'" :name="'new_password'" :type="'password'" />
          </x-form-floating>
        </div>
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Konfirmasi Password'" :name="'konfirmasi'" :type="'password'" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
    </x-edit-form>
  </div>
@endsection
