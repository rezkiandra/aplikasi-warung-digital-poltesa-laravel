@extends('layouts.authenticated')

@section('title', 'Levels')

@section('content')
  <h4>Levels</h4>
  <x-basic-table :fields="['No', 'Level Name', 'Created at', 'Updated at', 'Actions']" :datas="$levels" />
@endsection
