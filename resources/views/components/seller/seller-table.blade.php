<div class="card">
  <h5 class="card-header">{{ $title }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        @foreach ($fields as $field)
          <th>{{ $field }}</th>
        @endforeach
      </thead>
      <tbody>
        @foreach ($datas as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <span class="fw-medium">{{ $data->name }}</span>
            </td>
            <td>
              <span class="fw-medium">{{ \App\Models\ProductCategory::where('id', $data->parent_id)->count() }}</span>
            </td>
            <td>
              <span class="fw-medium">{{ \App\Models\Order::where('id', $data->parent_id)->count() }}</span>
            </td>
            <td><span
                class="badge rounded-pill bg-label-success me-2">{{ date('d F Y, H:i:s', strtotime($data->created_at)) }}
              </span>
            </td>
            <td>
              <span
                class="badge rounded-pill bg-label-info me-2">{{ date('d F Y, H:i:s', strtotime($data->updated_at)) }}
              </span>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <x-dropdown-item :label="'Edit'" :variant="'warning'" :icon="'pencil-outline'" :route="route('admin.edit.seller', $data->slug)" />
                  <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.seller', $data->slug)" />
                  <form action="{{ route('admin.destroy.seller', $data->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-delete-button />
                  </form>
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
