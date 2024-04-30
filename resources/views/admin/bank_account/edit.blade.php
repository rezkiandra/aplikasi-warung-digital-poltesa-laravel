@extends('layouts.authenticated')
@section('title', 'Edit Bank')
@section('content')
  <x-edit-form :title="'Edit spesifik bank'" :action="route('admin.update.bank', $bank->slug)" :route="route('admin.bank_accounts')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Bank'" :name="'bank_name'" :type="'text'" :placeholder="'BCA, Mandiri, BRI'" :value="$bank->bank_name" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-edit-form>
@endsection
