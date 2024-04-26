@php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.authenticated')

@section('title', 'Tambah Produk')

@section('content')
  <x-create-form :title="'Tambah produk baru'" :action="route('seller.store.product')" :route="route('seller.products')">
    <div class="row">
      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Nama Produk'" :name="'name'" :type="'text'" :placeholder="'Baju kemeja, Kue ulang tahun, dsb'" :value="old('name')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Harga'" :name="'price'" :type="'text'" :value="old('price')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Stok'" :name="'stock'" :type="'text'" :value="old('stock')" />
        </x-form-floating>
      </div>

      <div class="col-lg-3">
        <x-form-floating>
          <x-input-form-label :label="'Kategori Produk'" :name="'category_id'" :type="'select'" :options="$categories"
            :select="'Pilih Kategori'" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Deskripsi'" :name="'description'" :type="'textarea'" :value="old('description')"
            :placeholder="'Produk ini menggunakan bahan premium...'" />
        </x-form-floating>
      </div>

      <div class="col-lg-6">
        <x-form-floating>
          <x-input-form-label :label="'Gambar'" :name="'image'" :type="'file'" />
        </x-form-floating>
      </div>
    </div>

    <x-submit-button :label="'Simpan'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
  </x-create-form>
@endsection
