@extends('layouts.guest')
@section('title', 'Detail Produk')
@push('styles')
  <style>
    .card:hover {
      transition: .2s;
      transform: scale(.99);
    }

    .card {
      transition: .2s;
    }
  </style>
@endpush
@section('content')
  <div class="container-fluid mt-5 pt-4">
    <x-detail-product :product="$product" />
    <x-related-products :relatedProducts="$relatedProducts" />
  </div>
@endsection
