@extends('layouts.authenticated')
@section('title', 'Biodata')
@section('content')
  @if (!$currentCustomer)
    <x-alert :type="'warning py-lg-3 py-md-3'" :message="'Biodata anda belum dilengkapi. Silahkan lengkapi terlebih dahulu!'" :icon="'account-search-outline'" />
    <x-create-form :title="'Lengkapi biodata'" :action="route('customer.store.biodata')" :route="route('customer.biodata')">
      <div class="row">
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="old('full_name')" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="old('phone_number')" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Jenis Kelamin'" :name="'gender'" :type="'select'" :value="old('gender')"
              :options="$gender" :select="'- Pilih jenis kelamin'" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <select name="origin" id="origin" class="form-select text-capitalize">
              <option selected disabled>- Pilih Kota Asal</option>
              @foreach ($cities as $value)
                <option value="{{ $value['city_id'] }}">{{ $value['city_name'] }}</option>
              @endforeach
            </select>
            <label for="origin">Kota Asal</label>
          </x-form-floating>
        </div>

        <div class="col-lg-6">
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

      <x-submit-button :label="'Simpan Biodata'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
    </x-create-form>
  @else
    @foreach ($customer as $data)
      @if ($data->status == 'active')
        <x-alert :type="'primary py-lg-3 py-md-3'" :message="'Biodata anda sudah lengkap dan status akun aktif. Anda sekarang dapat menggunakan layanan!'" :icon="'account-check-outline'" />
      @elseif ($data->status == 'pending')
        <x-alert :type="'warning py-lg-3 py-md-3'" :message="'Biodata anda sudah lengkap namun status akun pending. Silahkan hubungi admin untuk menyetujui!'" :icon="'account-search-outline'" />
      @else
        <x-alert :type="'danger py-lg-3 py-md-3'" :message="'Biodata anda sudah lengkap namun status akun tidak aktif. Silahkan hubungi admin untuk mengaktifkan kembali!'" :icon="'account-off-outline'" />
      @endif
      <div class="row gap-lg-0 gap-4">
        <div class="col-lg-4 mb-lg-0">
          <div class="card">
            <div class="card-body d-flex flex-column justify-content-center">
              <div class="text-center mt-3">
                <div class="position-absolute">
                  @if ($data->status == 'active')
                    <span class="badge bg-label-success text-uppercase rounded p-2">Status {{ $data->status }}</span>
                  @elseif ($data->status == 'pending')
                    <span class="badge bg-label-warning text-uppercase rounded p-2">Status {{ $data->status }}</span>
                  @else
                    <span class="badge bg-label-danger text-uppercase rounded p-2">Status {{ $data->status }}</span>
                  @endif
                </div>
                <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid rounded-circle"
                  width="200">
              </div>
              <div class="mt-4 text-center fw-medium text-capitalize">
                <h5 class="mb-3">{{ $data->full_name }}</h5>
                <p class="mb-1">{{ $data->gender }}</p>
                <p class="mb-1">{{ $data->phone_number }}</p>
                <p class="mb-1 text-lowercase">{{ $data->user->email }}</p>
                <p class="mb-1">{{ $data->address }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <x-edit-form :title="'Edit biodata'" :action="route('customer.update.biodata', $data->uuid)">
            <div class="row">
              <div class="col-lg-6">
                <x-form-floating>
                  <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :value="$data->full_name" />
                </x-form-floating>
              </div>

              <div class="col-lg-6">
                <x-form-floating>
                  <x-input-form-label :label="'Nomor HP'" :name="'phone_number'" :type="'text'" :value="$data->phone_number" />
                </x-form-floating>
              </div>

              <div class="col-lg-3">
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
                  <label for="gender">Jenis Kelamin</label>
                </x-form-floating>
              </div>

              <div class="col-lg-3">
                <x-form-floating>
                  <select name="origin" id="origin" class="form-select text-capitalize">
                    <option value="{{ $data->origin }}">{{ $city_name }}</option>
                    @foreach ($cities as $value)
                      @if ($value == $data->origin)
                        @continue
                      @endif
                      <option value="{{ $value['city_id'] }}">{{ $value['city_name'] }}</option>
                    @endforeach
                  </select>
                  <label for="origin">Kota Asal</label>
                </x-form-floating>
              </div>

              <div class="col-lg-6">
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

            <x-submit-button :label="'Update Biodata'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
          </x-edit-form>
        </div>
      </div>
    @endforeach
  @endif
@endsection
