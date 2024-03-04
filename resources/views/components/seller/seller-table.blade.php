@php
  $totalProducts = \App\Models\Seller::join('products', 'sellers.id', '=', 'products.seller_id')->count();
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
                <div class="avatar-wrapper me-3">
                  <div class="avatar rounded-2 bg-label-secondary">
                    <img src="{{ asset('storage/' . $data->image) }}" class="rounded-2">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">{{ $data->full_name }}</span>
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium">{{ $data->user->email }} - {{ $data->user->name }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium">{{ $totalProducts }} pcs</span>
                  <small class="text-truncate d-none d-sm-block">
                    <span
                      class="fw-medium">Rp.{{ number_format(\App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')->where('sellers.id', $data->id)->sum('products.price'),2,',','.') }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">
                    @if ($data->gender == 'Male')
                      <i class="mdi mdi-gender-male text-info"></i>
                    @else
                      <i class="mdi mdi-gender-female text-danger"></i>
                    @endif
                    {{ $data->gender }}
                  </span>
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium text-capitalize">
                      {{ $data->address }}
                    </span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">
                    @if ($data->status == 'active')
                      <i class="mdi mdi-account-check-outline text-success mdi-20px"></i>
                    @elseif ($data->status == 'pending')
                      <i class="mdi mdi-account-search-outline text-warning mdi-20px"></i>
                    @else
                      <i class="mdi mdi-account-off-outline text-danger mdi-20px"></i>
                    @endif
                    {{ $data->status }}
                  </span>
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium">{{ $data->phone_number }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize"> {{ $data->bank_account_id }}</span>
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium">{{ $data->bank_account_id }}</span>
                  </small>
                </div>
              </div>
            </td>
            <td>
              <span
                class="fw-medium badge rounded-pill bg-label-info">{{ date('M d, H:i', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <a class="me-2" href="{{ route('admin.edit.seller', $data->slug) }}">
                  <i class="mdi mdi-pencil-outline text-secondary"></i>
                </a>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.seller', $data->slug)" />
                    <form action="{{ route('admin.destroy.seller', $data->slug) }}" method="POST">
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