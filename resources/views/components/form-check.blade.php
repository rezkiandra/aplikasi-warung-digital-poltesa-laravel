<div class="form-check">
  <input class="form-check-input" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" />
  <label class="form-check-label {{ $class }}" for="{{ $name }}">
    {{ $label }}
		<br>
    <x-validation-error :name="$name" />
  </label>
</div>
