<div class="card">
  <div class="table-responsive">
    <div class="card-body">
      <x-basic-button :label="'Cetak Laporan'" :variant="'outline-primary btn-sm'" :icon="'file-download-outline me-2'" :href="route('seller.create.report')" />
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pelanggan</th>
          <th>Produk</th>
          <th>PPN 3%</th>
          <th>Total Harga</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
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
                    <img src="{{ asset('storage/' . $data->customer->image) }}" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="javascript:void(0)" class="text-truncate text-heading">
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
                  <a href="{{ route('seller.detail.product', $data->product->slug) }}"
                    class="text-truncate text-heading">
                    <span class="fw-medium">{{ $data->product->name }}</span>
                  </a>
                  <small class="text-truncate">Rp {{ number_format($data->product->price, 0, ',', '.') }} -
                    {{ $data->quantity }} {{ $data->product->unit }}</small>
                </div>
              </div>
            </td>
            <td>
              <span class="text-truncate text-dark">Rp
                {{ number_format(($data->product->price / 100) * 3, 0, ',', '.') }}</span>
            </td>
            <td>
              <span class="text-truncate text-dark">Rp {{ number_format($data->total_price, 0, ',', '.') }}</span>
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
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
