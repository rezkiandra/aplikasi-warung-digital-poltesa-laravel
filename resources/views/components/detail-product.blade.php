@php
  if (Auth::check() && Auth::user()->role_id == 3) {
      $wishlistUUID = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)
          ->pluck('uuid')
          ->toArray();
  }

  if (Auth::check() && Auth::user()->role_id == 1) {
      $admin = auth()->user()->role_id == 1;
  } else {
      $admin = false;
  }

  $customer = auth()->user()->customer ?? '';
  $seller = auth()->user()->seller ?? '';
  $fee = 0;
@endphp

@auth
  @if ($customer)
    <x-alert :type="'primary'" :message="'Biodata anda sudah lengkap dan dapat memesan produk.'" :icon="'alert-circle-outline'" />
  @elseif (!$customer && !$admin && !$seller)
    <x-alert :type="'warning'" :message="'Lengkapi biodata anda terlebih dahulu di halaman dashboard.'" :icon="'alert-circle-outline'" />
  @endif
@endauth

@guest
  <x-alert :type="'warning'" :message="'Anda belum login. Silahkan login terlebih dahulu untuk menggunakan layanan!'" :icon="'alert-circle-outline'" />
@endguest

<div class="d-lg-flex d-md-flex d-flex justify-content-between align-items-start pt-1 pt-lg-3">
  <div class="position-absolute">
    @if ($product->stock != 0)
      <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
    @else
      <span class="badge bg-danger text-white d-lg-flex align-items-centers text-uppercase px-4">Out Of Stock</span>
    @endif
  </div>
  @if ($admin)
    <div class="row mb-4">
      <div class="col-lg-5 col-md-6">
        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded shadow hover-shadow">
      </div>

      <div class="col-lg-7 px-lg-3 col-md-6 mt-lg-0 mt-3 mt-md-0">
        <h4 class="fw-medium">{{ $product->name }}</h4>
        <div class="d-flex d-lg-flex d-md-flex align-items-center gap-4">
          <p class="d-lg-flex d-flex align-items-center">
            <i class="mdi mdi-cart-outline me-2"></i>
            <span class="text-dark">Terjual</span>
            <span
              class="ms-1 text-secondary">{{ \App\Models\Order::where('product_id', $product->id)->sum('quantity') }}</span>
          </p>
          <p class="d-lg-flex align-items-center gap-1">
            <i class="mdi mdi-star text-warning"></i>
            <span class="text-dark">4.5</span>
            <span class="text-secondary">(1.822 rating)</span>
          </p>
        </div>
        <h4 class="mb-3 fw-bold">
          Rp {{ number_format($product->price, 0, ',', '.') }}
        </h4>
        <hr class="bg-light">

        <div class="mb-1">
          <span class="text-secondary">Dipublish pada:</span>
          <span class="text-dark">{{ date('M d, H:i', strtotime($product->created_at)) }}
            {{ $product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
          </span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Kondisi:<span>
              <span class="text-dark">Baru</span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Minimal pemesanan:<span>
              <span class="text-dark">1 Buah</span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Penjual:<span>
              <span class="badge bg-label-primary">Terverifikasi</span>
        </div>
        <hr class="bg-light">

        <div class="pb-3">
          <p class="text-secondary mb-1">Deskripsi:</p>
          <span class="text-dark text-capitalize">{{ $product->description }}</span>
        </div>
      </div>
    </div>
  @else
    <div class="row mb-4">
      <div class="col-lg-4 col-md-6">
        <img src="{{ asset('storage/' . $product->image) }}" alt=""
          class="img-fluid rounded shadow hover-shadow">
      </div>

      <div class="col-lg-5 px-lg-3 col-md-6 mt-lg-0 mt-3 mt-md-0">
        <h4 class="fw-medium">{{ $product->name }}</h4>
        <div class="d-flex d-lg-flex d-md-flex align-items-center gap-4">
          <p class="d-lg-flex d-flex align-items-center">
            <i class="mdi mdi-cart-outline me-2"></i>
            <span class="text-dark">Terjual</span>
            <span
              class="ms-1 text-secondary">{{ \App\Models\Order::where('product_id', $product->id)->sum('quantity') }}</span>
          </p>
          <p class="d-lg-flex align-items-center gap-1">
            <i class="mdi mdi-star text-warning"></i>
            <span class="text-dark">4.5</span>
            <span class="text-secondary">(1.822 rating)</span>
          </p>
        </div>
        <h4 class="mb-3 fw-bold">
          Rp {{ number_format($product->price, 0, ',', '.') }}
        </h4>
        <hr class="bg-light">

        <div class="mb-1">
          <span class="text-secondary">Dipublish pada:</span>
          <span class="text-dark">{{ date('M d, H:i', strtotime($product->created_at)) }}
            {{ $product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
          </span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Kondisi:<span>
          <span class="text-dark">Baru</span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Minimal pemesanan:<span>
          <span class="text-dark">1 Buah</span>
        </div>
        <div class="mb-1">
          <span class="text-secondary">Penjual:<span>
          <span class="badge bg-label-primary">Terverifikasi</span>
        </div>
        <hr class="bg-light">

        <div class="pb-3">
          <p class="text-secondary mb-1">Deskripsi:</p>
          <span class="text-dark text-capitalize">{{ $product->description }}</span>
        </div>
      </div>

      <div class="col-lg-3 mt-lg-0 mt-3">
        <div class="bg-white border rounded p-3 mb-3">
          <h6>Rincian Pesanan</h6>
          <div class="text-muted mb-3">
            <span class="">Kategori:</span>
            <span class="text-dark">{{ $product->category->name }}</span>
          </div>
          <div class="text-muted mb-3">
            <span class="">Stok:</span>
            <span class="text-dark" id="stock">{{ $product->stock == 0 ? 'Habis' : $product->stock }}</span>
          </div>
          <div class="mb-3">
            <div class="d-flex">
              <button class="btn btn-outline-primary" id="btn-decrement">-</button>
              <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1"
                readonly min="1" max="{{ $product->stock }}">
              <button class="btn btn-primary" id="btn-increment">+</button>
            </div>
          </div>
          <hr class="mx-n3">
          <h6>Detail Harga</h6>
          <dl class="row mb-0">
            <dt class="col-6 fw-normal text-heading">Sub Total</dt>
            <dd class="col-6 text-end" id="subtotal">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>

            <dt class="col-6 fw-normal text-heading">Biaya Layanan</dt>
            <dd class="col-6 text-end">
              <i class="mdi mdi-truck-fast-outline me-1"></i>
              Rp {{ number_format($fee, 0, ',', '.') }}
            </dd>
          </dl>
          <hr class="mx-n3 my-2">
          <dl class="row my-3">
            <dt class="col-6 text-heading">Total</dt>
            <dd class="col-6 fw-medium text-end mb-0 text-heading" id="total">
              Rp {{ number_format($product->price + $fee, 0, ',', '.') }}
          </dl>
          <div class="d-grid gap-2">
            @if ($customer)
              @if ($customer->wishlist()->where('product_id', $product->id)->exists())
                <form action="{{ route('wishlist.destroy', $wishlistUUID) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-submit-button :label="'Hapus Wishlist'" :type="'submit'" :class="'btn-outline-danger w-100 mb-2'" :icon="'heart'"
                    :variant="'danger'" />
                </form>
              @else
                <form action="{{ route('wishlist.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  @if ($product->stock == 0)
                    <x-submit-button :label="'Wishlist'" id="btn-wishlist" :type="'submit'" :class="'btn-outline-danger w-100 mb-2 disabled'"
                      aria-disabled="true" :icon="'heart-outline me-2'" :variant="'danger'" />
                  @else
                    <x-submit-button :label="'Wishlist'" id="btn-wishlist" :type="'submit'" :class="'btn-outline-danger w-100 mb-2'"
                      :icon="'heart-outline me-2'" :variant="'danger'" />
                  @endif
                </form>
              @endif
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" id="newQuantityCart" value="1">
                @if ($product->stock == 0)
                  <x-submit-button :label="'Keranjang'" id="btn-cart" :type="'submit'" :class="'btn-outline-primary w-100 mb-2 disabled'"
                    aria-disabled="true" :icon="'cart-outline me-2'" :variant="'primary'" />
                @else
                  <x-submit-button :label="'Keranjang'" id="btn-cart" :type="'submit'" :class="'btn-outline-primary w-100 mb-2'"
                    :icon="'cart-outline me-2'" :variant="'primary'" />
                @endif
              </form>
              <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" id="newQuantityOrder" value="1">
                <input type="hidden" name="total_price" id="newTotalPriceOrder"
                  value="{{ $product->price + $fee }}">
                @if ($product->stock == 0)
                  <x-submit-button :label="'Beli'" :id="'btn-buy'" :type="'submit'" :class="'btn-primary w-100 disabled'"
                    aria-disabled="true" :icon="'basket-outline me-2'" :variant="'primary'" />
                @else
                  <x-submit-button :label="'Beli'" :id="'btn-buy'" :type="'submit'" :class="'btn-primary w-100'"
                    :icon="'basket-outline me-2'" :variant="'primary'" />
                @endif
              </form>
            @else
              <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id ?? '' }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @if ($product->stock == 0)
                  <x-submit-button :label="'Wishlist'" id="btn-wishlist" :type="'submit'" :class="'btn-outline-danger w-100 mb-2 disabled'"
                    aria-disabled="true" :icon="'heart-outline me-2'" :variant="'danger'" />
                @else
                  <x-submit-button :label="'Wishlist'" id="btn-wishlist" :type="'submit'" :class="'btn-outline-danger w-100 mb-2'"
                    :icon="'heart-outline me-2'" :variant="'danger'" />
                @endif
              </form>
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" id="newQuantityCart" value="1">
                @if ($product->stock == 0)
                  <x-submit-button :label="'Keranjang'" id="btn-cart" :type="'submit'" :class="'btn-outline-primary w-100 mb-2 disabled'"
                    aria-disabled="true" :icon="'cart-outline me-2'" :variant="'primary'" />
                @else
                  <x-submit-button :label="'Keranjang'" id="btn-cart" :type="'submit'" :class="'btn-outline-primary w-100 mb-2'"
                    :icon="'cart-outline me-2'" :variant="'primary'" />
                @endif
              </form>
              <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" id="newQuantityOrder" value="1">
                <input type="hidden" name="total_price" id="newTotalPriceOrder"
                  value="{{ $product->price + $fee }}">
                @if ($product->stock == 0)
                  <x-submit-button :label="'Beli'" :id="'btn-buy'" :type="'submit'" :class="'btn-primary w-100 disabled'"
                    aria-disabled="true" :icon="'basket-outline me-2'" :variant="'primary'" />
                @else
                  <x-submit-button :label="'Beli'" :id="'btn-buy'" :type="'submit'" :class="'btn-primary w-100'"
                    :icon="'basket-outline me-2'" :variant="'primary'" />
                @endif
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endif
</div>


@push('scripts')
  <script>
    const stock = {{ $product->stock }}
    const price = {{ $product->price }}
    const fee = {{ $fee }}

    // mengatur quantity
    $('#quantity').val(1);

    // min dan max quantity
    $('#quantity').attr('min', 1);
    $('#quantity').attr('max', {{ $product->stock }});

    // jika mengklik tombol decrement maka quantity akan berkurang dan total akan berkurang
    $(document).on('click', '#btn-decrement', function() {
      const quantity = $('#quantity').val();
      if (quantity <= 1) {
        return;
      }

      const newQuantity = parseInt(quantity) - 1;
      const subTotal = newQuantity * price;
      const total = newQuantity * price + fee ?? price + fee;

      $('#quantity').val(newQuantity);
      $('#newQuantityCart').val(newQuantity);
      $('#newQuantityOrder').val(newQuantity);
      $('#newTotalPriceOrder').val(total);
      $('#subtotal').html('Rp' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
      $('#total').html('Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    });

    // jika mengklik tombol increment maka quantity akan bertambah dan total akan bertambah
    $(document).on('click', '#btn-increment', function() {
      const quantity = $('#quantity').val();
      if (quantity >= stock) {
        return;
      }

      const newQuantity = parseInt(quantity) + 1;
      const subTotal = newQuantity * price;
      const total = newQuantity * price + fee;

      $('#quantity').val(newQuantity);
      $('#newQuantityCart').val(newQuantity);
      $('#newQuantityOrder').val(newQuantity);
      $('#newTotalPriceOrder').val(total);
      $('#subtotal').html('Rp' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
      $('#total').html('Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    });
  </script>
@endpush
