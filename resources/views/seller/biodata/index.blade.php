@php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')
@section('title', 'Add Biodata')
@section('content')
  @foreach ($seller as $data)
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid rounded-circle w-50">
            </div>
            <div class="mt-4 text-center fw-medium text-capitalize">
              <h5 class="mb-3">{{ $data->full_name }}</h5>
              <p class="mb-1">{{ $data->gender }}</p>
              <p class="mb-1">{{ $data->phone_number }}</p>
              <p class="mb-1">{{ $data->address }}</p>
              <p class="mb-1 text-lowercase">{{ $data->user->email }}</p>
              <p class="mb-1">{{ $data->account_number }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <x-edit-form :title="'Edit biodata'" :action="route('seller.update.biodata', $data->id)">
          <div class="row">
            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="$data->full_name" />
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$data->phone_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <select name="gender" id="gender" class="form-select">
                  <option value="{{ $data->gender }}">{{ $data->gender }}</option>
                  @foreach ($gender as $key => $value)
                    @if ($key == $data->gender)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </x-form-floating>
            </div>


            <div class="col-lg-4">
              <x-form-floating>
                <select name="bank_account_id" id="bank_account_id" class="form-select">
                  <option value="{{ $data->bank_account_id }}">
                    {{ \App\Models\BankAccount::find($data->bank_account_id)->bank_name }}</option>
                  @foreach ($bank as $key => $value)
                    @if ($key == $data->bank_account_id)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Nomor Rekening'" :name="'account_number'" :type="'text'" :value="$data->account_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" :value="$data->image" />
              </x-form-floating>
            </div>
          </div>

          <div class="col-lg-12">
            <x-form-floating>
              <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :value="$data->address" />
            </x-form-floating>
          </div>

          <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
        </x-edit-form>
      </div>
    </div>
  @endforeach
@endsection
