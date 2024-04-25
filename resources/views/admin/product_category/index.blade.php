@extends('layouts.authenticated')
@section('title', 'Kategori Produk')
@section('content')
  <h4 class="mb-1">Kategori Produk</h4>
  <p class="mb-3">Kategori produk untuk mengelompokkan produk dalam masing-masing kategori</p>

  <x-basic-button :label="'Tambah kategori'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.category')" />
  <x-category-table :title="'Data Kategori'" :fields="['No', 'Nama Kategori', 'Total Produk', 'Dibuat Pada', 'Aksi']" :datas="$category" />
@endsection
