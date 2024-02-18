<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="{{ route('admin.levels') }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      {{ $title }}
    </div>
  </h5>
  <div class="card-body">
    <form action="{{ route('admin.store.level') }}" method="POST">
      @csrf
      <div class="form-floating form-floating-outline {{ $class }}">
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
          placeholder="{{ $placeholder }}" value="{{ $datas }}" />
        <label for="{{ $name }}">{{ $label }}</label>
        <x-validation-error :name="$name" />
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </form>
  </div>
</div>
