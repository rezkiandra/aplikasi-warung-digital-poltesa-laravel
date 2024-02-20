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
              @if ($data->level_name == 'Admin')
                <i class="mdi mdi-laptop mdi-20px text-danger me-3"></i>
              @elseif($data->level_name == 'Seller')
                <i class="mdi mdi-store-outline mdi-20px text-info me-3"></i>
              @elseif($data->level_name == 'Customer')
                <i class="mdi mdi-account-outline mdi-20px text-warning me-3"></i>
              @elseif($data->level_name == 'Super Admin')
                <i class="mdi mdi-shield-crown-outline mdi-20px text-primary me-3"></i>
              @elseif($data->level_name == 'Maintainer')
                <i class="mdi mdi-bug-check-outline mdi-20px text-success me-3"></i>
              @elseif($data->level_name == 'Developer')
                <i class="mdi mdi-code-block-tags mdi-20px text-dark me-3"></i>
              @else
                <i class="mdi mdi-chart-donut mdi-20px text-secondary me-3"></i>
              @endif
              <span class="fw-medium">{{ $data->level_name }}</span>
            </td>
            {{-- <td>
						<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
							<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
								class="avatar avatar-xs pull-up" aria-label="Lilian Fuller" data-bs-original-title="Lilian Fuller">
								<img src="{{ asset('materio/assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle">
							</li>
							<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
								class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson"
								data-bs-original-title="Sophia Wilkerson">
								<img src="{{ asset('materio/assets/img/avatars/6.png') }}" alt="Avatar" class="rounded-circle">
							</li>
							<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
								class="avatar avatar-xs pull-up" aria-label="Christina Parker"
								data-bs-original-title="Christina Parker">
								<img src="{{ asset('materio/assets/img/avatars/7.png') }}" alt="Avatar" class="rounded-circle">
							</li>
						</ul>
					</td> --}}
            <td><span
                class="badge rounded-pill bg-label-success me-2">{{ date('d F Y, H:i:s', strtotime($data->created_at)) }}</span>
            </td>
            <td><span
                class="badge rounded-pill bg-label-info me-2">{{ date('d F Y, H:i:s', strtotime($data->updated_at)) }}</span>
            </td>
            <td>
              {{-- <x-action-button :icon="'pencil-outline'" :route="route('admin.edit.level', $data->slug)" :variant="'warning'" />
              <x-action-button :icon="'eye-outline'" :route="route('admin.detail.level', $data->slug)" :variant="'secondary'" />
              <x-delete-button /> --}}
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <x-dropdown-item :label="'Edit'" :variant="'warning'" :icon="'pencil-outline'" :route="route('admin.edit.level', $data->slug)" />
                  <x-dropdown-item :label="'Detail'" :variant="'secondary'" :icon="'eye-outline'" :route="route('admin.detail.level', $data->slug)" />
                  <form action="{{ route('admin.destroy.level', $data->slug) }}" method="POST">
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
