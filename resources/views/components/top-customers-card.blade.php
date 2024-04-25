@php
  $totalOrders = \App\Models\Order::join('customers', 'customers.id', '=', 'orders.customer_id', 'left')
      ->orderBy('customer_id', 'desc')
      ->sum('quantity');
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
                @if (Auth::user()->role_id == 1)
                  <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
                @elseif (Auth::user()->role_id == 2)
                  <img src="{{ asset('storage/' . $data->customer->image) }}" class="rounded-2">
                @endif
              </div>
            </div>
            <div class="">
              <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                <span class="text-dark text-capitalize fw-medium">{{ $data->full_name }}</span>
              </div>
              @if (Auth::user()->role_id == 1)
                <small>{{ $data->user->email }}</small>
              @elseif (Auth::user()->role_id == 2)
                <small>{{ $data->customer->user->email }}</small>
              @endif
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">{{ $totalOrders }}</h6>
            <small>Pesanan</small>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
