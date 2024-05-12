@php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
@endphp

@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
  {{-- <div class="container-fluid mt-3 pt-5">
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

    <div class="row gx-0 gy-5 gx-sm-5 mt-4">
      <div class="col-md-3 col-sm-6 text-center" data-aos="fade-right" data-aos-duration="1000">
        <span class="badge badge-center rounded-pill bg-label-primary mb-4"><i
            class="tf-icons mdi mdi-react mdi-36px"></i></span>
        <h2 class="fw-bold mb-1">{{ $allProduct->count() }}</h2>
        <p class="fw-medium mb-0">Produk</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center" data-aos="fade-right" data-aos-duration="1000">
        <span class="badge badge-center rounded-pill bg-label-success mb-4"><i
            class="tf-icons mdi mdi-clock-outline mdi-36px"></i></span>
        <h2 class="fw-bold mb-1">{{ $allUser->count() }}</h2>
        <p class="fw-medium mb-0">Pengguna</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center" data-aos="fade-left" data-aos-duration="1000">
        <span class="badge badge-center rounded-pill bg-label-warning mb-4"><i
            class="tf-icons mdi mdi-emoticon-happy-outline mdi-36px"></i></span>
        <h2 class="fw-bold mb-1">{{ $allCustomer->count() }}</h2>
        <p class="fw-medium mb-0">Pelanggan</p>
      </div>
      <div class="col-md-3 col-sm-6 text-center" data-aos="fade-left" data-aos-duration="1000">
        <span class="badge badge-center rounded-pill bg-label-info mb-4"><i
            class="tf-icons mdi mdi-medal-outline mdi-36px"></i></span>
        <h2 class="fw-bold mb-1">{{ $allOrder->count() }}</h2>
        <p class="fw-medium mb-0">Pesanan</p>
      </div>
    </div>
  </div> --}}

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
