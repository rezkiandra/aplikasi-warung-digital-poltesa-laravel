@php
  $user = \App\Models\User::where('role_id', '3')->pluck('name', 'id')->toArray();
  $gender = [
      'male' => 'male',
      'female' => 'female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
@endphp
@extends('layouts.authenticated')
@section('title', 'Edit Pelanggan')
@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="col-lg-2 card-body">
      <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-fluid rounded-circle" width="100%">
    </div>

    <x-edit-form :title="'Edit spesifik pelanggan'" :action="route('admin.update.customer', $customer->uuid)" :route="route('admin.customers')" :class="'col-lg-10'">
      <div class="row">
        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nama Pelanggan'" :name="'full_name'" :type="'text'" :value="$customer->full_name" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$customer->phone_number" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
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

        <div class="col-lg-4">
          <x-form-floating>
            <select name="user_id" id="user_id" class="form-select" readonly disabled>
              <option value="{{ $customer->user_id }}" selected>{{ $customer->user->name }}</option>
              @foreach ($user as $key => $value)
                @if ($key == $customer->user_id)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <select name="status" id="status" class="form-select text-capitalize">
              <option value="{{ $customer->status }}" selected>{{ $customer->status }}</option>
              @foreach ($status as $key => $value)
                @if ($key == $customer->status)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Profil'" :name="'image'" :type="'file'" :value="$customer->image" />
          </x-form-floating>
        </div>

        <div class="col-lg-12">
          <x-form-floating>
            <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :value="$customer->address" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
    </x-edit-form>
  </div>
@endsection
