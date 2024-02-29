@extends('layouts.authenticated')

@section('title', 'Edit Category')

@section('content')
  <x-edit-form :title="'Edit specific category'" :action="route('admin.update.category', $category->slug)" :route="route('admin.product_category')">
    <x-form-floating>
      <x-input-form-label :label="'Category Name'" :name="'name'" :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'" :value="$category->name" />
    </x-form-floating>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-edit-form>
@endsection
