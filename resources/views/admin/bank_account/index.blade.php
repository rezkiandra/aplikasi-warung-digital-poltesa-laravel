@extends('layouts.authenticated')

@section('title', 'Bank Account')

@section('content')
  <x-basic-button :label="'Add new bank'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.bank')" />
  <x-bank-table :title="'List of bank'" :fields="['No', 'Bank Name', 'Total Sellers', 'Created at', 'Updated at', 'Actions']" :datas="$banks" />
@endsection
