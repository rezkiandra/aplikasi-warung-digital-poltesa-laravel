@extends('layouts.authenticated')
@section('title', 'Tambah Penjual')
@section('content')
  <x-create-form :title="'Tambah penjual baru'" :action="route('admin.store.seller')" :route="route('admin.sellers')">
    <div class="row">
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Nama Lengkap'" :name="'full_name'" :type="'text'" :placeholder="'John Doe'" :value="old('full_name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-2">
        <x-form-floating>
          <x-input-form-label :label="'NIK / NIM'" :name="'nik_nim'" :type="'text'" :value="old('nik_nim')"
            :placeholder="'1234567890'" />
        </x-form-floating>
      </div>

      <div class="col-lg-2">
        <x-form-floating>
          <x-input-form-label :label="'Nomor Telepon'" :name="'phone_number'" :type="'text'" :value="old('phone_number')"
            :placeholder="'081234567890'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Gender'" :name="'gender'" :type="'select'" :options="$gender"
            :select="'Pilih Gender'" value="{{ old('gender') }}" />
        </x-form-floating>
      </div>

      <div class="col-lg-2">
        <x-form-floating>
          <x-input-form-label :label="'User'" :name="'user_id'" :type="'select'" :options="$user"
            :select="'Pilih User'" :value="old('user_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-2">
        <x-form-floating>
          <select name="origin" id="origin" class="form-select text-capitalize">
            <option selected disabled>Pilih Kota</option>
            @foreach ($cities as $value)
              <option value="{{ $value['city_id'] }}">{{ $value['city_name'] }}</option>
            @endforeach
          </select>
          <label for="origin">Kota Asal</label>
          <x-validation-error :name="'origin'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Bank'" :name="'bank_account_id'" :type="'select'" :options="$bank"
            :select="'Pilih Bank'" :value="old('bank_account_id')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Status'" :name="'status'" :type="'select'" :options="$status"
            :select="'Pilih Status'" :value="old('status')" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Nomor Rekening'" :name="'account_number'" :type="'text'" :value="old('account_number')" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Profil'" :name="'image'" :type="'file'" :value="old('image')" />
        </x-form-floating>
      </div>

      <div class="col-lg-12">
        <x-form-floating>
          <x-input-form-label :label="'Alamat'" :name="'address'" :type="'textarea'" :value="old('address')"
            :placeholder="'Jalan Ahmad Sood No. 1'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary w-100'" :icon="'check-circle-outline me-2'" />
  </x-create-form>
@endsection
