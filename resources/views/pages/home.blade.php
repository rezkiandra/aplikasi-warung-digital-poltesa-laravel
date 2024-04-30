@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <main class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <section class="product">
        <div class="mt-3 pt-5 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
          <div class="title">
            <h4 class="text-dark text-uppercase mb-2">Kategori Pakaian</h4>
            <h6 class="fw-normal">Menampilkan {{ $totalFashionProduct }} produk</h6>
          </div>
          <a href="{{ route('guest.products') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
        <x-grid-card>
          <x-product-grid :datas="$fashionProduct" />
        </x-grid-card>
      </section>

      <section class="product">
        <div class="mt-3 pt-5 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
          <div class="title">
            <h4 class="text-dark text-uppercase mb-2">Kategori Parfume</h4>
            <h6 class="fw-normal">Menampilkan {{ $totalFashionProduct }} produk</h6>
          </div>
          <a href="{{ route('guest.products') }}" class="btn btn-sm btn-primary">View All</a>
        </div>
        <x-grid-card>
          <x-product-grid :datas="$parfumeProduct" />
        </x-grid-card>
      </section>
    </div>
  </main>
@endsection
