<div class="{{ $class }}">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h5 class="mb-0 mb-lg-0">{{ $title }}</h5>
      </div>
    </div>
    <div class="card-body">
      <div class="chart-container">
        <canvas id="{{ $id }}" class="w-100" height="{{ $height }}"></canvas>
      </div>
    </div>
  </div>
</div>
