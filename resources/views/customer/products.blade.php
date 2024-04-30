@php
  $totalProducts = \App\Models\Products::count();
@endphp

@extends('layouts.guest')

@section('title', 'Products')

@section('content')
  <section id="hero" class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="mt-3 pt-5 pt-lg-4 pt-md-5">
        <h3 class="text-dark mb-2">Produk Kami</h3>
        <h6 class="">Showing all {{ $totalProducts }} results</h6>
      </div>
    </div>

    <div class="container-fluid">
      <x-grid-card>
        <x-grid-card-item :datas="$products" />
      </x-grid-card>
    </div>
  </section>
@endsection
