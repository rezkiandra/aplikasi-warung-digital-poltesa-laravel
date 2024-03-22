@php
  $user_role = Auth::user()->role_id ?? '';
  $fee = 1000;
@endphp

<div>
  <div class="position-absolute">
    <x-action-button
      @if ($user_role == 1) route('admin.products')
      @elseif ($user_role == 2)
        route('seller.products')
      @elseif ($user_role == 3)
        route('customer.products')
      @else
        route('guest.products') @endif
      :variant="'text-light'" :icon="'arrow-left-circle mdi-24px'" :class="'p-2'" />
  </div>
  <div class="d-lg-flex justify-content-between align-items-start pt-4">
    <div class="position-absolute">
      <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
    </div>
    <div class="col-lg-4">
      <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid rounded shadow hover-shadow">
    </div>

    <div class="col-lg-5 px-lg-5 mt-lg-0 mt-3">
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

      {{-- <div class="mb-3 d-flex gap-3 align-items-center justify-content-between">
        <x-submit-button :label="'Tambah Wishlist'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'heart-outline'"
          :variant="'primary'" />
        <x-submit-button :label="'Tambah Keranjang'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'cart-outline'"
          :variant="'info'" />
        <x-submit-button :label="'Beli Sekarang'" :type="'submit'" :class="'btn-sm'" :route="route('admin.edit.product', $product->slug)" :icon="'basket-outline'"
          :variant="'danger'" />
      </div> --}}

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
        <p class="text-dark mb-1 fw-medium">Deskripsi:</p>
        <span class="text-dark text-capitalize">{{ $product->description }}</span>
      </div>
    </div>

    <div class="col-lg-3 mt-lg-0 mt-3">
      <div class="border rounded p-3 mb-3">
        <h6>Atur jumlah dan catatan</h6>
        <div class="text-muted mb-3">
          <span class="">Kategori:</span>
          <span class="text-dark">{{ $product->category->name }}</span>
        </div>
        <div class="mb-3 d-flex d-lg-flex align-items-center gap-3">
          <div class="col-lg-6">
            <input type="number" class="form-control" value="1" min="1" max="{{ $product->stock }}">
          </div>
          <div class="col-4">
            <div class="text-muted mb-3">
              <span class="">Stok:</span>
              <span class="text-dark">{{ $product->stock }}</span>
            </div>
          </div>
        </div>
        <hr class="mx-n3">
        <h6>Detail Harga</h6>
        <dl class="row mb-0">
          <dt class="col-6 fw-normal text-heading">Sub Total</dt>
          <dd class="col-6 text-end">Rp{{ number_format($product->price, 0, ',', '.') }}</dd>

          <dt class="col-6 fw-normal text-heading">Biaya Penanganan</dt>
          <dd class="col-6 text-end">Rp{{ number_format($fee, 0, ',', '.') }}</dd>
        </dl>
        <hr class="mx-n3 my-2">
        <dl class="row my-3">
          <dt class="col-6 text-heading">Total</dt>
          <dd class="col-6 fw-medium text-end mb-0 text-heading">
            Rp{{ number_format($product->price + $fee, 0, ',', '.') }}
        </dl>
        <div class="d-grid gap-2">
          <button class="btn btn-outline-primary btn-next waves-effect waves-light">+ Keranjang</button>
          <button class="btn btn-primary btn-next waves-effect waves-light">Beli</button>
        </div>
      </div>
    </div>
  </div>
</div>
