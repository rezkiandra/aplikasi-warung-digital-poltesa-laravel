@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <x-banner-image :image="asset('img/banner1.webp')" :title="'Fashion'" :class="'pt-lg-5 pt-5 mt-lg-4 mt-4'" />
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
      <h3 class="text-dark text-uppercase">Kategori Pakaian</h3>
      <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">View All</a>
    </section>
    <x-grid-card :class="'mb-5'">
      <x-product-grid :datas="$fashionProduct" />
    </x-grid-card>
  </main>

  <x-banner-image :image="asset('img/banner2.webp')" :title="'Parfume'" :class="''" />
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
      <h3 class="text-dark text-uppercase mb-4">Kategori Parfume</h3>
      <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">View All</a>
    </section>
    <x-grid-card :class="'mb-5 pb-5'">
      <x-product-grid :datas="$parfumeProduct" />
    </x-grid-card>
  </main>
@endsection
