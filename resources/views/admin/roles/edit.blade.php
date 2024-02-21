@extends('layouts.authenticated')

@section('title', 'Edit Role')

@section('content')
  <x-edit-role :label="'role Name'" :title="'Edit specific role'" :name="'role_name'" :type="'text'" :placeholder="'Ex: Admin, Superadmin, Editor, etc'"
    :value="$role->role_name" :route="route('admin.update.role', $role->slug)" />
@endsection
