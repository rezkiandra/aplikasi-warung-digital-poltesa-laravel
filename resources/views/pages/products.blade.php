@php
  $totalProducts = \App\Models\Products::count();
@endphp

@extends('layouts.guest')
@section('title', 'Produk')
@section('content')
  <section id="hero" class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="mt-2 pt-5 pt-lg-4 pt-md-5">
        <h3 class="text-dark text-uppercase mb-2">Produk Kami</h3>
        <h6 class="">Menampilkan {{ $totalProducts }} produk</h6>
      </div>
    </div>

    <div class="container-fluid">
      <x-grid-card>
        <x-product-grid :datas="$products" />
      </x-grid-card>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    const customerId = {{ auth()->user()->customer->id ?? '' }}
    const productId = {{ $data->id ?? '' }}

    $(document).on('click', '#wishlist', function() {
      $.ajax({
        url: "{{ route('wishlist.store') }}",
        method: "POST",
        data: {
          customer_id: customerId,
          product_id: productId
        },
        success: function(response) {
          if (response == 'success') {
            $('#wishlist').toggleClass('text-danger')
          }
        }
      });
    });
  </script>
@endpush
