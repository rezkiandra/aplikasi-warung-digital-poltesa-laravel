<x-card-form :label="'Level Name'" :name="'level_name'" :type="'text'" :placeholder="'Input new level'" :example="'Ex: Admin, Maintenancer, Editor, etc'" />

<div class="card">
  <h5 class="card-header">List of Levels</h5>
  <div class="table-responsive text-nowrap table-hover">
    <table class="table">
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
                <i class="mdi mdi-pencil mdi-20px text-info me-3"></i>
              @elseif($data->level_name == 'Customer')
                <i class="mdi mdi-account-outline mdi-20px text-warning me-3"></i>
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
            <td><span class="badge rounded-pill bg-label-success me-2">{{ $data->created_at }}</span></td>
            <td><span class="badge rounded-pill bg-label-info me-2">{{ $data->updated_at }}</span></td>
            <td>
              {{-- <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item waves-effect" href="{{ route('admin.show.level', $data->id) }}">
                    <i class="mdi mdi-pencil-outline me-2"></i>Edit
                  </a>
                  <a class="dropdown-item waves-effect" href="javascript:void(0);">
                    <i class="mdi mdi-trash-can-outline me-2"></i>Delete
                  </a>
                </div>
              </div> --}}
              <a class="badge rounded-pill bg-label-warning me-2">Edit</a>
              <a class="badge rounded-pill bg-label-secondary me-2">Detail</a>
              <a class="badge rounded-pill bg-label-danger me-2">Delete</a>
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
