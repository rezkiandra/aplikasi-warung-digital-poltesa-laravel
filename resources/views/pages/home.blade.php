@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  @if ($fashionProduct->count())
    <x-banner-image :image="asset('img/banner1.webp')" :class="'pt-lg-5 pt-5 mt-lg-3 mt-4'" :aos="'fade-down'" />
    <main class="container-fluid" id="products">
      <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
        data-aos-duration="1000">
        <h3 class="text-dark text-uppercase">Kategori Pakaian</h3>
        <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">Lihat Semua</a>
      </section>
      <x-grid-card :class="'mb-5'">
        <x-product-grid :datas="$fashionProduct" />
      </x-grid-card>
    </main>
  @elseif ($parfumeProduct->count())
    <x-banner-image :image="asset('img/banner2.webp')" :aos="'fade-up'" />
    <main class="container-fluid">
      <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
        data-aos-duration="1000">
        <h3 class="text-dark text-uppercase mb-4">Kategori Parfume</h3>
        <a href="{{ route('guest.products') }}" class="btn btn-sm btn-outline-primary mb-4">Lihat Semua</a>
      </section>
      <x-grid-card :class="'mb-5 pb-5'">
        <x-product-grid :datas="$parfumeProduct" />
      </x-grid-card>
    </main>
  @endif
@endsection

@push('scripts')
  <script type="text/javascript">
    const ctaBtn = document.getElementById('CtaBtn');
    ctaBtn.addEventListener('click', function() {
      window.location.href = '{{ route('guest.products') }}';
    })
  </script>
@endpush
