<div class="card">
  <h5 class="card-header">{{ $title }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover table-responsive">
      <thead>
        @foreach ($fields as $field)
          <th>{{ $field }}</th>
        @endforeach
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
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium">{{ Str::limit($data->description, 30) }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td>
              <span class="fw-medium d-flex align-items-center">
                <span
                  class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2">
                  <i class="mdi mdi-shoe-sneaker"></i>
                </span>
                {{ $data->category->name }}
              </span>
            </td>
            <td>
              <span class="fw-medium">Rp.{{ number_format($data->price, 2, ',', '.') }}</span>
            </td>
            <td>
              <span class="fw-medium">{{ $data->stock }} pcs</span>
            </td>
            <td>
              <span class="fw-medium badge rounded-pill bg-label-info">{{ date('M d, H:i', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'; }}
              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <a class="me-2" href="{{ route('admin.edit.product', $data->slug) }}">
                  <i class="mdi mdi-pencil-outline text-secondary"></i>
                </a>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.product', $data->slug)" />
                    <form action="{{ route('admin.destroy.product', $data->slug) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <x-delete-button />
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot class="table-border-bottom-0">
        @foreach ($fields as $field)
          <th>{{ $field }}</th>
        @endforeach
      </tfoot>
    </table>
  </div>
</div>
