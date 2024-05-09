<div class="card">
  <div class="card-datatable table-responsive">
    <table class="dt-table table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pelanggan</th>
          <th>Produk</th>
          <th>Total</th>
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
                    <img src="{{ asset('storage/' . $data->customer->image) }}" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="pages-profile-user.html" class="text-truncate text-heading">
                    <span class="fw-medium">{{ $data->customer->full_name }}</span>
                  </a>
                  <small class="text-truncate">{{ $data->customer->user->email }}</small>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper me-3">
                  <div class="avatar avatar-sm">
                    <img src="{{ asset('storage/' . $data->product->image) }}" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="pages-profile-user.html" class="text-truncate text-heading">
                    <span class="fw-medium">{{ $data->product->name }}</span>
                  </a>
                  <small class="text-truncate">Rp {{ number_format($data->product->price, 0, ',', '.') }} -
                    {{ $data->quantity }} pcs</small>
                </div>
              </div>
            </td>
            <td>
              <span class="mb-0 w-px-100 d-flex align-items-center">
                <span class="fw-medium">Rp {{ number_format($data->total_price, 0, ',', '.') }}</span>
              </span>
            </td>
            <td>
              <h6
                class="mb-0 w-px-100 d-flex align-items-center @if ($data->status == 'unpaid') text-warning @elseif ($data->status == 'canceled') text-dark @elseif($data->status == 'paid') text-success @endif text-uppercase">
                <i class="mdi mdi-circle fs-tiny me-1"></i>
                {{ $data->status }}
              </h6>
            </td>
            <td class="">
              <span class="badge bg-label-info">{{ date('d M Y, H:i', strtotime($data->updated_at)) }}
                {{ $data->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</span>
            </td>
            <td>
              <div class="d-lg-flex flex-row gap-1">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    @if ($data->status == 'unpaid')
                      <x-dropdown-item :label="'Bayar'" :variant="'primary'" :icon="'wallet-outline'" :route="route('midtrans.checkout', $data->uuid)" />
                      <x-dropdown-item :label="'Batal'" :variant="'danger'" :icon="'trash-can-outline'" :route="route('midtrans.cancelled', $data->uuid)" />
                    @elseif($data->status == 'paid')
                      <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                      <x-dropdown-item :label="'Cetak'" :variant="'warning'" :icon="'file-outline'" :route="route('midtrans.detail', $data->uuid)" />
                    @elseif ($data->status == 'cancelled')
                      <x-dropdown-item :label="'Detail'" :variant="'dark'" :icon="'eye-outline'" :route="route('midtrans.detail', $data->uuid)" />
                      @if (auth()->user()->role_id === 3)
                        <form action="{{ route('order.update', $data->uuid) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="dropdown-item waves-effect text-primary">
                            <i class="mdi mdi-cart-outline text-primary me-1"></i>Beli Kembali
                          </button>
                        </form>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Pelanggan</th>
          <th>Produk</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
