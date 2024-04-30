@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <section id="hero" class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="mt-3 pt-5 pt-lg-4 pt-md-5">
        <h4 class="text-dark text-uppercase mb-2">Kategori Pakaian</h4>
        <h6 class="fw-normal">Menampilkan {{ $totalFashionProduct }} produk</h6>
      </div>
    </div>

    <div class="container-fluid">
      <x-grid-card>
        <x-product-grid :datas="$fashionProduct" />
      </x-grid-card>
    </div>
  </section>
@endsection
