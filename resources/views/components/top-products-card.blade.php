<div class="col-xl-4 col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">{{ $title }}</h5>
    </div>
    <div class="card-body">
      @if ($datas)
        @foreach ($datas as $data)
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
              <div class="avatar-wrapper me-3">
                <div class="avatar rounded-2 bg-label-secondary">
                  <img src="{{ asset('storage/' . $data->product->image) }}" class="rounded-2">
                </div>
              </div>
              <div class="">
                <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                  <span class="text-dark text-capitalize fw-medium">{{ $data->product->name }}</span>
                </div>
                <small>Rp {{ number_format($data->product->price, 0, ',', '.') }}</small>
              </div>
            </div>
            @if (Auth::user()->customer)
              <div class="text-end">
                <h6 class="mb-0">
                  {{ $data->total }}</h6>
                <small>Pcs</small>
              </div>
            @elseif(Auth::user()->seller)
              <div class="text-end">
                <h6 class="mb-0">
                  {{ $data->total }}</h6>
                <small>Terjual</small>
              </div>
            @endif
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>
