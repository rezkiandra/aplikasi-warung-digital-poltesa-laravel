@extends('layouts.authenticated')
@section('title', 'Edit Biaya Admin')
@section('content')
  <h4 class="mb-1">Pengaturan</h4>
  <p class="mb-3">Pengaturan biaya admin warung digital</p>

  <form action="{{ route('admin.update.cost') }}" method="POST">
    @csrf
    @method('PUT')
    <x-form-floating>
      <x-input-form-label :label="'Biaya Admin'" :name="'admin_cost'" :type="'number'" :placeholder="'500'" :value="$adminCost"
        step="500" min="0" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </form>
@endsection
