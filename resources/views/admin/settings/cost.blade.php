@extends('layouts.authenticated')
@section('title', 'Edit Biaya')
@section('content')
  <h4 class="mb-1">Pengaturan</h4>
  <p class="mb-3">Pengaturan tarif warung digital</p>

  <form action="{{ route('admin.update.cost') }}" method="POST">
    @csrf
    @method('PUT')
    <x-form-floating>
      <x-input-form-label :label="'Tarif Admin'" :name="'admin_cost'" :type="'number'" :placeholder="'500'" :value="$data['admin_cost']"
        step="500" min="0" />
    </x-form-floating>

    <x-form-floating>
      <x-input-form-label :label="'Tarif Maxim Per Km'" :name="'maxim_cost'" :type="'number'" :placeholder="'500'" :value="$data['maxim_cost']"
        step="500" min="0" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </form>
@endsection
