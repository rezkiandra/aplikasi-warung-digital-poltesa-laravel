@php
  $relatedProducts = \App\Models\Products::where('category_id', $product->category_id)
      ->where('id', '!=', $product->id)
      ->get();
@endphp
@extends('layouts.guest')
@section('title', 'Detail Produk')
@section('content')
  <div class="container mt-5 pt-5">
    <x-detail-product :product="$product" />
    <x-related-products :relatedProducts="$relatedProducts" />
  </div>
@endsection
