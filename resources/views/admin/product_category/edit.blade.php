@extends('layouts.authenticated')
@section('title', 'Edit Kategori')
@section('content')
  <x-edit-form :title="'Edit spesifik kategori'" :action="route('admin.update.category', $category->slug)" :route="route('admin.product_category')">
    <x-form-floating>
      <x-input-form-label :label="'Nama Kategori'" :name="'name'" :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'" :value="$category->name" />
    </x-form-floating>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-edit-form>
@endsection
