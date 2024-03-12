@php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Edit Product')

@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="col-lg-2 card-body">
      <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded" width="100%">
    </div>

    <x-edit-form :title="'Edit specific product'" :action="route('seller.update.product', $product->uuid)" :route="route('seller.products')" :class="'col-lg-10'">
      <div class="row">
        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Product Name'" :name="'name'" :type="'text'" :placeholder="'Baju kemeja, Kue ulang tahun, dsb'"
              :value="$product->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Price'" :name="'price'" :type="'text'" :value="$product->price" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Stock'" :name="'stock'" :type="'text'" :value="$product->stock" />
          </x-form-floating>
        </div>

        <div class="col-lg-6">
          <x-form-floating>
            <x-input-form-label :label="'Description'" :name="'description'" :type="'textarea'" :value="$product->description"
              :placeholder="'This product contain 1000mg vitamin c'" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <select name="category_id" id="category_id" class="form-select">
              <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
              @foreach ($categories as $key => $value)
                @if ($key == $product->category_id)
                  @continue
                @endif
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Image'" :name="'image'" :type="'file'" :value="$product->image" />
          </x-form-floating>
        </div>
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-edit-form>
  </div>
@endsection
