@foreach ($datas as $data)
  <div class="col-lg-3 col-md-4 col-6 pb-3 pb-lg-3">
    <div class="card h-100 cursor-pointer"
      onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'">
      <div class="position-absolute">
        <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
      </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="card-body d-flex flex-column justify-content-between">
        <span class="card-title text-dark fw-medium mb-3">{{ $data->name }}</span>
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
