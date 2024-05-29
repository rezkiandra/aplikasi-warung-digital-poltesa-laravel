<div class="card">
  <h5 class="card-header">{{ $title }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover table-responsive">
      <thead>
        <th>ID</th>
        <th>Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Dipublish Pada</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        @foreach ($datas as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="avatar-wrapper me-3">
                  <div class="avatar rounded-2 bg-label-secondary">
                    <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium">{{ $data->name }}</span>
                  <small class="d-flex flex-row text-truncate">
                    <span class="fw-medium">{{ Str::limit($data->description, 50) }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td>
              <span class="fw-medium badge bg-label-primary rounded text-uppercase">{{ $data->category->name }}</span>
            </td>
            <td>
              <span class="fw-medium text-dark">Rp {{ number_format($data->price, 0, ',', '.') }}</span>
            </td>
            <td>
              <span class="fw-medium text-dark">{{ $data->stock }} {{ $data->unit }}</span>
            </td>
            <td>
              <span
                class="fw-medium badge rounded bg-label-info">{{ date('d M Y, H:i:s', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                @if (Auth::user()->role_id != 1)
                  <a class="me-2" href="{{ route('seller.edit.product', $data->uuid) }}">
                    <i class="mdi mdi-pencil-outline text-secondary"></i>
                  </a>
                @endif
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('seller.detail.product', $data->slug)" />
                    @if (Auth::user()->role_id == 2)
                      <form action="{{ route('seller.destroy.product', $data->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-delete-button :label="'Delete'" />
                      </form>
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
</div>
