<small class="text-danger">
  @if ($errors->has($name))
    <i class="mdi mdi-alert-circle-outline"></i>
  @endif
  {{ $errors->first($name) }}
</small>
