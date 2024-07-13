@extends('layouts.authenticated')
@section('title', 'Wishlist')
@section('content')
  <h4 class="mb-1">{{ 'Wishlist Produk' }}</h4>
  <p class="mb-4">{{ 'Daftar produk yang ada di daftar favorit anda' }}</p>
  @if (!$wishlists->isEmpty())
    <x-grid-card>
      @foreach ($wishlists as $data)
        <div class="col-lg-2 col-md-4 col-6 pb-3 pb-lg-3" data-aos="fade-up" data-aos-duration="1000">
          <div class="card cursor-pointer"
            onclick="window.location.href='{{ route('customer.detail.product', $data->product->slug) }}'">
            <div class="position-absolute end-0 top-0 p-2">
              <x-wishlist-button :product="$data->product" :wishlistUUID="$data->uuid" />
            </div>
            <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->product->image) }}"
              width="100%">
            <div class="p-2 d-flex flex-column justify-content-between">
              <div class="d-lg-flex align-items-center justify-content-between mt-1">
                <small class="card-title text-dark fw-medium">{{ $data->product->name }}</small>
                <small class="card-title text-dark fw-medium">
                  Rp {{ number_format($data->product->price, 0, ',', '.') }}
                </small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </x-grid-card>
  @else
    <p class="text-center">{{ 'Tidak ada produk favorit' }}</p>
  @endif
@endsection
@push('styles')
  <style>
    .card:hover {
      transition: .2s;
      transform: scale(.99);
    }

    .card {
      transition: .2s;
    }

    img {
      height: 300px;
      width: 120%;
      background-position: center;
      background-size: cover;
    }

    @media screen and (max-width: 768px) {
      img {
        height: 150px;
        width: 100%;
        background-position: center;
        background-size: cover;
      }
    }

    @media screen and (max-width: 1280px) {
      img {
        height: 200px;
        width: 100%;
        background-position: center;
        background-size: cover;
      }
    }
  </style>
@endpush
