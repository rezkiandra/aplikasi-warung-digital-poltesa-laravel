@extends('layouts.authenticated')

@section('title', 'Detail Level')

@section('content')
  <x-edit-form :label="'Level Name'" :title="'Edit specific level'" :name="'level_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'"
    :value="$level->level_name" :route="route('admin.update.level', $level->slug)" />
@endsection
