@php
  $gender = [
      'male' => 'male',
      'female' => 'female',
  ];
  $status = [
      'active' => 'active',
      'inactive' => 'inactive',
      'pending' => 'pending',
  ];
  $role = \App\Models\Role::pluck('role_name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Edit User')

@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <x-edit-form :title="'Edit specific user'" :action="route('admin.update.user', $user->uuid)" :route="route('admin.users')" :class="'col-lg-12'">
      <div class="row">
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Username'" :name="'name'" :type="'text'" :value="$user->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :value="$user->email" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Old Password'" name="password" :type="'text'" :value="$user->password" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <select name="role_id" id="role_id" class="form-select text-capitalize">
              <option value="{{ $user->role_id }}">{{ $user->role->role_name }}</option>
              @foreach ($role as $key => $value)
                @if ($key == $user->role_id)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'New Password'" :name="'new_password'" :type="'password'" />
          </x-form-floating>
        </div>
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Confirm Password'" :name="'konfirmasi'" :type="'password'" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-edit-form>
  </div>
@endsection
