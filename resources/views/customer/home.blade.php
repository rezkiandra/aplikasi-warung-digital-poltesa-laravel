@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <div class="container-fluid mt-3 pt-5">
    <div class="position-absolute end-0 p-4 bottom-0 z-index-2">
      <button type="button" class="btn btn-sm btn-outline-primary">
        <i class="mdi mdi-arrow-up mdi-24px"></i>
      </button>
    </div>
    <div class="mt-3 pt-5 text-center">
      <h1 class="text-primary mb-5" data-aos="fade-down" data-aos-duration="1000">Warung Digital POLTESA</h1>
      <div class="box" data-aos="fade-down" data-aos-duration="1000">
        <h4 class="text-dark mb-2">Toko Online Sederhana dan Terpercaya</h4>
        <h5 class="text-dark mb-4">Transaksi Dengan Mudah Dan Cepat Serta Memberikan Pelayanan Terbaik</h5>
        <button type="button" id="CtaBtn" class="btn btn-primary text-uppercase">Belanja Sekarang</button>
      </div>
    </div>
  </div>

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
    <x-grid-card :class="'mb-5 pb-2 pb-lg-5'">
      <x-product-grid :datas="$parfumeProduct" />
    </x-grid-card>
  </main>
@endsection

@push('scripts')
  <script>
    const ctaBtn = document.getElementById('CtaBtn');
    ctaBtn.addEventListener('click', function() {
      window.location.href = '{{ route('customer.products') }}';
    })
  </script>
@endpush
