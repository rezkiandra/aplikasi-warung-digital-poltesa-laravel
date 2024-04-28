<div class="card-body">
  <div class="customer-avatar-section">
    <div class="d-flex align-items-center flex-column">
      <img class="img-fluid rounded mb-3 mt-4" src="{{ $image }}" height="120" width="120" alt="User avatar">
      <div class="customer-info text-center mb-4">
        <h5 class="mb-1">{{ $username }}</h5>
        <span>{{ $id }}</span>
      </div>
    </div>
  </div>
  <div class="info-container">
    <h5 class="border-bottom text-uppercase pb-3">DETAILS</h5>
    <ul class="list-unstyled mb-4">
      <li class="mb-2">
        <span class="h6 me-1">Email:</span>
        <span>{{ $email }}</span>
      </li>
      <li class="mb-2">
        <span class="h6 me-1">Role:</span>
        <span
          class="badge text-uppercase @if ($role == 'Admin') bg-label-danger @elseif($role == 'Seller') bg-label-info @elseif($role == 'Customer') bg-label-primary @endif rounded">{{ $role }}</span>
      </li>
    </ul>
    <div class="d-flex justify-content-center">
      @include('components.basic-button')
    </div>
  </div>
</div>
