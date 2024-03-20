@extends('layouts.guest')

@section('title', 'Detail Produk')

@section('content')
  <div class="container mt-5 pt-5">
    <div class="position-absolute">
      <x-action-button :route="route('guest.products')" :variant="'text-light'" :icon="'arrow-left-circle mdi-24px'" :class="'p-2'" />
    </div>
    <div class="col-lg-7 col-12">
      <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded shadow hover-shadow">

      <div class="align-self-center">
        <h4 class="mt-4 fw-medium">{{ $product->name }} / <span class="h5 fw-medium">{{ $product->slug }}</span></h4>
      </div>
      <span class="mb-3 rounded badge bg-label-primary">
        Rp.{{ number_format($product->price, 2, ',', '.') }}
      </span>

      <div class="d-lg-flex align-items-center gap-5">
        <h6 class="fw-medium">Rating:
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star-outline text-warning"></i>
        </h6>

        <p class="fw-medium d-flex align-items-center">
          <i class="mdi mdi-cart-outline me-2"></i>
          {{ \App\Models\Order::where('product_id', $product->id)->count() }} Orders
        </p>
      </div>

      <div class="my-3 d-flex gap-3 align-items-center justify-content-start">
        <x-basic-button :label="'Add to Wishlist'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'heart-outline'" :variant="'primary'" />
        <x-basic-button :label="'Add to Cart'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'cart-outline'" :variant="'info'" />
        <x-basic-button :label="'Buy Now'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'basket-outline'" :variant="'danger'" />
      </div>

      <h6 class="fw-medium">Published On:
        <span class="text-secondary">{{ date('M d, H:i', strtotime($product->created_at)) }}
          {{ $product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
        </span>
      </h6>
      <div class="mt-4 pb-3">
        <h6 class="fw-medium mb-2">Description:</h6>
        <p class="fw-medium text-capitalize">{{ $product->description }}</p>
      </div>
    </div>

    <h5 class="fw-medium mt-5 mb-3">Related Products</h5>
    <x-grid-card>
      @foreach ($relatedProducts as $data)
        <div class="col">
          <div class="card h-100 cursor-pointer"
            onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'">
            <img class="card-img-top img-fluid h-100 w-100" alt="Card image cap"
              src="{{ asset('storage/' . $data->image) }}" width="100%">
            <div class="card-body">
              <h5 class="card-title mb-3">{{ $data->name }}</h5>
              <p class="card-text">
                <span class="badge bg-label-primary me-1">
                  Rp{{ number_format($data->price, 2, ',', '.') }}
                </span>
              </p>
              <div class="d-lg-flex align-items-center justify-content-between gap-5">
                <p class="fw-medium">Rating:
                  <i class="mdi mdi-star text-warning"></i>
                  <i class="mdi mdi-star text-warning"></i>
                  <i class="mdi mdi-star text-warning"></i>
                  <i class="mdi mdi-star-outline text-warning"></i>
                  <i class="mdi mdi-star-outline text-warning"></i>
                </p>

                <p class="fw-medium d-flex align-items-center">
                  <i class="mdi mdi-cart-outline me-2"></i>
                  {{ \App\Models\Order::where('product_id', $data->id)->count() }} Terjual
                </p>
              </div>
              {{-- <x-basic-button :label="'See More'" :icon="'eye-outline'" :class="'btn-sm'" :variant="'secondary'" :href="route('seller.detail.product', $data->slug)" /> --}}
            </div>
          </div>
        </div>
      @endforeach

    </x-grid-card>
  </div>
@endsection
