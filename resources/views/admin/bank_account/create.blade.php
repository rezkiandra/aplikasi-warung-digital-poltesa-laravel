@extends('layouts.authenticated')

@section('title', 'Create Bank')

@section('content')
  <x-create-form :title="'Create new bank'" :action="route('admin.store.bank')" :route="route('admin.bank_accounts')">
    <x-form-floating>
      <x-input-form-label :label="'Bank Name'" :name="'bank_name'" :type="'text'" :placeholder="'Ex: BCA, Mandiri, BRI, etc'" :value="old('bank_name')" />
    </x-form-floating>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
