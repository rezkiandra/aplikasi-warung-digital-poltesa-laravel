@extends('layouts.guest')
@section('title', 'Beranda')
@section('content')
  <main class="container">
    <section class="row my-5 py-5 pt-lg-5 pt-md-5 d-flex d-md-flex align-items-center gap-5">
      <div class="col-lg" data-aos="fade-right" data-aos-duration="1200">
        <h5 class="mb-4 fw-bold">Pre-Release <span class="badge bg-label-primary rounded-pill">V.1.0</span></h5>
        <h1 class="text-uppercase fw-bold">Warung <span class="text-primary">Digital</span></h1>
        <div class="mb-4">
          <h5 class="text-wrap text-secondary line-height">Aplikasi e-commerce sederhana yang terintegrasi dengan
            payment gateway.
            Memudahkan pelaku bisnis di Politeknik Negeri Sambas dalam mengelola produk dan transaksi. Tersedia berbagai
            macam produk dengan kualitas terbaik
          </h5>
        </div>
        <x-call-to-action />
      </div>
      <div class="col-lg" data-aos="fade-left" data-aos-duration="1200">
        <img src="{{ asset('img/landing-page.jpg') }}" alt="" class="img-fluid banner shadow">
      </div>
    </section>

    @if ($data['foodProducts']->count() >= 4)
      <section class="pt-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="text-dark text-capitalize mb-4">Kategori Makanan Terlaris</h5>
          <a href="{{ route('customer.products', ['category' => 'makanan']) }}" class="btn btn-primary btn-sm mb-4">
            Lihat Semua
          </a>
        </div>
        <x-grid-card :class="'mb-5'">
          <x-top-product-sale :datas="$data['foodProducts']" />
        </x-grid-card>
      </section>
    @endif

    @if ($data['beautyProducts']->count() >= 4)
      <section data-aos="fade-up" data-aos-duration="1000">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="text-dark text-capitalize mb-4">Kategori Kecantikan Terlaris</h5>
          <a href="{{ route('customer.products', ['category' => 'kecantikan']) }}" class="btn btn-primary btn-sm mb-4">
            Lihat Semua
          </a>
        </div>
        <x-grid-card :class="'mb-5'">
          <x-top-product-sale :datas="$data['beautyProducts']" />
        </x-grid-card>
      </section>
    @endif
  </main>
@endsection
@push('styles')
  <style>
    .banner {
      border-top-left-radius: 30%;
      border-bottom-right-radius: 30%;
      border-top-right-radius: 1%;
      border-bottom-left-radius: 1%;
      transition: all 0.3s ease;
      transform: scale(1.01);
      animation: floating 5s ease-in-out infinite;
    }

    .fixed-left {
      top: 20%;
    }

    @keyframes floating {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(10px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .banner:hover {
      transform: scale(1.03);
      transition: all 0.3s ease;
    }

    .line-height {
      line-height: 1.8;
    }
  </style>
@endpush
