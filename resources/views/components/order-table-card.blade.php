@php
  $total_price = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->sum('total_price');
  $totalPriceAfterTax = $total_price + ($total_price / 100) * 1;
@endphp
<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">Tgl. Pemesanan</th>
            <th class="text-truncate">Produk</th>
            <th class="text-truncate">Kurir</th>
            <th class="text-truncate">Total Pesanan</th>
            <th class="text-truncate">Biaya Pengiriman</th>
            <th class="text-truncate">Status Pesanan</th>
            <th class="text-truncate">Status Pengiriman</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="text-truncate fw-medium">
                <span class="badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($data->created_at)) }}
                  {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="d-flex align-items-center cursor-pointer"
                    onclick="window.location.href='{{ route('midtrans.checkout', $data->uuid) }}'">
                    <div class="avatar-wrapper me-3">
                      <div class="avatar rounded-2 bg-label-secondary">
                        <img src="{{ asset('storage/' . $data->product->image) }}" class="rounded-2">
                      </div>
                    </div>
                    <div class="">
                      <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                        <span class="text-dark text-capitalize fw-medium">{{ $data->product->name }}</span>
                      </div>
                      <small class="text-truncate">Rp {{ number_format($data->product->price, 0, ',', '.') }} -
                        {{ $data->quantity }} {{ $data->product->unit }}</small>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <span class="text-truncate text-dark">
                  {{ $data->shipping->courier }}
                </span>
              </td>
              <td>
                <span class="text-truncate text-dark">Rp
                  {{ number_format($data->total_price + 1000 + $data->shipping->price, 0, ',', '.') }}</span>
              </td>
              <td>
                <span class="text-truncate text-dark">Rp
                  {{ number_format($data->shipping->price, 0, ',', '.') }}</span>
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
                @if ($data->shipping->status == 'diproses')
                  <span class="badge bg-label-warning rounded text-uppercase">{{ $data->shipping->status }}</span>
                @elseif ($data->shipping->status == 'dikirim')
                  <span class="badge bg-label-dark rounded text-uppercase">{{ $data->shipping->status }}</span>
                @elseif ($data->shipping->status == 'diterima')
                  <span class="badge bg-label-success rounded text-uppercase">{{ $data->shipping->status }}</span>
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
