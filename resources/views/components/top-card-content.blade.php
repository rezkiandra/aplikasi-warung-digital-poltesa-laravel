<div class="col-xl-4 col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">{{ $title }}</h5>
    </div>
    <div class="card-body">
      @foreach ($datas as $data)
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div class="d-flex align-items-center">
            <div class="avatar me-3">
              <div class="avatar-initial bg-label-success rounded-circle">
                <img src="{{ asset('storage/sellers/' . $data->image) }}" alt="">
              </div>
            </div>
            <div>
              <div class="d-flex align-items-center gap-1">
                <h6 class="mb-0">{{ $data->value }}</h6>
                <i class="mdi mdi-chevron-up mdi-24px text-success"></i>
                <small class="text-success">{{ $data->percentage }}</small>
              </div>
              <small>{{ $data->user }}</small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0">894k</h6>
            <small>Sales</small>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
