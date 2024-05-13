@php
  $totalProducts = \App\Models\Seller::join('products', 'sellers.id', '=', 'products.seller_id', 'left')->count();
@endphp

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
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">{{ $data->name }}</span>
                  <small class="text-truncate">
                    <span class="fw-medium">{{ $data->email }} - <span
                        class="badge rounded-pill bg-label-primary">{{ $data->slug }}</span></span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">
                    @if ($data->role->role_name == 'Admin')
                      <i class="mdi mdi-laptop text-danger mdi-20px me-1"></i>
                    @elseif($data->role->role_name == 'Seller')
                      <i class="mdi mdi-store-outline text-info mdi-20px me-1"></i>
                    @elseif($data->role->role_name == 'Customer')
                      <i class="mdi mdi-account-outline text-primary mdi-20px me-1"></i>
                    @endif
                    {{ $data->role->role_name }}
                  </span>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span
                    class="fw-medium badge rounded bg-label-info">{{ date('d M, H:i:s', strtotime($data->created_at)) }}
                    {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex align-items-center">
                @if ($data->role_id != 1)
                  <a class="me-2" href="{{ route('admin.edit.user', $data->uuid) }}">
                    <i class="mdi mdi-pencil-outline text-secondary"></i>
                  </a>
                @endif
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.user', $data->slug)" />
                    @if ($data->role_id != 1)
                      <form action="{{ route('admin.destroy.user', $data->uuid) }}" method="POST">
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
      <tfoot class="table-border-bottom-0">
        @foreach ($fields as $field)
          <th>{{ $field }}</th>
        @endforeach
      </tfoot>
    </table>
  </div>
</div>
