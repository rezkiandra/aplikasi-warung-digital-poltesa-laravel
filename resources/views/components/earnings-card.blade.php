<div class="{{ $class }}">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">{{ $title }}</h5>
    </div>
    <div class="card-body">
      <div class="mb-3 mt-md-0 mb-md-1">
        <div class="d-flex align-items-center">
          <h2 class="mb-0">{{ $earnings }}</h2>
          @if ($earnings)
            <span class="text-success ms-2 fw-medium">
              <i class="mdi mdi-menu-up mdi-24px"></i>
              <small>10%</small>
            </span>
          @elseif(!$earnings)
            <span class="text-danger ms-2 fw-medium">
              <i class="mdi mdi-menu-down mdi-24px"></i>
              <small>0%</small>
            </span>
          @endif
        </div>
        <small class="mt-1">{{ $description }}</small>
      </div>
    </div>
  </div>
</div>
