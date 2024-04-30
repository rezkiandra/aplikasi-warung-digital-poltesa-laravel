@push('styles')
  <style>
    .card:hover {
      opacity: .9;
      transition: .2s;
      transform: scale(.99);
    }
  </style>
@endpush

@foreach ($datas as $data)
  <div class="col-lg-3 col-md-4 col-6 pb-3 pb-lg-3">
    <div class="card cursor-pointer" onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'">
      <div class="position-absolute">
        @if ($data->stock == 0)
          <span class="badge bg-danger text-white d-lg-flex align-items-centers text-uppercase px-4">Out of Stock</span>
        @else
          <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
        @endif
      </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="card-body d-flex flex-column justify-content-between">
        <small class="card-title text-dark fw-medium mb-3">{{ $data->name }}</small>
        <div class="card-text d-flex align-items-center justify-content-between">
          <small class="badge rounded p-1 bg-label-primary">
            Rp{{ number_format($data->price, 0, ',', '.') }}
          </small>
          <small class="d-flex align-items-center">
            <span>Terjual {{ \App\Models\Order::where('product_id', $data->id)->sum('quantity') }}</span>
          </small>
        </div>
      </div>
    </div>
  </div>
@endforeach
