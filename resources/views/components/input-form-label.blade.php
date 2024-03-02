@if ($type == 'select')
  <select class="form-select" id="{{ $name }}" name="{{ $name }}">
    <option selected disabled>{{ $select }}</option>
    @foreach ($options as $key => $value)  
      {{-- get category when edit data --}}
      @if ($key == $value)
        @php
          $value = $category->id;
        @endphp
      @endif

      <option value="{{ $key }}" @if (old($name) == $key) selected @endif>{{ $value }}</option>
    @endforeach
  </select>
@else
  <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" />
@endif
<x-validation-error :name="$name" />
<label for="{{ $name }}">{{ $label }}</label>
