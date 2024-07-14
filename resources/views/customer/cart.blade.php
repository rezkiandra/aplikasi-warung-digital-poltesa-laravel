@extends('layouts.authenticated')
@section('title', 'Keranjang')
@section('content')
  <h4 class="mb-1">Keranjang Produk</h4>
  <p class="mb-3">Daftar produk yang ada di keranjang belanja anda</p>
  <div class="col-lg-12 mb-4">
    @if (!$carts->isEmpty())
      <h6>Keranjang produk saya ({{ $carts->count() }} item)</h6>
      <ul class="list-group mb-4">
        @each('partials.cart-item', $carts, 'cart')
      </ul>
    @else
      <p class="text-center">Tidak ada keranjang produk</p>
    @endif
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      $('input[name="quantity"]').on('change', function() {
        const index = $(this).closest('li').index(); // Ambil index item keranjang yang sedang diubah quantity-nya
        const price = $(this).closest('li').data('price');
        const quantity = $(this).val();
        const totalPrice = price * quantity;

        $(`ul.list-group li:nth-child(${index + 1})`).find('#totalPrice').html('Rp ' + totalPrice.toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, '.'));

        const customer_id = $(this).closest('li').find('input[name="customer_id"]').val();
        const product_id = $(this).closest('li').find('input[name="product_id"]').val();

        $.ajax({
          url: "{{ route('cart.update') }}",
          method: 'POST',
          data: {
            customer_id: customer_id,
            product_id: product_id,
            quantity: quantity,
            _token: "{{ csrf_token() }}",
            _method: 'PUT',
          },
        }).done(function(response) {}).fail(function(xhr, status, error) {});
      });
    });
  </script>
@endpush
