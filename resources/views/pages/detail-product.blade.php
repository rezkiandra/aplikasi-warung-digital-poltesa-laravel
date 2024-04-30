@extends('layouts.guest')

@section('title', 'Detail Produk')

@section('content')
  <div class="container-fluid mt-5 pt-5">
    <x-detail-product :product="$product" />
    <x-related-products :relatedProducts="$relatedProducts" />
  </div>
@endsection
