<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="{{ $route }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      {{ $title }}
    </div>
  </h5>
  <div class="card-body">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
      @csrf
      {{ $slot }}
    </form>
  </div>
</div>
