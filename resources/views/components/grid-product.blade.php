@foreach ($datas as $data)
  <div class="col-lg-3 col-md-6">
    <div class="card h-100 cursor-pointer"
    onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'">
    <div class="position-absolute">
      <span class="badge bg-danger text-white d-lg-flex align-items-centers text-uppercase px-4">Sale</span>
    </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="card-body">
        <h5 class="card-title fw-medium mb-3">{{ $data->name }}</h5>
        <p class="card-text">
          <span class="badge bg-label-primary me-1">
            Rp.{{ number_format($data->price, 2, ',', '.') }}
          </span>
        </p>
        <div class="d-flex align-items-center justify-content-between">
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
        {{-- <div class="d-lg-flex flex-column align-items-cente justify-content-between">
          <x-basic-button :route="route('guest.detail.product', $data->slug)" :label="'Tambah ke keranjang'" :icon="'cart-outline'" :variant="'info'" :class="'btn-sm'" />
          <x-basic-button :route="route('guest.detail.product', $data->slug)" :label="'Beli produk'" :icon="'cart-outline'" :variant="'danger'" :class="'btn-sm'" />
        </div> --}}
      </div>
    </div>
  </div>
@endforeach
