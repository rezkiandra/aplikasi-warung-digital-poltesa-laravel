@extends('layouts.authenticated')
@section('title', 'Edit Penjual')
@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="row gap-lg-0 gap-4">
      <div class="col-lg-4 mb-lg-0">
        <div class="card">
          <div class="card-body d-flex flex-column justify-content-center">
            <div class="text-center">
              <div class="position-absolute">
                @if ($seller->status == 'active')
                  <span class="badge bg-label-success text-uppercase rounded p-2">Seller {{ $seller->status }}</span>
                @elseif ($seller->status == 'pending')
                  <span class="badge bg-label-warning text-uppercase rounded p-2">Seller {{ $seller->status }}</span>
                @else
                  <span class="badge bg-label-danger text-uppercase rounded p-2">Seller {{ $seller->status }}</span>
                @endif
              </div>
              <img src="{{ asset('storage/' . $seller->image) }}" alt="" class="img-fluid rounded-circle"
                width="200">
            </div>
            <div class="mt-3 fw-medium text-capitalize text-dark">
              <h5 class="mb-3 text-center text-uppercase">{{ $seller->full_name }}</h5>
              <p class="mb-1">
                <i class="mdi mdi-gender-male me-2"></i>
                {{ $seller->gender }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-identifier me-2"></i>
                {{ $seller->nik_nim }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-phone-outline me-2"></i>
                {{ $seller->phone_number }}
              </p>
              <p class="mb-1 text-lowercase">
                <i class="mdi mdi-email-outline me-2"></i>
                {{ $seller->user->email }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-bank-outline me-2"></i>
                {{ $seller->bank->bank_name }} - {{ $seller->account_number }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-map-marker-outline me-2"></i>
                Kota {{ $city_name }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-home-outline me-2"></i>
                {{ $seller->address }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <x-edit-form :title="'Edit biodata penjual'" :action="route('admin.update.seller', $seller->uuid)" :route="route('admin.sellers')">
          <div class="row">
            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="$seller->full_name" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <x-input-form-label :label="'NIK / NIM'" :name="'nik_nim'" :type="'text'" :value="$seller->nik_nim" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$seller->phone_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <select name="origin" id="origin" class="form-select text-capitalize">
                  <option value="{{ $seller->origin }}">{{ $city_name }}</option>
                  @foreach ($cities as $value)
                    @if ($value == $seller->origin)
                      @continue
                    @endif
                    <option value="{{ $value['city_id'] }}">{{ $value['city_name'] }}</option>
                  @endforeach
                </select>
                <label for="origin">Kota Asal</label>
                <x-validation-error :name="'origin'" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <select name="gender" id="gender" class="form-select text-capitalize">
                  <option value="{{ $seller->gender }}">{{ $seller->gender }}</option>
                  @foreach ($gender as $key => $value)
                    @if ($key == $seller->gender)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <label for="gender">Jenis Kelamin</label>
                <x-validation-error :name="'gender'" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <select name="status" id="status" class="form-select text-capitalize">
                  <option value="{{ $seller->status }}">{{ $seller->status }}</option>
                  @foreach ($status as $key => $value)
                    @if ($key == $seller->status)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <label for="status">Status</label>
                <x-validation-error :name="'status'" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <select name="bank_account_id" id="bank_account_id" class="form-select">
                  <option value="{{ $seller->bank_account_id }}">
                    {{ \App\Models\BankAccount::find($seller->bank_account_id)->bank_name }}</option>
                  @foreach ($bank as $key => $value)
                    @if ($key == $seller->bank_account_id)
                      @continue
                    @endif
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <label for="bank_account_id">Bank</label>
                <x-validation-error :name="'bank_account_id'" />
              </x-form-floating>
            </div>

            <div class="col-lg-2">
              <x-form-floating>
                <x-input-form-label :label="'Nomor Rekening'" :name="'account_number'" :type="'text'" :value="$seller->account_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-4">
              <x-form-floating>
                <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" :value="$seller->image" />
              </x-form-floating>
            </div>
          </div>

          <div class="col-lg-12">
            <x-form-floating>
              <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :height="'140px'"
                :value="$seller->address" />
            </x-form-floating>
          </div>

          <x-submit-button :label="'Update penjual'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
        </x-edit-form>
      </div>
    </div>
  </div>
@endsection
