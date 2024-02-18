@extends('layouts.authenticated')

@section('title', 'Edit Level')

@section('content')
  <x-edit-form :label="'Level Name'" :title="'Edit specific level'" :name="'level_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'"
    :datas="$level->level_name" />
@endsection
