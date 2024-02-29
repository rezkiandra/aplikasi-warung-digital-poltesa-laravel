@extends('layouts.authenticated')

@section('title', 'Create Category')

@section('content')
  <x-create-form :title="'Create new category'" :action="route('admin.store.category')" :route="route('admin.product_category')">
    <x-form-floating>
      <x-input-form-label :label="'Category Name'" :name="'name'" :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'" :value="old('name')" />
    </x-form-floating>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
