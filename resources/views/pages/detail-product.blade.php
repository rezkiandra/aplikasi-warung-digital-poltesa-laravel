@php
  $relatedProducts = \App\Models\Products::where('category_id', $product->category_id)
      ->where('id', '!=', $product->id)
      ->get();
@endphp
@extends('layouts.guest')
@section('title', 'Detail Produk')
@push('styles')
  <style>
    .card:hover {
      opacity: .9;
      transition: .2s;
      transform: scale(.99);
    }
  </style>
@endpush
@section('content')
  <div class="container-fluid mt-5 pt-5">
    <x-detail-product :product="$product" />
    <x-related-products :relatedProducts="$relatedProducts" />
  </div>
@endsection
