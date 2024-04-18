@php
  $fee = 0;
@endphp

@extends('layouts.authenticated')

@section('title', 'Checkout')

@section('content')
  <div class="bs-stepper-content rounded-0">
    <div id="checkout-cart" class="content fv-plugins-bootstrap5 fv-plugins-framework active dstepper-block">
      <div class="row">
        <!-- Cart left -->
        <h5>My Shopping Bag (2 Items)</h5>
        <div class="col-xl-8 mb-4 mb-xl-0">
          <ul class="list-group mb-4">
            <li class="list-group-item">
              <div class="">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-start gap-3">
                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="google home" width="150"
                      class="rounded cursor-pointer"
                      onclick="window.location.href='{{ route('customer.detail.product', $order->product->slug) }}'">
                    <div class="d-lg-flex flex-column justify-content-start gap-0">
                      <h6 class="me-3 mb-1 mb-lg-2">
                        <a href="{{ route('customer.detail.product', $order->product->slug) }}"
                          class="text-heading">{{ $order->product->name }}</a>
                      </h6>
                      <div class="text-muted mb-1 mb-lg-2 d-lg-flex flex-row align-items-center small">
                        <span class="me-lg-1 me-0">Dijual:</span>
                        <span
                          class="badge bg-label-primary rounded-pill mt-2 mt-sm-0">{{ $order->product->seller->full_name }}</span>
                      </div>
                      <div class="text-muted mb-1 mb-lg-2 d-lg-flex align-items-center small">
                        <span class="me-lg-1 me-0">Stok:</span>
                        <span class="me-1 text-primary">{{ $order->product->stock }}</span>
                        <span class="badge bg-label-info rounded-pill mt-2 mt-sm-0">In Stock</span>
                      </div>
                      <input type="number" class="form-control form-control-sm mb-2 disabled readonly" disabled
                        value="{{ $order->quantity }}">
                    </div>
                  </div>
                  <div class="col-md-4 d-flex flex-column align-items-end justify-content-center">
                    <div class="mt-lg-0 mt-2">
                      {{-- <s class="text-primary">$299 /</s> --}}
                      <span class="text-body"
                        id="totalPrice">Rp{{ number_format($order->product->price * $order->quantity, 0, '.', '.') }}
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div class="col-xl-4">
          <div class="border rounded p-4 mb-4 bg-white">
            <h6>Rincian Pesanan</h6>
            <div class="row g-4 mb-4">
              <div class="col-sm-8 col-xxl-8 col-xl-12">
                <input type="text" class="form-control form-control-sm" placeholder="Enter Promo Code"
                  aria-label="Enter Promo Code">
              </div>
              <div class="col-4 col-xxl-4 col-xl-12">
                <div class="d-grid">
                  <button type="button" class="btn btn-outline-primary waves-effect">Apply</button>
                </div>
              </div>
            </div>
            <div class="bg-lightest rounded p-4 mb-4">
              <h6 class="mb-2">Buying gift for a loved one?</h6>
              <p class="mb-2">Gift wrap and personalized message on card, Only for $2.</p>
              <a href="javascript:void(0)" class="fw-medium">Add a gift wrap</a>
            </div>
            <dl class="row mb-0">
              <dt class="col-6 fw-normal text-heading">Subtotal</dt>
              <dd class="col-6 text-end">Rp{{ number_format($order->product->price * $order->quantity, 0, '.', '.') }}
              </dd>

              <dt class="col-6 fw-normal text-heading">Biaya Layanan</dt>
              <dd class="col-6 text-end">
                <i class="mdi mdi-truck-fast-outline me-1"></i>
                Rp{{ number_format($fee, 0, '.', '.') }}
              </dd>

              <dt class="col-6 fw-normal text-heading">Diskon Produk</dt>
              <dd class="col-6 text-end"><s
                  class="text-muted me-1">Rp{{ number_format($order->product->price * $order->quantity, 0, '.', '.') }}</s>
                <span class="badge bg-label-success rounded-pill text-uppercase">Free</span>
              </dd>

            </dl>
            <hr class="mx-n5">
            <dl class="row mb-4">
              <dt class="col-6 text-heading">Total</dt>
              <dd class="col-6 fw-medium text-heading text-end mb-0">
                Rp{{ number_format($order->product->price * $order->quantity + $fee, 0, '.', '.') }}</dd>
            </dl>
          </div>
          <x-submit-button :label="'Bayar Sekarang'" :id="'pay-button'" :type="'submit'" :class="'btn-primary w-100'" :icon="'basket-outline me-2'"
            :variant="'primary'" />
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
      snap.pay('{{ $order->snap_token }}', {
        onSuccess: function(result) {
          window.location.href = "{{ route('midtrans.success', $order->uuid) }}";
        },
        onPending: function(result) {
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        onError: function(result) {
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
@endpush