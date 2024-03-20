@extends('layouts.authenticated')

@section('title', 'Roles')

@section('content')
	<h4 class="mb-1">Roles list</h4>
  <p class="mb-3">A role provides a set of permissions to be assigned</p>
  <x-roles-card :datas="$roles" />
@endsection
