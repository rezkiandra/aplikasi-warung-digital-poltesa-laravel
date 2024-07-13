@extends('layouts.guest')
@section('title', 'Beranda')
@section('content')
  <div
    class="fixed-left d-none position-fixed py-4 bg-white d-lg-flex d-md-flex flex-column gap-4 px-3 rounded rounded-lg shadow"
    data-aos="fade-right" data-aos-duration="1200">
    <a href="https://twitter.com/infoPoltesa" class="">
      <i class="mdi mdi-twitter mdi-24px"></i>
    </a>
    <a href="https://youtube.com/@politekniknegerisambas" class="">
      <i class="mdi mdi-youtube mdi-24px"></i>
    </a>
    <a href="https://facebook.com/poltesa" class="">
      <i class="mdi mdi-facebook mdi-24px"></i>
    </a>
    <a href="https://mail.google.com/mail/view?fs=1&tf=cm?to=info@poltesa.ac.id" class="">
      <i class="mdi mdi-email-outline mdi-24px"></i>
    </a>
    <a href="https://instagram.com/politekniknegerisambas_" class="">
      <i class="mdi mdi-instagram mdi-24px"></i>
    </a>
  </div>
  <main class="container">
    <section class="row my-5 pt-5 pt-lg-5 pt-md-5 d-flex d-md-flex align-items-center gap-5">
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
        <a href="{{ route('guest.products') }}" class="btn btn-primary">
          <i class="mdi mdi-cart-outline me-2"></i>
          <span>Lihat Produk</span>
        </a>
      </div>    
      <div class="col-lg" data-aos="fade-left" data-aos-duration="1200">
        <img src="{{ asset('img/landing-page.jpg') }}" alt="" class="img-fluid banner shadow">
      </div>
    </section>
    
    @if ($topFoodProducts->count() > 0)
      <section class="" data-aos="fade-up" data-aos-duration="1000">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="text-dark text-capitalize mb-4">Produk Teratas</h5>
          <a href="{{ route('guest.products') }}" class="btn btn-primary btn-sm mb-4">Lihat Semua</a>
        </div>
        <x-grid-card :class="'mb-5 pb-5'">
          <x-top-product-sale :datas="$topFoodProducts" />
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
        transform: translateY(20px);
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