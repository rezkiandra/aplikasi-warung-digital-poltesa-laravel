<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">UUID</th>
            <th class="text-truncate">User</th>
            <th class="text-truncate">Email</th>
            <th class="text-truncate">Role</th>
            <th class="text-truncate">Dibuat Pada</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="text-truncate">
                @if ($data->role_id == 1)
                  <span class="badge bg-label-danger text-uppercase">#{{ Str::substr($data->uuid, 0, 4) }}</span>
                @elseif ($data->role_id == 2)
                  <span class="badge bg-label-info text-uppercase">#{{ Str::substr($data->uuid, 0, 4) }}</span>
                @elseif ($data->role_id == 3)
                  <span class="badge bg-label-primary text-uppercase">#{{ Str::substr($data->uuid, 0, 4) }}</span>
                @endif
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    @if ($data->seller)
                      <img src="{{ asset('storage/' . $data->seller->image) }}" alt="Avatar" class="rounded">
                    @elseif ($data->customer)
                      <img src="{{ asset('storage/' . $data->customer->image) }}" alt="Avatar" class="rounded">
                    @elseif($data->role_id == 1)
                      <img src="{{ asset('materio/assets/img/favicon/favicon.ico') }}" alt="Avatar" class="rounded">
                    @else
                      <img src="{{ asset('materio/assets/img/avatars/unknown.png') }}" alt="Avatar" class="rounded">
                    @endif
                  </div>
                  <h6 class="mb-1 text-truncate">{{ $data->name }}</h6>
                </div>
              </td>
              <td class="text-truncate text-dark">{{ $data->email }}</td>
              <td class="text-truncate">
                @if ($data->role_id == 1)
                  <span class="badge bg-label-danger text-uppercase">{{ $data->role->role_name }}</span>
                @elseif ($data->role_id == 2)
                  <span class="badge bg-label-info text-uppercase">{{ $data->role->role_name }}</span>
                @elseif ($data->role_id == 3)
                  <span class="badge bg-label-primary text-uppercase">{{ $data->role->role_name }}</span>
                @endif
              </td>
              <td class="text-truncate fw-medium">
                <span class="badge bg-label-info rounded">{{ date('d M, H:i:s', strtotime($data->created_at)) }}
                  {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
