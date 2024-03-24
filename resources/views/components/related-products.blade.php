@php
  $user_role = Auth::user()->role_id ?? '';
@endphp

<h5 class="fw-medium mt-5 mt-lg-5 mb-3">Produk Serupa</h5>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
  @foreach ($relatedProducts as $data)
    <div class="col-lg-2 col-md-4 col-6 pb-3 pb-lg-3">
      <div class="card h-100 cursor-pointer"
        @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
          @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
          @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
          @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
        <div class="position-absolute">
          <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
        </div>
        <img class="card-img-top img-fluid" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}"
          width="100%">
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
</div>
