@extends('layouts.authenticated')

@section('title', 'Create Level')

@section('content')
  <x-create-form :label="'Level Name'" :title="'Create new level'" :name="'level_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'" />
@endsection
