<div class="col-xl-4 col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">{{ $title }}</h5>
    </div>
    <div class="card-body">
      <div class="mb-3 mt-md-0 mb-md-1">
        <div class="d-flex align-items-center">
          <h2 class="mb-0">{{ $earnings }}</h2>
          <span class="text-success ms-2 fw-medium">
            @if ($earnings)
              <i class="mdi mdi-menu-up mdi-24px"></i>
              <small>10%</small>
            @else
              <i class="mdi mdi-menu-down mdi-24px"></i>
              <small>0%</small>
            @endif
          </span>
        </div>
        <small class="mt-1">{{ $description }}</small>
      </div>
    </div>
  </div>
</div>
