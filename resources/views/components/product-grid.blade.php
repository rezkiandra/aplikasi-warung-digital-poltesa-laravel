@php
  $user = Auth::user();
  $user_role = $user->role_id ?? '';
  $customer = $user->customer ?? '';

  $wishlistUUIDs = [];
  if ($user && $user->customer) {
      $wishlistUUIDs = \App\Models\Wishlist::whereIn('product_id', $datas->pluck('id'))
          ->where('customer_id', $user->customer->id)
          ->pluck('uuid', 'product_id')
          ->toArray();
  }

  $routes = [
      1 => 'admin.detail.product',
      2 => 'seller.detail.product',
      3 => 'customer.detail.product',
      'default' => 'guest.detail.product',
  ];
@endphp
@foreach ($datas as $data)
  <div class="col-lg-2 col-md-4 col-6 pb-lg-3 pb-3" data-aos="fade-up" data-aos-duration="1000">
    <div class="card cursor-pointer"
      onclick="window.location.href='{{ route($routes[$user_role] ?? $routes['default'], $data->slug) }}'">
      <div class="position-absolute end-0 top-0 p-2">
        @auth
          @php
            $isInWishlist = $customer && $customer->wishlist->contains('product_id', $data->id);
          @endphp
          <form
            action="{{ route($isInWishlist ? 'wishlist.destroy' : 'wishlist.store', $wishlistUUIDs[$data->id] ?? '') }}"
            method="POST" class="bg-white rounded-circle">
            @csrf
            @if ($isInWishlist)
              @method('DELETE')
            @else
              <input type="hidden" name="customer_id" value="{{ $customer->id }}">
              <input type="hidden" name="product_id" value="{{ $data->id }}">
            @endif
            <button type="submit" class="btn small p-1">
              <i class="mdi mdi-heart{{ $isInWishlist ? ' text-danger' : '-outline text-dark' }}"></i>
            </button>
          </form>
        @else
          <form action="{{ route('wishlist.store') }}" class="text-dark bg-white rounded-circle p-1" method="POST">
            @csrf
            <button type="submit" id="wishlist" class="btn small p-1">
              <i class="mdi mdi-heart-outline text-dark"></i>
            </button>
          </form>
        @endauth
      </div>
      <img class="card-img-top" alt="Card image cap" src="{{ asset('storage/' . $data->image) }}" width="100%">
      <div class="p-2 d-flex flex-column justify-content-between">
        <div class="d-lg-flex d-md-flex align-items-center justify-content-between mt-1">
          <small class="card-title text-dark fw-medium">{{ $data->name }}</small>
          <small class="card-title text-dark fw-medium">
            Rp {{ number_format($data->price, 0, ',', '.') }}
          </small>
        </div>
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
