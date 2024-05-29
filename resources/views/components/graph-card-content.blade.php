<div class="col-6 col-md-6 col-lg-6">
  <div class="card h-100">
    <div class="card-header d-flex align-items-center justify-content-between">
      <div class="avatar">
        <div class="avatar-initial bg-{{ $variant }} rounded-circle shadow-sm">
          <i class="mdi mdi-{{ $icon }} mdi-24px"></i>
        </div>
      </div>
    </div>
    <div class="card-body">
      <h6 class="mb-2">{{ $label }}</h6>
      <div class="d-flex flex-wrap align-items-center">
        <h4 class="mb-0 me-2">{{ $value }}</h4>
        <small class="text-dark mt-1">item</small>
      </div>
    </div>
  </div>
</div>
