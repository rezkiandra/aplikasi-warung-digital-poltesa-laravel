@php
  $user = \App\Models\User::pluck('name', 'id')->toArray();
  $gender = [
      'Male' => 'Male',
      'Female' => 'Female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Create Seller')

@section('content')
  <x-create-form :title="'Create new seller'" :action="route('admin.store.seller')" :route="route('admin.sellers')">
    <div class="row">
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Full name'" :name="'full_name'" :type="'text'" :placeholder="'John Doe'" :value="old('full_name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Address'" :name="'address'" :type="'text'" :value="old('address')"
            :placeholder="'Ahmad Sood St.'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Phone Number'" :name="'phone_number'" :type="'tel'" :value="old('phone_number')"
            :placeholder="'081234567890'" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Gender'" :name="'gender'" :type="'select'" :options="$gender"
            :select="'Choose gender'" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'User'" :name="'user_id'" :type="'select'" :options="$user"
            :select="'Choose user'" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Bank'" :name="'bank_account_id'" :type="'select'" :options="$bank"
            :select="'Choose bank'" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Image'" :name="'image'" :type="'file'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
