@extends('layouts.authenticated')

@section('title', 'Levels')

@section('content')
  <x-basic-button :label="'Add new level'" :icon="'plus'" :class="'w-0 text-capitalize mb-4'" :href="route('admin.create.level')" />
  <x-basic-table :fields="['No', 'Level Name', 'Created at', 'Updated at', 'Actions']" :datas="$levels" />
@endsection
