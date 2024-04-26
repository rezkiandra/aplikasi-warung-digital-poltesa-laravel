@php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
  $currentCustomer = \App\Models\Customer::where('user_id', Auth::user()->id)->first();
@endphp

@extends('layouts.authenticated')
@section('title', 'Biodata')
@section('content')
  @if (!$currentCustomer)
    <x-alert :type="'primary'" :message="'Biodata anda belum lengkap. Silahkan lengkapi biodata anda terlebih dahulu!'" :icon="'account-off-outline'" />
    <x-create-form :title="'Tambah Biodata'" :action="route('customer.store.biodata')" :route="route('customer.biodata')">
      <div class="row">
        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="old('full_name')" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="old('phone_number')" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Jenis Kelamin'" :name="'gender'" :type="'select'" :value="old('gender')"
              :options="$gender" :select="'- Pilih jenis kelamin'" />
          </x-form-floating>
        </div>


        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Bank'" :name="'bank_account_id'" :type="'select'" :value="old('bank_account_id')"
              :options="$bank" :select="'- Pilih bank'" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nomor Rekening'" :name="'account_number'" :type="'text'" :value="old('account_number')" />
          </x-form-floating>
        </div>

        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" :value="old('image')" />
          </x-form-floating>
        </div>
      </div>

      <div class="col-lg-12">
        <x-form-floating>
          <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :height="'130px'"
            :value="old('address')" />
        </x-form-floating>
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-create-form>
  @else
    @foreach ($customer as $data)
      <x-alert :type="'primary'" :message="'Biodata anda sudah lengkap. Anda juga bisa mengedit biodata!'" :icon="'account-off-outline'" />
      <div class="row">
        <div class="col-lg-4 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body d-flex flex-column justify-content-center">
              <div class="text-center">
                <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid rounded-circle w-50"
                  width="200">
              </div>
              <div class="mt-3 text-center fw-medium text-capitalize">
                <h5 class="mb-3">{{ $data->full_name }}</h5>
                <p class="mb-1">{{ $data->gender }}</p>
                <p class="mb-1">{{ $data->phone_number }}</p>
                <p class="mb-1">{{ $data->address }}</p>
                <p class="mb-1 text-lowercase">{{ $data->user->email }}</p>
                <p class="mb-3">{{ $data->account_number }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <x-edit-form :title="'Edit biodata'" :action="route('seller.update.biodata', $data->uuid)">
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
                  <select name="gender" id="gender" class="form-select text-capitalize">
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
                <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :height="'140px'"
                  :value="$data->address" />
              </x-form-floating>
            </div>

            <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
          </x-edit-form>
        </div>
      </div>
    @endforeach
  @endif
@endsection
