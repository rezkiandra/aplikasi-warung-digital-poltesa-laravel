<div class="card">
  <div class="card-datatable table-responsive">
    <table class="dt-table table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Date</th>
          <th>Product</th>
          <th>Total</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $data)
          <tr>
            <td class="text-primary">
              <span class="rounded p-1 bg-label-primary">#{{ rand(1000, 9999) }}</span>
            </td>
            <td class="">
              <span class="badge bg-label-info">{{ date('d M Y, H:i', strtotime($data->updated_at)) }}</span>
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper me-3">
                  <div class="avatar avatar-sm">
                    <img src="{{ asset('storage/' . $data->product->image) }}" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="pages-profile-user.html" class="text-truncate text-heading">
                    <span class="fw-medium">{{ $data->product->name }}</span>
                  </a>
                  <small class="text-truncate">Rp{{ number_format($data->product->price, 0, ',', '.') }} -
                    {{ $data->quantity }} pcs</small>
                </div>
              </div>
            </td>
            <td>
              <span class="mb-0 w-px-100 d-flex align-items-center">
                <span class="fw-medium">Rp{{ number_format($data->total_price, 0, ',', '.') }}</span>
              </span>
            </td>
            <td>
              <h6
                class="mb-0 w-px-100 d-flex align-items-center @if ($data->status == 'unpaid') text-warning @elseif ($data->status == 'canceled') text-dark @elseif($data->status == 'paid') text-success @endif text-capitalize">
                <i class="mdi mdi-circle fs-tiny me-1"></i>
                {{ $data->status }}
              </h6>
            </td>
            <td>
              <div class="d-lg-flex flex-column align-items-start justify-content-center gap-1">
                <x-submit-button :label="'Bayar'" :type="'button'" :icon="'wallet-outline'" :variant="'outline-primary btn-sm'"
                  :id="'pay-button'" />
                <form action="{{ route('order.destroy', $data->uuid) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-submit-button :label="'Hapus'" :type="'submit'" :icon="'trash-can-outline'" :variant="'outline-danger btn-sm'" />
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
