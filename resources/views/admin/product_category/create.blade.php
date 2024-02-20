@extends('layouts.authenticated')

@section('title', 'Create Category')

@section('content')
  <x-create-form :label="'Category Name'" :title="'Create new category'" :action="route('admin.store.category')" :route="route('admin.product_category')" :name="'name'"
    :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'" :value="old('level_name')" :variant="'primary'" :icon="'check-circle-outline'" />
@endsection
