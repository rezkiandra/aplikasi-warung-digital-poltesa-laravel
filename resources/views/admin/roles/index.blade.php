@extends('layouts.authenticated')
@section('title', 'Roles')
@section('content')
  <h4 class="mb-1">Daftar Role</h4>
  <p class="mb-3">Sebuah role mengatur semua hak akses user</p>
  <x-roles-card :datas="$roles" />
@endsection
