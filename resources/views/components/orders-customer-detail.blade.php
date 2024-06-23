<div class="col-md-12">
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="dt-table table">
        <thead>
          <tr>
            <th>ID Pesanan</th>
            <th>Produk</th>
            <th>Harga Total</th>
            <th>Tanggal Pemesanan</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="text-primary">
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
              <td class="">
                <span class="badge bg-label-info">{{ date('d M Y, H:i:s', strtotime($data->updated_at)) }}</span>
              </td>
              <td class="text-truncate">
                @if ($data->status == 'sudah bayar')
                  <span class="badge bg-label-success rounded text-uppercase">{{ $data->status }}</span>
                @elseif ($data->status == 'belum bayar')
                  <span class="badge bg-label-warning rounded text-uppercase">{{ $data->status }}</span>
                @elseif ($data->status == 'kadaluarsa')
                  <span class="badge bg-label-danger rounded text-uppercase">{{ $data->status }}</span>
                @elseif ($data->status == 'dibatalkan')
                  <span class="badge bg-label-dark rounded text-uppercase">{{ $data->status }}</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <x-pagination :pages="$datas" />
  </div>
</div>
