@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  <x-banner-image :image="asset('img/banner3.jpg')" :class="'pt-lg-5 pt-5 mt-lg-3 mt-4'" :aos="'fade-up'" />
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
      data-aos-duration="1000">
      <h3 class="text-dark text-uppercase mb-4">Kategori Produk</h3>
      {{-- <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">Lihat Semua</a> --}}
    </section>
    <div class="row mb-5">
      <div class="col-lg-1">
        <i class="mdi mdi-food-outline mdi-48px"></i>
        <h4>Makanan</h4>
      </div>
    </div>
    {{-- <x-grid-card :class="'mb-5 pb-5'">
        <x-product-grid :datas="$foodProducts" />
      </x-grid-card> --}}
  </main>
@endsection
