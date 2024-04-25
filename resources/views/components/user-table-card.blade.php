<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">ID</th>
            <th class="text-truncate">User</th>
            <th class="text-truncate">Email</th>
            <th class="text-truncate">Role</th>
            <th class="text-truncate">Dibuat Pada</th>
            <th class="text-truncate">Email Verifikasi</th>
            <th class="text-truncate">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datas as $data)
            <tr>
              <td class="text-truncate">
                <span class="badge bg-label-primary">#{{ $data->id }}</span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  {{-- <div class="avatar avatar-sm me-3">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="Avatar" class="rounded-circle">
                  </div> --}}
                  <div>
                    <h6 class="mb-1 text-truncate">{{ $data->name }}</h6>
                    <small class="text-truncate badge bg-label-info rounded">{{ $data->slug }}</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{ $data->email }}</td>
              <td class="text-truncate">
                <i class="mdi mdi-laptop mdi-24px text-danger me-1"></i>
                <span>{{ $data->role->role_name }}</span>
              </td>
              <td class="text-truncate fw-medium">{{ date('M d, H:i', strtotime($data->created_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</td>
              <td class="text-truncate">{{ date('M d, H:i', strtotime($data->email_verified_at)) }}
                {{ $data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}</td>
              <td>
                @if ($data->role_id == 1)
                  @if ($data->seller && $data->seller->status == 'active')
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @elseif($data->seller && $data->seller->status == 'pending')
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @elseif($data->seller && $data->seller->status == 'inactive')
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @endif
                @elseif ($data->role_id == 2)
                  @if ($data->seller && $data->seller->status == 'active')
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @elseif($data->seller && $data->seller->status == 'pending')
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @elseif($data->seller && $data->seller->status == 'inactive')
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      {{ $data->seller->status }}
                    </span>
                  @endif
                @elseif ($data->role_id == 3)
                  @if ($data->customer && $data->customer->status == 'active')
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      {{ $data->customer->status }}
                    </span>
                  @elseif($data->customer && $data->customer->status == 'pending')
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      {{ $data->customer->status }}
                    </span>
                  @elseif($data->customer && $data->customer->status == 'inactive')
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      {{ $data->customer->status }}
                    </span>
                  @endif
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
