@php
  $user = \App\Models\User::pluck('name', 'id')->toArray();
  $gender = [
      'male' => 'male',
      'female' => 'female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $role = \App\Models\Role::where('role_name', '!=', 'Admin')->pluck('role_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Add User')

@section('content')
  <x-create-form :title="'Add new user'" :action="route('admin.store.user')" :route="route('admin.users')">
    <div class="row">
      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Name'" :name="'name'" :type="'text'" :placeholder="'John Doe'" :value="old('name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="old('email')"
            :placeholder="'johndoe@email.com'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Password'" :name="'password'" :type="'password'" :value="old('password')"
            :placeholder="'*******'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Konfirmasi Password'" :name="'konfirmasi'" :type="'password'" :value="old('password')"
            :placeholder="'*******'" />
        </x-form-floating>
      </div>

      <div class="col-lg-4">
        <x-form-floating>
          <x-input-form-label :label="'Role'" :name="'role_id'" :type="'select'" :options="$role"
            :select="'Choose role'" :value="old('role_id')" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
