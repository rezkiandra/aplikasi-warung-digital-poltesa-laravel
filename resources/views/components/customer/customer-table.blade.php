<div class="card">
  <h5 class="card-header">{{ $title }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        @foreach ($fields as $field)
          <th>{{ $field }}</th>
        @endforeach
        <th>Actions</th>
      </thead>
      <tbody>
        @foreach ($datas as $data)
          <tr>
            @foreach ($fields as $field)
              <td class="fw-medium">{{ $data->$field }}</td>
            @endforeach
            <td>
              <x-dropdown-table>
                {{-- @include('components.dropdown-item') --}}
                {{-- <form action="{{ route('admin.destroy.seller', $data->slug) }}" method="POST">
									@csrf
									@method('DELETE')
									<x-delete-button />
								</form> --}}
              </x-dropdown-table>
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
