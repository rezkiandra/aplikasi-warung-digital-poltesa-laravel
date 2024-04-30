@extends('layouts.authenticated')

@section('title', 'Tambah Bank')

@section('content')
  <x-create-form :title="'Tambah bank baru'" :action="route('admin.store.bank')" :route="route('admin.bank_accounts')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Bank'" :name="'bank_name'" :type="'text'" :placeholder="'BCA, Mandiri, BRI'" :value="old('bank_name')" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
