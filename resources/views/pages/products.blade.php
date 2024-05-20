@php
  $totalProducts = \App\Models\Products::count();
  $category = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
@endphp

@extends('layouts.guest')
@section('title', 'Produk')
@section('content')
  <section class="mb-5 pb-5" data-aos="fade" data-aos-duration="1000">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="d-flex align-items-center justify-content-between">
        <div class="mt-3 pt-4 pt-lg-4 pt-md-5">
          <h3 class="text-dark text-uppercase mb-2">Produk Kami</h3>
          <h6 class="">Menampilkan {{ $totalProducts }} produk</h6>
        </div>
        {{-- <div class="d-flex flex-column pt-4 col-4 col-lg-2">
          <label for="filter" class="d-none d-lg-block d-md-block form-label text-uppercase h4">Filter Produk</label>
          <select name="filter" id="filter" class="form-select text-uppercase">
            <option value="" class="form-select">Semua</option>
            @foreach ($category as $key => $value)
              <option value="{{ $key }}" class="form-select">{{ $value }}</option>
            @endforeach
          </select>
        </div> --}}
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
