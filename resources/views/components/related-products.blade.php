@php
  $user_role = auth()->user()->role_id ?? '';
  $customer = auth()->user()->customer ?? '';
  if (Auth::check() && $customer) {
      $wishlistUUID = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)
          ->pluck('uuid')
          ->toArray();
  }
@endphp

@push('styles')
  <style>
    img {
      height: 280px;
      width: 100%;
      background-position: center;
      background-size: cover;
    }

    @media screen and (max-width: 768px) {
      img {
        height: 140px;
        width: 100%;
        background-position: center;
        background-size: cover;
      }
    }

    @media screen and (max-width: 1280px) {
      img {
        height: 250px;
        width: 100%;
        background-position: center;
        background-size: cover;
      }
    }
  </style>
@endpush

<h5 class="fw-medium mt-2 mt-lg-5 mb-4 text-uppercase">Produk Kategori Sama Lainnya</h5>
<div class="row row-cols-1 row-cols-md-3 g-3 mb-5 pb-5 pb-lg-5">
  @foreach ($relatedProducts as $data)
    @if ($user_role == 3)
      <div class="col-lg-2 col-md-4 col-6 pb-lg-3">
        <div class="card cursor-pointer"
          @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
          @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
          @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
          @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
          <div class="position-absolute end-0 top-0 p-2">
            @auth
              @if ($customer && $customer->wishlist->contains('product_id', $data->id))
                <form action="{{ route('wishlist.destroy', $wishlistUUID) }}" method="POST" class="bg-white rounded-circle">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn small p-1">
                    <i class="mdi mdi-heart text-danger"></i>
                  </button>
                </form>
              @else
                <form action="{{ route('wishlist.store') }}" method="POST" class="bg-white rounded-circle">
                  @csrf
                  <input type="hidden" name="customer_id" value="{{ Auth::user()->customer->id ?? '' }}">
                  <input type="hidden" name="product_id" value="{{ $data->id }}">
                  <button type="submit" id="wishlist" class="btn small p-1">
                    <i class="mdi mdi-heart-outline text-dark"></i>
                  </button>
                </form>
              @endif
            @endauth

            @guest
              <form action="{{ route('wishlist.store') }}" class="text-dark bg-white rounded-circle p-1" method="POST">
                @csrf
                <button type="submit" id="wishlist" class="btn small p-1">
                  <i class="mdi mdi-heart-outline text-dark"></i>
                </button>
              </form>
            @endguest
          </div>
          <div class="d-flex flex-column justify-content-between">
            <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
            <div class="p-2 d-flex flex-column justify-content-between">
              <div class="d-lg-flex d-md-flex align-items-center justify-content-between mt-1">
                <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
                <small class="card-title text-dark fw-medium">
                  Rp {{ number_format($data->price, 0, ',', '.') }}
                </small>
              </div>
              <small class="d-none d-lg-flex d-md-flex align-items-center justify-content-between">
                <span>
                  <span class="d-lg-flex d-md-flex align-items-center gap-1">
                    <i class="mdi mdi-star-half-full text-warning"></i>
                    <span class="text-dark">4.5</span>
                    <span class="text-secondary">(123 rating)</span>
                  </span>
                </span>
                <span>
                  Terjual
                  {{ \App\Models\Order::where('product_id', $data->id)->where('status', 'paid')->sum('quantity') }}
                </span>
              </small>
            </div>
          </div>
        </div>
      </div>
    @else
      @guest
        <div class="col-lg-2 col-md-4 col-6 pb-lg-3">
          <div class="card cursor-pointer"
            @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
            @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
            @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
            @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
            <div class="d-flex flex-column justify-content-between">
              <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
              <div class="p-2 d-flex flex-column justify-content-between">
                <div class="d-lg-flex d-md-flex align-items-center justify-content-between mt-1">
                  <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
                  <small class="card-title text-dark fw-medium">
                    Rp {{ number_format($data->price, 0, ',', '.') }}
                  </small>
                </div>
                <small class="d-none d-lg-flex d-md-flex align-items-center justify-content-between">
                  <span>
                    <span class="d-lg-flex d-md-flex align-items-center gap-1">
                      <i class="mdi mdi-star-half-full text-warning"></i>
                      <span class="text-dark">4.5</span>
                      <span class="text-secondary">(123 rating)</span>
                    </span>
                  </span>
                  <span>
                    Terjual
                    {{ \App\Models\Order::where('product_id', $data->id)->where('status', 'paid')->sum('quantity') }}
                  </span>
                </small>
              </div>
            </div>
          </div>
        </div>
      @endguest
      @auth
        <div class="col-lg-2 col-md-3 col-6 pb-lg-3">
          <div class="card cursor-pointer"
            @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
            @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
            @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
            @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
            <div class="d-flex flex-column justify-content-between">
              <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
              <div class="p-2 d-flex d-lg-flex flex-column justify-content-between">
                <div class="d-lg-flex d-md-flex align-items-center justify-content-between mt-1">
                  <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
                  <small class="card-title text-dark fw-medium">
                    Rp {{ number_format($data->price, 0, ',', '.') }}
                  </small>
                </div>
                <small class="d-none d-lg-flex d-md-flex align-items-center justify-content-between">
                  <span>
                    <span class="d-lg-flex d-md-flex align-items-center gap-1">
                      <i class="mdi mdi-star-half-full text-warning"></i>
                      <span class="text-dark">4.5</span>
                      <span class="text-secondary">(123 rating)</span>
                    </span>
                  </span>
                  <span>
                    Terjual
                    {{ \App\Models\Order::where('product_id', $data->id)->where('status', 'paid')->sum('quantity') }}
                  </span>
                </small>
              </div>
            </div>
          </div>
        </div>
      @endauth
    @endif
  @endforeach
</div>


@push('scripts')
  <script>
    const customerId = {{ Auth::user()->customer->id ?? '' }}
    const productId = {{ $data->id ?? '' }}

    $(document).on('click', '#wishlist', function() {
      $.ajax({
        url: "{{ route('wishlist.store') }}",
        method: "POST",
        data: {
          customer_id: customerId,
          product_id: productId
        },
        success: function(response) {
          if (response == 'success') {
            $('#wishlist').toggleClass('text-danger')
          }
        }
      });
    });
  </script>
@endpush
