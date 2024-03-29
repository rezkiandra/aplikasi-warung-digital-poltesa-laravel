@extends('layouts.authenticated')

@section('title', 'Cart')

@section('content')
  <h4 class="mb-1">Cart</h4>
  <p class="mb-3">List of products in your cart</p>

  <div class="card p-3">
    <div class="col-lg-12 mb-4 mb-xl-0">
      <h5>My Shopping Bag ({{ $carts->count() }} Items)</h5>
      <ul class="list-group mb-4">
        @foreach ($carts as $cart)
          <li class="list-group-item">
            <div class="d-flex gap-4">
              <div class="flex-shrink-0">
                <img src="{{ asset('storage/' . $cart->product->image) }}" alt="google home" width="150" class="rounded">
              </div>
              <div class="flex-grow-1">
                <div class="row">
                  <div class="col-md-8">
                    <h6 class="me-3 mb-2">
                      <a href="javascript:void(0)" class="text-heading">{{ $cart->product->name }}</a>
                    </h6>
                    <div class="text-muted mb-2 d-flex flex-wrap">
                      <span class="me-1">Dijual oleh:</span>
                      <a href="javascript:void(0)" class="me-1">{{ $cart->product->seller->full_name }}</a>
                      <span class="badge bg-label-success rounded-pill mt-2 mt-sm-0">In Stock</span>
                    </div>
                    <div class="text-muted mb-2 d-flex flex-wrap">
                      <span class="me-1">Stok:</span>
                      <a href="javascript:void(0)" class="me-1">{{ $cart->product->stock }}</a>
                    </div>
                    <input type="number" class="form-control form-control-sm w-px-100 mb-2" value="{{ $cart->quantity }}" min="1"
                    max="{{ $cart->product->stock }}" fdprocessedid="0a7xa">
                    <div>
                      <i class="mdi mdi-pencil-outline text-primary"></i>
                      <i class="mdi mdi-trash-can-outline text-danger"></i>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="text-md-end">
                      <button type="button" class="btn text-muted p-0 shadow-none btn-pinned waves-effect waves-light"
                        aria-label="Close" fdprocessedid="zqbk6">
                        <i class="ri-close-line ri-18px"></i>
                      </button>
                      <div class="mt-4 mt-md-6 mb-md-0">
                        {{-- <s class="text-primary">$299 /</s> --}}
                        <span class="text-body">Rp{{ number_format(($cart->product->price * $cart->quantity), 0, '.', '.') }}</span>
                      </div>
                      <button type="button" class="btn btn-sm btn-outline-primary mt-2 waves-effect"
                        fdprocessedid="niz5lk">Beli Sekarang</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection
