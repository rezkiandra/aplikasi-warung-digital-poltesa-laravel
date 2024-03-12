@if ($type == 'select')
  <select class="form-select" id="{{ $name }}" name="{{ $name }}">
    <option selected disabled>{{ $select }}</option>
    @foreach ($options as $key => $value)
      <option value="{{ $key }}" @if (old($name) == $key) selected @endif>{{ $value }}</option>
    @endforeach
  </select>
@elseif ($label == 'Old Password')
  <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" disabled />
@elseif ($type == 'textarea')
  <textarea type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" style="height: 200px" {{ $value }}>{{ $value }}</textarea>
@else
  <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $attributes }} />
@endif
<x-validation-error :name="$name" />
<label for="{{ $name }}">{{ $label }}</label>
