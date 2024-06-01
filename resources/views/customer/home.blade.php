@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <x-banner-image :image="asset('img/banner3.jpg')" :aos="'fade-up'" />
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
      data-aos-duration="1000">
      <h3 class="text-dark text-uppercase mb-4">Kategori Makanan</h3>
      <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">Lihat Semua</a>
    </section>
    <x-grid-card :class="'mb-5 pb-5'">
      <x-product-grid :datas="$foodProducts" />
    </x-grid-card>
  </main>

  <x-banner-image :image="asset('img/banner3.jpg')" :aos="'fade-up'" />
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
      data-aos-duration="1000">
      <h3 class="text-dark text-uppercase mb-4">Kategori Kecantikan</h3>
      <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">Lihat Semua</a>
    </section>
    <x-grid-card :class="'mb-5 pb-5'">
      <x-product-grid :datas="$beautyProducts" />
    </x-grid-card>
  </main>
@endsection
