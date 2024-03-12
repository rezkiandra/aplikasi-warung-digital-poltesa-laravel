@php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')
@section('title', 'Add Biodata')
@section('content')
  <x-create-form :title="'Add new biodata'" :route="route('seller.create.biodata')" :action="route('seller.store.biodata')">
    <div class="row">
      @if (session('error'))
        <div class="col-lg-12">
          <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
      @endif

      @foreach ($seller as $data)
        {{ $data->full_name }}
      @endforeach
    </div>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
