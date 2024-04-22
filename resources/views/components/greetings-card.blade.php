<div class="col-md-12 col-lg-4">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-1">{{ $greetings }} 🎉</h4>
      <p class="pb-0">{{ $description }}</p>
      <h4 class="text-primary mb-1">{{ $value }}</h4>
      <p class="mb-2 pb-1">{{ $label }}</p>
      <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">{{ $actionLabel }}</a>
    </div>
    <img src="{{ asset('materio/assets/img/icons/misc/triangle-light.png') }}"
      class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background"
      data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
    <img src="{{ asset('materio/assets/img/illustrations/trophy.png') }}"
      class="scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-4 pb-2" width="83" alt="view sales">
  </div>
</div>
