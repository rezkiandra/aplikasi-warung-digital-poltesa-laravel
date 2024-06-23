<div class="col-md-12 mb-4 mb-lg-0">
  <div class="card">
    <h5 class="card-header">{{ $title }}</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-responsive">
        <thead>
          <th>Produk</th>
          <th>Kategori / Penjual</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Terjual</th>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="sorting_1">
                <div class="d-flex justify-content-start align-items-center product-name">
                  <div class="avatar-wrapper me-3">
                    <div class="avatar rounded-2 bg-label-secondary">
                      <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    <span class="text-nowrap text-heading fw-medium">{{ $data->name }}</span>
                    <small class="d-flex flex-row text-truncate d-none d-sm-block d-flex">
                      <span class="fw-medium">{{ Str::limit($data->description, 30) }}</span>
                    </small>
                  </div>
                </div>
              </td>
              <td class="sorting_1">
                <div class="d-flex flex-column justify-content-start product-name">
                  <span class="fw-medium d-flex align-items-center">
                    <span class="d-flex justify-content-center align-items-center text-dark">
                      {{ $data->category->name }}
                    </span>
                  </span>
                  @if (Auth::user()->role_id == 1)
                    <small class="fw-medium d-flex align-items-center">
                      {{ $data->seller->full_name }} - {{ $data->seller->user->email }}
                    </small>
                  @endif
                </div>
              </td>
              <td>
                <span class="fw-medium">Rp {{ number_format($data->price, 0, ',', '.') }}</span>
              </td>
              <td>
                <span class="fw-medium">{{ $data->stock }} pcs</span>
              </td>
              <td>
                @if (App\Models\Order::where('product_id', $data->id)->sum('quantity') > 0)
                  <span
                    class="text-truncate text-dark">{{ \App\Models\Order::where('product_id', $data->id)->sum('quantity') }}
                    {{ $data->unit }}
                  </span>
                @else
                  <span class="text-truncate text-dark">-</span>
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
