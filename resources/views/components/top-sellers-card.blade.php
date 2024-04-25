@php
  $totalEarnings = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->join('sellers', 'sellers.id', '=', 'products.seller_id', 'left')
      ->orderBy('price', 'desc')
      ->sum('price');
@endphp

<div class="col-xl-4 col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">{{ $title }}</h5>
    </div>
    <div class="card-body">
      @foreach ($datas as $data)
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
          <div class="d-flex align-items-center">
            <div class="avatar-wrapper me-3">
              <div class="avatar rounded-2 bg-label-secondary">
                <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
              </div>
            </div>
            <div class="">
              <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                <span class="text-dark text-capitalize fw-medium">{{ $data->full_name }}</span>
              </div>
              <small>{{ $data->user->email }}</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">Rp{{ number_format($totalEarnings, 0, '.', ',') }}</h6>
            <small>Pendapatan</small>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
