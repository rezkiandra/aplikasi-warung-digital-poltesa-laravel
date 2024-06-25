@extends('layouts.authenticated')
@section('title', 'Edit Pelanggan')
@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="row gap-lg-0 gap-4">
      <div class="col-lg-4 mb-lg-0">
        <div class="card">
          <div class="card-body d-flex flex-column justify-content-center">
            <div class="text-center">
              <div class="position-absolute">
                @if ($customer->status == 'active')
                  <span class="badge bg-label-success text-uppercase rounded p-2">Customer {{ $customer->status }}</span>
                @elseif ($customer->status == 'pending')
                  <span class="badge bg-label-warning text-uppercase rounded p-2">Customer {{ $customer->status }}</span>
                @else
                  <span class="badge bg-label-danger text-uppercase rounded p-2">Customer {{ $customer->status }}</span>
                @endif
              </div>
              <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-fluid rounded-circle"
                width="200">
            </div>
            <div class="mt-3 fw-medium text-capitalize text-dark">
              <h5 class="mb-3 text-center text-uppercase">{{ $customer->full_name }}</h5>
              <p class="mb-1">
                <i class="mdi mdi-gender-male me-2"></i>
                {{ $customer->gender }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-identifier me-2"></i>
                {{ $customer->nik_nim }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-phone-outline me-2"></i>
                {{ $customer->phone_number }}
              </p>
              <p class="mb-1 text-lowercase">
                <i class="mdi mdi-email-outline me-2"></i>
                {{ $customer->user->email }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-map-marker-outline me-2"></i>
                Kota {{ $city_name }}
              </p>
              <p class="mb-1">
                <i class="mdi mdi-home-outline me-2"></i>
                {{ $customer->address }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <x-edit-form :title="'Edit biodata pelanggan'" :action="route('admin.update.customer', $customer->uuid)">
          <div class="row">
            <div class="col-lg-3">
              <x-form-floating>
                <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="$customer->full_name" />
              </x-form-floating>
            </div>

            <div class="col-lg-3">
              <x-form-floating>
                <x-input-form-label :label="'NIK / NIM'" :name="'nik_nim'" :type="'text'" :value="$customer->nik_nim" />
              </x-form-floating>
            </div>

            <div class="col-lg-3">
              <x-form-floating>
                <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$customer->phone_number" />
              </x-form-floating>
            </div>

            <div class="col-lg-3">
              <x-form-floating>
                <select name="origin" id="origin" class="form-select text-capitalize">
                  <option value="{{ $customer->origin }}">{{ $city_name }}</option>
                  @foreach ($cities as $value)
                    @if ($value == $customer->origin)
                      @continue
                    @endif
                    <option value="{{ $value['city_id'] }}">{{ $value['city_name'] }}</option>
                  @endforeach
                </select>
                <label for="origin">Kota Asal</label>
                <x-validation-error :name="'origin'" />
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
                <label for="gender">Jenis Kelamin</label>
                <x-validation-error :name="'gender'" />
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
                <label for="status">Status</label>
                <x-validation-error :name="'status'" />
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
