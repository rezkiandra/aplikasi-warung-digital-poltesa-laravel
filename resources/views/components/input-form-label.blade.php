@if ($type == 'select')
  <select class="form-select" id="{{ $name }}" name="{{ $name }}">
    <option selected disabled>{{ $select }}</option>
    @foreach ($options as $key => $value)
      <option value="{{ $key }}" {{ old($name) == $key ? old($name) : '' }}>{{ $value }}</option>
    @endforeach
  </select>
@else
  <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" />
@endif
<x-validation-error :name="$name" />
<label for="{{ $name }}">{{ $label }}</label>
