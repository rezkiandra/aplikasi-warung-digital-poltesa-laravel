@php
  $user_role = Auth::user()->role_id ?? '';
  $fee = 1000;
@endphp

<div>
  <div class="position-absolute">
    <x-action-button
      @if ($user_role == 1) :route="route('admin.products')"
      @elseif ($user_role == 2) :route="route('seller.products')"
      @elseif ($user_role == 3) :route="route('customer.products')"
      @else :route="route('guest.products')" @endif
      :variant="'text-light'" :icon="'arrow-left-circle mdi-24px'" :class="'p-2'" />
  </div>
  <div class="d-lg-flex d-md-flex d-flex justify-content-between align-items-start pt-4">
    <div class="position-absolute">
      <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded shadow hover-shadow">
      </div>

      <div class="col-lg-5 px-lg-5 col-md-6 mt-lg-0 mt-3 mt-md-0">
        <h4 class="fw-medium">{{ $product->name }}</h4>
        <div class="d-flex d-lg-flex d-md-flex align-items-center gap-4">
          <p class="d-lg-flex d-flex align-items-center">
            <i class="mdi mdi-cart-outline me-2"></i>
            <span class="text-dark">Terjual</span>
            <span class="ms-1 text-secondary">{{ \App\Models\Order::where('product_id', $product->id)->count() }}</span>
          </p>
          <p class="d-lg-flex align-items-center gap-1">
            <i class="mdi mdi-star text-warning"></i>
            <span class="text-dark">4.5</span>
            <span class="text-secondary">(1.822 rating)</span>
          </p>
        </div>
        <h4 class="mb-3 fw-bold">
          Rp{{ number_format($product->price, 0, ',', '.') }}
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
            <span class="text-dark" id="stock">{{ $product->stock }}</span>
          </div>
          <div class="mb-3">
            <div class="d-flex">
              <button class="btn btn-outline-primary" id="btn-decrement">-</button>
              <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1"
                min="1" max="{{ $product->stock }}">
              <button class="btn btn-primary" id="btn-increment">+</button>
            </div>
          </div>
          <hr class="mx-n3">
          <h6>Detail Harga</h6>
          <dl class="row mb-0">
            <dt class="col-6 fw-normal text-heading">Sub Total</dt>
            <dd class="col-6 text-end" id="subtotal">Rp{{ number_format($product->price, 0, ',', '.') }}</dd>

            <dt class="col-6 fw-normal text-heading">Biaya Layanan</dt>
            <dd class="col-6 text-end">
              <i class="mdi mdi-truck-fast-outline me-1"></i>
              Rp{{ number_format($fee, 0, ',', '.') }}
            </dd>
          </dl>
          <hr class="mx-n3 my-2">
          <dl class="row my-3">
            <dt class="col-6 text-heading">Total</dt>
            <dd class="col-6 fw-medium text-end mb-0 text-heading" id="total">
              Rp{{ number_format($product->price + $fee, 0, ',', '.') }}
          </dl>
          <div class="d-grid gap-2">
            <form action="{{ route('cart.store') }}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="quantity" value="1">
              <x-submit-button :label="'Keranjang'" id="btn-cart" :type="'submit'" :class="'btn-outline-primary w-100'" :icon="'basket-outline me-2'"
                :variant="'primary'" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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
      const total = newQuantity * price + fee;

      $('#quantity').val(newQuantity);
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
      $('#subtotal').html('Rp' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
      $('#total').html('Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    });
  </script>
@endpush
