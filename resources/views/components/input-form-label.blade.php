<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
    value="{{ old($value) }}" placeholder="{{ $placeholder }}">
