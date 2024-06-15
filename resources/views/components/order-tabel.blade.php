<div class="card">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th class="text-truncate">Tgl. Pemesanan</th>
          <th class="text-truncate">Produk</th>
          <th class="text-truncate">Pengiriman</th>
          <th class="text-truncate">Total Pesanan</th>
          <th class="text-truncate">Status Pesanan</th>
          <th class="text-truncate">Status Pengiriman</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $data)
          <tr>
            <td class="">
              <span class="badge bg-label-info">{{ date('d M Y, H:i:s', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</span>
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
                    {{ $data->quantity }} {{ $data->product->unit }}</small>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                @if ($data->shipping)
                  <div class="d-flex flex-column">
                    <span class="fw-medium text-heading">{{ $data->shipping->courier }}</span>
                    <small class="text-truncate">Rp {{ number_format($data->shipping->price, 0, ',', '.') }}
                      ({{ $data->shipping->etd }} hari)</small>
                  </div>
                @else
                  <span class="badge bg-label-danger rounded text-uppercase">Belum memilih kurir</span>
                @endif
              </div>
            </td>
            <td>
              @if ($data->shipping)
                <span class="text-truncate text-dark">Rp
                  {{ number_format($data->total_price + 1000 + $data->shipping->price, 0, ',', '.') }}
                </span>
              @else
                <span class="text-truncate text-dark">Rp
                  {{ number_format($data->total_price, 0, ',', '.') }}
                </span>
              @endif
            </td>
            <td class="text-truncate">
              @if ($data->status == 'paid')
                <span class="badge bg-label-success rounded text-uppercase">{{ $data->status }}</span>
              @elseif ($data->status == 'unpaid')
                <span class="badge bg-label-warning rounded text-uppercase">{{ $data->status }}</span>
              @elseif ($data->status == 'expire')
                <span class="badge bg-label-danger rounded text-uppercase">{{ $data->status }}</span>
              @elseif ($data->status == 'cancelled')
                <span class="badge bg-label-dark rounded text-uppercase">{{ $data->status }}</span>
              @endif
            </td>
            <td class="text-truncate">
              @if ($data->shipping)
                @if ($data->shipping->status == 'diproses')
                  <span class="badge bg-label-warning rounded text-uppercase">{{ $data->shipping->status }}</span>
                @elseif ($data->shipping->status == 'dikirim')
                  <span class="badge bg-label-dark rounded text-uppercase">{{ $data->shipping->status }}</span>
                @elseif ($data->shipping->status == 'diterima')
                  <span class="badge bg-label-success rounded text-uppercase">{{ $data->shipping->status }}</span>
                @endif
              @else
                <span class="badge bg-label-danger rounded text-uppercase">Belum memilih kurir</span>
              @endif
            </td>
            <td>
              <div class="d-lg-flex flex-row gap-1">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    @if (auth()->user()->customer)
                      @if ($data->status === 'unpaid' && $data->payment_method)
                        <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                      @elseif ($data->status === 'unpaid' && !$data->shipping)
                        <x-dropdown-item :label="'Pilih Kurir'" :variant="'info'" :icon="'truck-fast-outline'" :route="route('rajaongkir.ongkir', $data->uuid)" />
                        <x-dropdown-item :label="'Batal'" :variant="'danger'" :icon="'trash-can-outline'" :route="route('midtrans.cancelled', $data->uuid)" />
                      @elseif ($data->status === 'unpaid')
                        <x-dropdown-item :label="'Bayar'" :variant="'success'" :icon="'credit-card-outline'" :route="route('midtrans.checkout', $data->uuid)" />
                        <x-dropdown-item :label="'Batal'" :variant="'danger'" :icon="'trash-can-outline'" :route="route('midtrans.cancelled', $data->uuid)" />
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
                      @if ($data->shipping->status !== 'diterima')
                        <x-dropdown-item :label="'Edit'" :variant="'info'" :icon="'pencil-outline'" :route="route('rajaongkir.editShipping', $data->shipping->uuid)" />
                      @endif
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
