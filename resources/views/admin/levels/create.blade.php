@extends('layouts.authenticated')

@section('title', 'Create Level')

@section('content')
  <x-create-form :label="'Level Name'" :title="'Create new level'" :action="route('admin.store.level')" :route="route('admin.levels')" :name="'level_name'"
    :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'" :value="old('level_name')" :variant="'primary'" :icon="'check-circle-outline'" />
@endsection
