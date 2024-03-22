@extends('layouts.guest')

@section('title', 'Detail Produk')

@section('content')
  <div class="container mt-5 pt-5">
    <x-detail-product :product="$product" />

    <x-grid-card>
      <x-grid-card-item :title="$product->name" :image="$product->image" :price="$product->price" :datas="$relatedProducts" />
    </x-grid-card>
  </div>
@endsection
