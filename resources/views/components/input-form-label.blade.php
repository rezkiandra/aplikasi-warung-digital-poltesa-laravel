<div class="form-floating form-floating-outline {{ $class }}">
  <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($value) }}" autofocus />
  <label for="{{ $name }}">{{ $label }}</label>
  <x-validation-error :name="$name" />
</div>
