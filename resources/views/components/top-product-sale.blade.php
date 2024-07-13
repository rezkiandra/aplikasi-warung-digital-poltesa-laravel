@php
  $user_role = Auth::user()->role_id ?? '';
  $customer = auth()->user()->customer ?? '';
  if (Auth::check() && $customer) {
      $wishlistUUID = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)
          ->pluck('uuid')
          ->toArray();
  }
@endphp
@foreach ($datas as $data)
  <div class="col-lg-3 col-md-4 col-6 pb-lg-3 pb-3" data-aos="fade-up" data-aos-duration="1000">
    <div class="card cursor-pointer"
      @if ($user_role == 1) onclick="window.location.href='{{ route('admin.detail.product', $data->slug) }}'" 
      @elseif ($user_role == 2) onclick="window.location.href='{{ route('seller.detail.product', $data->slug) }}'"
      @elseif ($user_role == 3) onclick="window.location.href='{{ route('customer.detail.product', $data->slug) }}'"
      @else onclick="window.location.href='{{ route('guest.detail.product', $data->slug) }}'" @endif>
      <div class="position-absolute end-0 top-0 p-2">
        @auth
          @if ($customer && $customer->wishlist->contains('product_id', $data->id))
            <form action="{{ route('wishlist.destroy', $data->uuid) }}" method="POST" class="bg-white rounded-circle">
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
      <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="p-2 d-flex flex-column justify-content-between">
        <div class="d-lg-flex d-md-flex align-items-center justify-content-between mt-1">
          <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
          <small class="card-title text-dark fw-medium">
            Rp {{ number_format($data->price, 0, ',', '.') }}
          </small>
        </div>
        <small class="d-none d-lg-flex d-md-flex align-items-center justify-content-end">
          {{-- <span>
            <span class="d-lg-flex align-items-center gap-1">
              <i class="mdi mdi-star-half-full text-warning"></i>
              <span class="text-dark">4.5</span>
              <span class="text-secondary">(123 rating)</span>
            </span>
          </span> --}}
          <span class="">
            Terjual {{ \App\Models\Order::where('product_id', $data->id)->where('status', 'sudah bayar')->sum('quantity') }}
          </span>
        </small>
      </div>
    </div>
  </div>
@endforeach
@push('styles')
  <style>
    .card:hover {
      transition: .2s;
      transform: scale(.99);
    }

    .card {
      transition: .2s;
    }

    img {
      height: 300px;
      width: 100%;
      background-position: center;
      background-size: cover;
    }

    @media screen and (max-width: 768px) {
      img {
        height: 180px;
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
