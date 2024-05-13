<div class="card">
  <div class="card-datatable table-responsive">
    <table class="dt-table table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Produk</th>
          <th>Total Harga</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $data)
          <tr>
            <td class="text-primary">
              {{-- <span class="rounded p-1 bg-label-primary">#{{ rand(1000, 9999) }}</span> --}}
              <span
                class="badge rounded p-1 bg-label-primary text-uppercase">#{{ Str::substr($data->uuid, 0, 5) }}</span>
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper me-3">
                  <div class="avatar avatar-sm">
                    <img src="{{ asset('storage/' . $data->product->image) }}" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="{{ route('customer.detail.product', $data->product->slug) }}"
                    class="text-truncate text-heading">
                    <span class="fw-medium">{{ $data->product->name }}</span>
                  </a>
                  <small class="text-truncate">Rp {{ number_format($data->product->price, 0, ',', '.') }} -
                    {{ $data->quantity }} pcs</small>
                </div>
              </div>
            </td>
            <td>
              <span class="mb-0 d-flex flex-column align-items-start">
                <span class="fw-medium">Rp {{ number_format($data->total_price, 0, ',', '.') }}</span>
              </span>
            </td>
            <td>
              <h6
                class="mb-0 w-px-100 d-flex align-items-center @if ($data->status == 'unpaid') text-warning @elseif ($data->status == 'canceled') text-dark @elseif($data->status == 'paid') text-success @elseif($data->status == 'expire') text-danger @else text-dark @endif text-uppercase">
                <i class="mdi mdi-circle fs-tiny me-1"></i>
                {{ $data->status }}
              </h6>
            </td>
            <td class="">
              <span class="badge bg-label-info">{{ date('d M Y, H:i:s', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</span>
            </td>
            <td>
              <div class="d-lg-flex flex-row gap-1">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    @if (auth()->user()->customer)
                      @if ($data->status === 'unpaid' && $order->payment_method)
                        <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                      @elseif ($data->status === 'unpaid')
                        <x-dropdown-item :label="'Bayar'" :variant="'info'" :icon="'credit-card-outline'" :route="route('midtrans.checkout', $data->uuid)" />
                      @elseif ($data->status === 'paid')
                        <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                        <form action="{{ route('order.update', $data->uuid) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="dropdown-item waves-effect text-primary">
                            <i class="mdi mdi-cart-outline text-primary me-2"></i>Beli Kembali
                          </button>
                        </form>
                      @elseif($data->status === 'cancelled' || $data->status === 'expire')
                        <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                        <form action="{{ route('order.update', $data->uuid) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="dropdown-item waves-effect text-primary">
                            <i class="mdi mdi-cart-outline text-primary me-2"></i>Beli Kembali
                          </button>
                        </form>
                      @endif
                    @elseif(auth()->user()->seller)
                      <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('seller.detail.order', $data->uuid)" />
                    @elseif(auth()->user()->role_id == 1)
                      <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('admin.detail.order', $data->uuid)" />
                    @endif
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <x-pagination :pages="$orders" />
</div>
