@extends('layouts.authenticated')

@section('title', 'Product Categories')

@section('content')
  <h4 class="mb-1">Product Categories</h4>
  <p class="mb-3">A category will be used to organize products</p>

  <x-basic-button :label="'Add new category'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.category')" />
  <x-category-table :title="'List of categories'" :fields="['No', 'Category Name', 'Total Products', 'Total Earnings', 'Created at', 'Updated at', 'Actions']" :datas="$category" />
@endsection
