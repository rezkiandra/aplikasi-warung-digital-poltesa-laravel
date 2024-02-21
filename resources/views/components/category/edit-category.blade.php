<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="{{ route('admin.product_category') }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      {{ $title }}
    </div>
  </h5>
  <div class="card-body">
    <form action="{{ $route }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-floating form-floating-outline {{ $class }}">
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }} autofocus"
          placeholder="{{ $placeholder }}" value="{{ $value }}" />
        <label for="{{ $name }}">{{ $label }}</label>
        <x-validation-error :name="$name" />
      </div>

      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </form>
  </div>
</div>
