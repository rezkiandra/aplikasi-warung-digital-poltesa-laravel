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
              <span class="fw-medium">{{ \App\Models\Products::where('category_id', $data->id)->count() }}</span>
            </td>
            <td>
              <span class="badge rounded bg-label-info me-2">
                {{ date('d M Y, H:i', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <a class="me-2" href="{{ route('admin.edit.category', $data->slug) }}">
                  <i class="mdi mdi-pencil-outline text-secondary"></i>
                </a>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.category', $data->slug)" />
                    <form action="{{ route('admin.destroy.category', $data->slug) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <x-delete-button :label="'Delete'" />
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
