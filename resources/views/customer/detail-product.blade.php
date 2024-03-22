@extends('layouts.guest')

@section('title', 'Detail Produk')

@section('content')
  <div class="container mt-5 pt-5">
    <x-detail-product :product="$product" />

    <h5 class="fw-medium mt-5 mt-lg-5 mb-3">Produk Serupa</h5>
    <x-grid-card>
      <x-grid-card-item :title="$product->name" :image="$product->image" :price="$product->price" :datas="$relatedProducts" />
    </x-grid-card>
  </div>
@endsection
