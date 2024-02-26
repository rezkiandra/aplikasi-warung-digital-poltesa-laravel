@extends('layouts.authenticated')

@section('title', 'Create Bank')

@section('content')
  <x-create-bank :label="'Bank Name'" :title="'Create new bank'" :action="route('admin.store.bank')" :route="route('admin.bank_accounts')" :name="'bank_name'"
    :type="'text'" :placeholder="'Ex: BCA, Mandiri, BRI, etc'" :value="old('bank_name')" :variant="'primary'" :icon="'check-circle-outline'" />
@endsection
