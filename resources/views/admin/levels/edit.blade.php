@extends('layouts.authenticated')

@section('title', 'Edit Level')

@section('content')
  <x-edit-level :label="'Level Name'" :title="'Edit specific level'" :name="'level_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'"
    :value="$level->level_name" :route="route('admin.update.level', $level->slug)" />
@endsection
