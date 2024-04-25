<div class="col-md-4 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="card-icon mb-3">
        <div class="avatar">
          <div class="avatar-initial rounded bg-label-{{ $variant }}">
            <i class="mdi mdi-{{ $icon }} mdi-24px"></i>
          </div>
        </div>
      </div>
      <div class="card-info">
        <h4 class="card-title mb-3">{{ $title }}</h4>
        <div class="d-flex align-items-end mb-1 gap-1">
          <h4 class="text-{{ $variant }} mb-0">{{ $count }}</h4>
          <p class="mb-0">{{ $countDescription }}</p>
        </div>
        <p class="mb-0 text-truncate">{{ $description }}</p>
      </div>
    </div>
  </div>
</div>
