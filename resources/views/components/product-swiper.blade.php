@push('styles')
  <style>
    .card:hover {
      transition: .2s;
      transform: scale(.99);
    }

    .card {
      transition: .2s;
    }
  </style>
@endpush

<div class="row">
  @foreach ($datas as $data)
    <div class="col-lg-2 col-md-4 col-6 pb-3 pb-lg-3">
      <div class="card cursor-pointer">
        <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}"
          width="100%">
        <div class="p-2 d-flex flex-column justify-content-between">
          <div class="d-lg-flex align-items-center justify-content-between mt-1">
            <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
            <small class="card-title text-dark fw-medium">
              Rp {{ number_format($data->price, 0, ',', '.') }}
            </small>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
