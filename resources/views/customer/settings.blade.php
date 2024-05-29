@php
  $userCustomer = \App\Models\User::where('uuid', Auth::user()->uuid)->first();
@endphp

@extends('layouts.authenticated')
@section('title', 'Profile')
@section('content')
  <h4 class="mb-1">Profile User</h4>
  <p class="mb-3">Pengaturan user role customer</p>

  <div class="d-lg-flex justify-content-between gap-4">
    <x-edit-form :title="'Edit data profile'" :action="route('customer.update.profile', $userCustomer->uuid)" :route="route('customer.settings')" :class="'col-lg-12'">
      <div class="row">
        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Username'" :name="'name'" :type="'text'" :value="$userCustomer->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="$userCustomer->email" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Password Lama'" name="password" :type="'text'" :value="$userCustomer->password" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Password Baru'" :name="'new_password'" :type="'password'" :value="old('new_password')" />
          </x-form-floating>
        </div>
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Konfirmasi Password'" :name="'konfirmasi'" :type="'password'" :value="old('konfirmasi')" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Update Profile'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
    </x-edit-form>
  </div>
@endsection
