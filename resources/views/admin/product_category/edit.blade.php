@extends('layouts.authenticated')

@section('title', 'Edit Category')

@section('content')
  <x-edit-category :label="'Category Name'" :title="'Edit specific category'" :name="'name'" :type="'text'" :placeholder="'Ex: Food, Fashion, Electronic, etc'"
    :value="$category->name" :route="route('admin.update.category', $category->slug)" />
@endsection
