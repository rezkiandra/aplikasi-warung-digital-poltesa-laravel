<div class="col-md-12">
  <div class="card">
    <h5 class="card-header">{{ $title }}</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-responsive">
        <thead>
          <th>Products</th>
          <th>Description</th>
          <th>Price</th>
          <th>Stock</th>
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
                      <span class="fw-medium">{{ Str::limit($data->description, 50) }}</span>
                    </small>
                  </div>
                </div>
              </td>
              <td class="sorting_1">
                <div class="d-flex flex-column justify-content-start product-name">
                  <span class="fw-medium d-flex align-items-center">
                    <span class="d-flex justify-content-center align-items-center">
                      <i class="mdi mdi-tshirt-crew text-info me-1"></i>
                    </span>
                    {{ $data->category->name }}
                  </span>
                  @if (Auth::user()->role_id == 1)
                    <small class="fw-medium d-flex align-items-center">
                      {{ $data->seller->full_name }} - {{ $data->seller->user->email }}
                    </small>
                  @endif
                </div>
              </td>
              <td>
                <span class="fw-medium">Rp.{{ number_format($data->price, 2, ',', '.') }}</span>
              </td>
              <td>
                <span class="fw-medium">{{ $data->stock }} pcs</span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
