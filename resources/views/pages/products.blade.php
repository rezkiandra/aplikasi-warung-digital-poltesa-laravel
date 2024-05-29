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
        <div class="mt-3 pt-4 pt-lg-4 pt-md-5">
          <form action="" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Produk" name="search">
              <button class="btn btn-outline-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
            </div>
          </form>
        </div>
      </div>
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
