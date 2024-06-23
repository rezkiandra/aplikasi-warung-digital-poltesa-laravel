@extends('layouts.authenticated')
@section('title', 'Tambah Kategori')
@section('content')
  <x-create-form :title="'Tambah kategori baru'" :action="route('admin.store.category')" :route="route('admin.product_category')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Kategori'" :name="'name'" :type="'text'" :placeholder="'Makanan, Pakaian, Elektronik, Aksesoris'" :value="old('name')" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
