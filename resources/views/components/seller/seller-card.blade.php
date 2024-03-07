<div class="col-sm-6 col-xl-3">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div class="me-1">
          <p class="text-heading mb-2">{{ $label }}</p>
          <div class="d-flex align-items-center">
            <h4 class="mb-2 me-2 display-6">{{ $count }}</h4>
            <p class="text-{{ $growth > 0 ? 'success' : 'danger' }} mb-2">{{ $growth }}</p>
          </div>
          <p class="mb-0">{{ $description }}</p>
        </div>
        <div class="avatar">
          <div class="avatar-initial bg-label-{{ $variant }} rounded">
            <i class="mdi mdi-{{ $icon }} mdi-24px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
