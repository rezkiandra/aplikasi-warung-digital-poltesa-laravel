@extends('layouts.authenticated')

@section('title', 'Product Category')

@section('content')
  <x-basic-button :label="'Add new category'" :icon="'plus'" :class="'w-0 text-capitalize mb-4'" :href="route('admin.create.level')" />
  <x-basic-table :fields="['No', 'Level Name', 'Created at', 'Updated at', 'Actions']" :datas="$levels" />
@endsection
