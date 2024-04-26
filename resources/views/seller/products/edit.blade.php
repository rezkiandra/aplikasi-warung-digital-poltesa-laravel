@php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Edit Produk')

@section('content')
  <div class="d-lg-flex justify-content-between gap-4">
    <div class="card-body mb-lg-0 mb-4">
      <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded" width="100%">
    </div>

    <x-edit-form :title="'Edit spesifik produk'" :action="route('seller.update.product', $product->uuid)" :route="route('seller.products')" :class="'col-lg-9'">
      <div class="row">
        <div class="col-lg-4">
          <x-form-floating>
            <x-input-form-label :label="'Nama Produk'" :name="'name'" :type="'text'" :placeholder="'Baju kemeja, Kue ulang tahun, dsb'"
              :value="$product->name" />
          </x-form-floating>
        </div>

        <div class="col-lg-3">
          <x-form-floating>
            <x-input-form-label :label="'Harga'" :name="'price'" :type="'text'" :value="$product->price" />
          </x-form-floating>
        </div>

        <div class="col-lg-2">
          <x-form-floating>
            <x-input-form-label :label="'Stok'" :name="'stock'" :type="'text'" :value="$product->stock" />
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

        <div class="col-lg-12">
          <x-form-floating>
            <x-input-form-label :label="'Deskripsi'" :name="'description'" :type="'textarea'" :height="'120px'"
              :value="$product->description" :placeholder="'Produk ini menggunakan bahan premium...'" />
          </x-form-floating>
        </div>

        <div class="col-lg-12">
          <x-form-floating>
            <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" :value="$product->image" />
          </x-form-floating>
        </div>
      </div>
      <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </x-edit-form>
  </div>
@endsection
