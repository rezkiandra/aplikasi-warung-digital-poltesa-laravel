@php
  $user = \App\Models\User::where('role_id', '2')->pluck('name', 'id')->toArray();
  $gender = [
      'male' => 'male',
      'female' => 'female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')
@section('title', 'Edit Pelanggan')
@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="row gap-lg-0 gap-4">
      <div class="col-lg-4 mb-lg-0">
        <div class="card">
          <div class="card-body d-flex flex-column justify-content-center">
            <div class="text-center">
              <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-fluid rounded-circle"
                width="200">
            </div>
            <div class="mt-3 text-center fw-medium text-capitalize text-dark">
              <h5 class="mb-3">{{ $customer->full_name }}</h5>
              <p class="mb-1">{{ $customer->gender }}</p>
              <p class="mb-1">{{ $customer->phone_number }}</p>
              <p class="mb-1 text-lowercase">{{ $customer->user->email }}</p>
              <p class="mb-1">{{ $customer->account_number }}</p>
              <p class="mb-3">{{ $customer->address }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <x-edit-form :title="'Edit biodata pelanggan'" :action="route('admin.update.customer', $customer->uuid)">
          <div class="row">
            <div class="col-lg-6">
              <x-form-floating>
                <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="$customer->full_name" />
              </x-form-floating>
            </div>

            <div class="col-lg-6">
              <x-form-floating>
                <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$customer->phone_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-3">
              <x-form-floating>
                <select name="gender" id="gender" class="form-select text-capitalize">
                  <option value="{{ $customer->gender }}">{{ $customer->gender }}</option>
                  @foreach ($gender as $key => $value)
                    @if ($key == $customer->gender)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </x-form-floating>
            </div>

            <div class="col-lg-3">
              <x-form-floating>
                <select name="status" id="status" class="form-select text-capitalize">
                  <option value="{{ $customer->status }}">{{ $customer->status }}</option>
                  @foreach ($status as $key => $value)
                    @if ($key == $customer->status)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </x-form-floating>
            </div>

            <div class="col-lg-6">
              <x-form-floating>
                <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" :value="$customer->image" />
              </x-form-floating>
            </div>
          </div>

          <div class="col-lg-12">
            <x-form-floating>
              <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :height="'140px'"
                :value="$customer->address" />
            </x-form-floating>
          </div>

          <x-submit-button :label="'Update pelanggan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
        </x-edit-form>
      </div>
    </div>
  </div>
@endsection
