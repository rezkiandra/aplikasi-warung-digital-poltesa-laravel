@php
  $user = \App\Models\User::where('role_id', '3')->pluck('name', 'id')->toArray();
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Create Customer')

@section('content')
  <x-create-form :title="'Create new customer'" :action="route('admin.store.customer')" :route="route('admin.customers')">
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

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Gender'" :name="'gender'" :type="'select'" :options="$gender"
            :select="'Choose gender'" value="{{ old('gender') }}" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'User'" :name="'user_id'" :type="'select'" :options="$user"
            :select="'Choose user'" :value="old('user_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Bank'" :name="'bank_account_id'" :type="'select'" :options="$bank"
            :select="'Choose bank'" :value="old('bank_account_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Image'" :name="'image'" :type="'file'" :value="old('image')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Status'" :name="'status'" :type="'select'" :options="$status"
            :select="'Choose status'" :value="old('status')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Account Number'" :name="'account_number'" :type="'text'" :value="old('account_number')" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
