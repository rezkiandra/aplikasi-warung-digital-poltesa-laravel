@foreach ($datas as $data)
  <div class="col-lg-2 col-md-4 col-6">
    <div class="card h-100 cursor-pointer"
      onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'">
      <div class="position-absolute">
        <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
      </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="card-body d-flex flex-column justify-content-between">
        <p class="card-title fw-medium mb-3">{{ $data->name }}</p>
        <div class="card-text d-flex align-items-center justify-content-between">
          <small class="rounded p-1 bg-label-primary me-1">
            Rp{{ number_format($data->price, 0, ',', '.') }}
          </small>
          <small class="fw-medium d-flex align-items-center">
            {{ \App\Models\Order::where('product_id', $data->id)->count() }} Terjual
          </small>
        </div>
        {{-- <div class="d-lg-flex flex-column align-items-cente justify-content-between">
          <x-basic-button :route="route('guest.detail.product', $data->slug)" :label="'Tambah ke keranjang'" :icon="'cart-outline'" :variant="'info'" :class="'btn-sm'" />
          <x-basic-button :route="route('guest.detail.product', $data->slug)" :label="'Beli produk'" :icon="'cart-outline'" :variant="'danger'" :class="'btn-sm'" />
        </div> --}}
      </div>
    </div>
  </div>
@endforeach
