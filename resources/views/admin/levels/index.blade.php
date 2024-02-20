@extends('layouts.authenticated')

@section('title', 'Levels')

@section('content')
  <x-basic-button :label="'Add new level'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.level')" />
  <x-level-table :title="'List of levels'" :fields="['No', 'Level Name', 'Created at', 'Updated at', 'Actions']" :datas="$levels" />
@endsection
