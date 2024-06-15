<div class="col-md-3 col-6 mb-2">
  <div class="d-flex align-items-center">
    <div class="avatar" onclick="window.location.href = '{{ $href }}'">
      <div class="avatar-initial bg-{{ $variant }} rounded shadow">
        <i class="mdi mdi-{{ $icon }} mdi-24px"></i>
      </div>
    </div>
    <div class="ms-3">
      <div class="small mb-1">{{ $label }}</div>
      <h5 class="mb-0">{{ $value }}</h5>
    </div>
  </div>
</div>
