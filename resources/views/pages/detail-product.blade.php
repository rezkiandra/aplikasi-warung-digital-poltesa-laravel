@extends('layouts.guest')

@section('title', 'Detail Produk')

@section('content')
  <div class="container mt-5 pt-5">
    <div class="position-absolute">
      <x-action-button :route="route('guest.products')" :variant="'text-light'" :icon="'arrow-left-circle mdi-24px'" :class="'p-2'" />
    </div>
    <div class="col-12">
      <img src="{{ asset('storage/' . $product->image) }}" alt=""
        class="img-fluid rounded shadow hover-shadow col-12 col-lg-6 col-md-8">
      <div class="align-self-center">
        <h4 class="mt-4 fw-medium">{{ $product->name }}</h4>
      </div>
      <span class="mb-3 me-3 rounded badge bg-label-primary">
        Rp.{{ number_format($product->price, 2, ',', '.') }}
      </span>
      <span class="mb-3 rounded badge bg-label-success">Stok tersisa {{ $product->stock }} buah</span>

      <div class="d-flex d-lg-flex d-md-flex align-items-center gap-5">
        <h6 class="fw-medium">Rating:
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star text-warning"></i>
          <i class="mdi mdi-star-outline text-warning"></i>
        </h6>

        <p class="fw-medium d-flex align-items-center">
          <i class="mdi mdi-cart-outline me-2"></i>
          {{ \App\Models\Order::where('product_id', $product->id)->count() }} Terjual
        </p>
      </div>

      <div class="mb-3 d-flex gap-3 align-items-center justify-content-start">
        <x-submit-button :label="'Add to Wishlist'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'heart-outline'"
          :variant="'primary'" />
        <x-submit-button :label="'Add to Cart'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'cart-outline'"
          :variant="'info'" />
        <x-submit-button :label="'Buy Now'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'basket-outline'"
          :variant="'danger'" />
      </div>

      <h6 class="fw-medium">Published On:
        <span class="text-secondary">{{ date('M d, H:i', strtotime($product->created_at)) }}
          {{ $product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
        </span>
      </h6>
      <div class="col-12 col-lg-6 col-md-8">
        <div class="mt-4 pb-3">
          <h6 class="fw-medium mb-2">Description:</h6>
          <p class="fw-medium text-capitalize">{{ $product->description }}</p>
        </div>
      </div>
    </div>

    <h5 class="fw-medium mt-3 mt-lg-5 mb-3">Related Products</h5>
    <x-grid-card>
      <x-grid-card-item :title="$product->name" :image="$product->image" :price="$product->price" :datas="$relatedProducts" />
    </x-grid-card>
  </div>
@endsection
