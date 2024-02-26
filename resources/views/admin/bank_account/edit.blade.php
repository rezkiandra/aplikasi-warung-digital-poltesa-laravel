@extends('layouts.authenticated')

@section('title', 'Edit Bank')

@section('content')
  <x-edit-bank :label="'Bank Name'" :title="'Edit specific bank'" :name="'bank_name'" :type="'text'" :placeholder="'Ex: BCA, Mandiri, BRI, etc'"
    :value="$bank->bank_name" :route="route('admin.update.bank', $bank->slug)" />
@endsection
