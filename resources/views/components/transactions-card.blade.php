<div class="col-lg-8">
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">{{ $title }}</h5>
      </div>
      <p class="mt-3">{{ $description }}</p>
    </div>
    <div class="card-body">
      <div class="row g-3">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>