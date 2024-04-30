@php
  $userSeller = \App\Models\User::where('uuid', Auth::user()->uuid)->first();
@endphp

@extends('layouts.authenticated')
@section('title', 'Pengaturan')
@section('content')
  <h4 class="mb-1">Pengaturan</h4>
  <p class="mb-3">Pengaturan username, password dan email penjual</p>

  <div class="d-lg-flex justify-content-between gap-4">
    <x-edit-form :title="'Edit data profile'" :action="route('seller.update.profile', $userSeller->uuid)" :route="route('seller.settings')" :class="'col-lg-12'">
      <div class="row">
        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Username'" :name="'name'" :type="'text'" :value="$userSeller->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="$userSeller->email" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Password Lama'" name="password" :type="'text'" :value="$userSeller->password" />
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

      <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-edit-form>
  </div>
@endsection
