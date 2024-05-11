<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">ID Pesanan</th>
            <th class="text-truncate">Produk</th>
            <th class="text-truncate">Quantity</th>
            <th class="text-truncate">Harga Total</th>
            <th class="text-truncate">Tanggal Pemesanan</th>
            <th class="text-truncate">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="text-truncate">
                <span class="badge bg-label-primary text-uppercase">#{{ Str::substr($data->uuid, 0, 4) }}</span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <div class="avatar-wrapper me-3">
                      <div class="avatar rounded-2 bg-label-secondary">
                        <img src="{{ asset('storage/' . $data->product->image) }}" class="rounded-2">
                      </div>
                    </div>
                    <div class="">
                      <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                        <span class="text-dark text-capitalize fw-medium">{{ $data->product->name }}</span>
                      </div>
                      <small class="text-truncate">{{ Str::limit($data->product->description, 50) }}</small>
                    </div>
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{ $data->quantity }} pcs</td>
              <td class="text-truncate">Rp {{ number_format($data->total_price, 0, ',', '.') }}</td>
              <td class="text-truncate fw-medium">
                <span class="badge bg-label-info rounded">{{ date('M d, H:i', strtotime($data->created_at)) }}
                  {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </td>
              <td class="text-truncate">
                @if ($data->status == 'paid')
                  <span class="badge bg-label-success rounded text-uppercase">{{ $data->status }}</span>
                @elseif ($data->status == 'unpaid')
                  <span class="badge bg-label-danger rounded text-uppercase">{{ $data->status }}</span>
                @elseif ($data->status == 'cancelled')
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
