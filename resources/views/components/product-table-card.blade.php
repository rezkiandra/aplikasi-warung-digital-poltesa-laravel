<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">ID Produk</th>
            <th class="text-truncate">Produk</th>
            <th class="text-truncate">Harga / Stok</th>
            <th class="text-truncate">Kategori</th>
            <th class="text-truncate">Dipublish Pada</th>
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
                  <div class="avatar-wrapper me-3">
                    <div class="avatar rounded-2 bg-label-secondary">
                      <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
                    </div>
                  </div>
                  <div class="">
                    <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                      <span class="text-dark text-capitalize fw-medium">{{ $data->name }}</span>
                    </div>
                    <small class="text-truncate badge bg-label-info rounded">{{ $data->slug }}</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-1 text-truncate">Rp{{ number_format($data->price, 0, ',', '.') }}</h6>
                    <small class="text-truncate badge bg-label-info rounded">tersisa {{ $data->stock }} pcs</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{ $data->category->name }}</td>
              <td class="text-truncate fw-medium">{{ date('M d, H:i', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </td>
            </tr>
          @endforeach
        </tbody>
        {{-- <tfoot class="table-light">
          <tr>
            <th class="text-truncate">ID Produk</th>
            <th class="text-truncate">Produk</th>
            <th class="text-truncate">Harga / Stok</th>
            <th class="text-truncate">Kategori</th>
            <th class="text-truncate">Dipublish Pada</th>
          </tr>
        </tfoot> --}}
      </table>
    </div>
  </div>
</div>
