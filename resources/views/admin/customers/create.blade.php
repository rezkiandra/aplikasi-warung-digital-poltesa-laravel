@php
  $user = \App\Models\User::where('role_id', '3')
      ->join('customers', 'users.id', '=', 'customers.user_id', 'left')
      ->where('customers.user_id', null)
      ->pluck('name', 'users.id')
      ->toArray();
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
@endphp

@extends('layouts.authenticated')

@section('title', 'Tambah Customer')

@section('content')
  <x-create-form :title="'Tambah customer baru'" :action="route('admin.store.customer')" :route="route('admin.customers')">
    <div class="row">
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :placeholder="'John Doe'" :value="old('full_name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Nomor Telepon'" :name="'phone_number'" :type="'tel'" :value="old('phone_number')"
            :placeholder="'081234567890'" />
        </x-form-floating>
      </div>
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Gender'" :name="'gender'" :type="'select'" :options="$gender"
            :select="'Pilih Gender'" value="{{ old('gender') }}" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'User'" :name="'user_id'" :type="'select'" :options="$user"
            :select="'Pilih User'" :value="old('user_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Status'" :name="'status'" :type="'select'" :options="$status"
            :select="'Pilih Status'" :value="old('status')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Profil'" :name="'image'" :type="'file'" :value="old('image')" />
        </x-form-floating>
      </div>

      <div class="col-lg-12">
        <x-form-floating>
          <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :value="old('address')"
            :placeholder="'Ahmad Sood St.'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
  </x-create-form>
@endsection
