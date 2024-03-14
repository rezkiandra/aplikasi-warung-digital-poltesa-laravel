@php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Add Product')

@section('content')
  <x-create-form :title="'Add new product'" :action="route('seller.store.product')" :route="route('seller.products')">
    <div class="row">
      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Product Name'" :name="'name'" :type="'text'" :placeholder="'Baju kemeja, Kue ulang tahun, dsb'" :value="old('name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Price'" :name="'price'" :type="'text'" :value="old('price')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Stock'" :name="'stock'" :type="'text'" :value="old('stock')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Category'" :name="'category_id'" :type="'select'" :options="$categories"
            :select="'Choose category'" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Description'" :name="'description'" :type="'textarea'" :value="old('description')"
            :placeholder="'This product contain 1000mg vitamin c'" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Image'" :name="'image'" :type="'file'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
