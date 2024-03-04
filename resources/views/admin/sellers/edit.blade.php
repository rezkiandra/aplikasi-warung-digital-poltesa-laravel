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

@section('title', 'Edit Seller')

@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="col-lg-2 card-body">
      <img src="{{ asset('storage/' . $seller->image) }}" alt="" class="img-fluid rounded" width="100%">
    </div>

    <x-edit-form :title="'Edit specific seller'" :action="route('admin.update.seller', $seller->slug)" :route="route('admin.products')" :class="'col-lg-10'">
      <div class="row">
        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Seller Name'" :name="'full_name'" :type="'text'" :value="$seller->full_name" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Address'" :name="'address'" :type="'text'" :value="$seller->address" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Phone'" :name="'phone_number'" :type="'text'" :value="$seller->phone_number" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <select name="gender" id="gender" class="form-select">
              @foreach ($gender as $key => $value)
                @if ($key == $seller->gender && $seller->gender != null)
                  <option value="{{ $key }}" selected>{{ $value }}</option>
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <select name="user_id" id="user_id" class="form-select">
              <option value="{{ $seller->user_id }}" selected>{{ $seller->user->name }}</option>
              @foreach ($user as $key => $value)
                @if ($key == $seller->user_id)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <select name="bank_account_id" id="bank_account_id" class="form-select">
              <option value="{{ $seller->bank_account_id }}" selected>{{ $seller->bank_account_id }}</option>
              @foreach ($bank as $key => $value)
                @if ($key == $seller->bank_account_id)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Image'" :name="'image'" :type="'file'" :value="$seller->image" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-edit-form>
  </div>
@endsection
