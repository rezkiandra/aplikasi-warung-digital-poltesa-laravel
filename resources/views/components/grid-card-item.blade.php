@php
  $user_role = Auth::user()->role_id ?? '';
@endphp

@foreach ($datas as $data)
  <div class="col-lg-3 col-md-6 col-12">
    <div class="card h-100 cursor-pointer"
      @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
      @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
      @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
      @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
      <img class="card-img-top img-fluid h-100 w-100" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}"
        width="100%">
      <div class="card-body">
        <h5 class="card-title mb-3">{{ $data->name }}</h5>
        <p class="card-text">
          <span class="badge bg-label-primary me-1">
            Rp{{ number_format($data->price, 2, ',', '.') }}
          </span>
        </p>
        <div class="d-lg-flex d-md-flex d-flex align-items-center justify-content-between">
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
