@extends('layouts.authenticated')

@section('title', 'Edit Category')

@section('content')
  <x-edit-form :label="'Category Name'" :title="'Edit specific category'" :name="'name'" :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'"
    :value="$product_category->name" :route="route('admin.update.level', $product_category->slug)" />
@endsection
