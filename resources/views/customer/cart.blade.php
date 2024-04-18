@php
  $fee = 1000;
@endphp

@extends('layouts.authenticated')
@section('title', 'Cart')
@section('content')
  <h4 class="mb-1">Cart</h4>
  <p class="mb-3">List of products in your cart</p>

  <div class="card p-3">
    <div class="col-lg-12 mb-4">
      <h5>My Shopping Bag ({{ $carts->count() }} Items)</h5>
      <ul class="list-group mb-4">
        @foreach ($carts as $cart)
          <li class="list-group-item" data-price="{{ $cart->product->price }}" data-product-id="{{ $cart->product_id }}">
            <div class="">
              <input type="hidden" name="customer_id" value="{{ $cart->customer_id }}">
              <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
              <div class="row">
                <div class="col-md-8 d-flex align-items-start gap-3">
                  <img src="{{ asset('storage/' . $cart->product->image) }}" alt="google home" width="150"
                    class="rounded cursor-pointer"
                    onclick="window.location.href='{{ route('customer.detail.product', $cart->product->slug) }}'">
                  <div class="d-lg-flex flex-column justify-content-start gap-0">
                    <h6 class="me-3 mb-1 mb-lg-2">
                      <a href="{{ route('customer.detail.product', $cart->product->slug) }}"
                        class="text-heading">{{ $cart->product->name }}</a>
                    </h6>
                    <div class="text-muted mb-1 mb-lg-2 d-lg-flex flex-row align-items-center small">
                      <span class="me-lg-1 me-0">Dijual:</span>
                      <span
                        class="badge bg-label-primary rounded-pill mt-2 mt-sm-0 text-capitalize">{{ $cart->product->seller->full_name }}</span>
                    </div>
                    <div class="text-muted mb-1 mb-lg-2 d-lg-flex align-items-center small">
                      <span class="me-lg-1 me-0">Stok:</span>
                      <span class="me-1 text-primary">{{ $cart->product->stock }}</span>
                      <span class="badge bg-label-info rounded-pill mt-2 mt-sm-0">In Stock</span>
                    </div>
                    <div class="d-flex gap-1">
                      <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm">
                          <i class="mdi mdi-trash-can-outline text-danger"></i>
                        </button>
                      </form>
                      <input type="number" name="quantity" class="form-control form-control-sm mb-2" id="quantity"
                        value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}">
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-end justify-content-center">
                  <div class="mt-lg-0 mt-2">
                    {{-- <s class="text-primary">$299 /</s> --}}
                    <span class="text-body"
                      id="totalPrice">Rp{{ number_format($cart->product->price * $cart->quantity + $fee, 0, '.', '.') }}
                    </span>
                  </div>
                  <form action="{{ route('order.store') }}" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                    <input type="hidden" name="quantity" id="quantity" value="{{ $cart->quantity }}">
                    <input type="hidden" name="total_price"
                      value="{{ $cart->product->price * $cart->quantity + $fee }}">
                    <x-submit-button :label="'Beli Sekarang'" id="btn-buy" :type="'submit'" :variant="'outline-primary btn-sm'" />
                  </form>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // mengatur quantity dalam cart menggunakan ajax
    $('input[name="quantity"]').on('change', function(event) {
      event.preventDefault();

      const customer_id = $('input[name="customer_id"]').val();
      const product_id = $('input[name="product_id"]').val();
      const quantity = $(this).val();

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
      })
    })

    // menghitung total price
    $(document).ready(function() {
      $('input[name="quantity"]').on('change', function() {
        const price = $(this).parents('li').data('price');
        const quantity = $(this).val();
        const totalPrice = price * quantity + {{ $fee }};

        $(this).parents('li').find('#totalPrice').html('Rp' + totalPrice.toString().replace(
          /\B(?=(\d{3})+(?!\d))/g, '.'));
      })
    })
  </script>
@endpush
