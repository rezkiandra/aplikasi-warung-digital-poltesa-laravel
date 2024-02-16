<div class="card mb-4">
  <h5 class="card-header">Edit Form</h5>
  <div class="card-body">
    <div>
      <form action="{{ route('admin.store.level') }}" method="POST">
        @csrf
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" placeholder="{{ $placeholder }}">
        <div id="{{ $name }}" class="form-text">
          @error($name)
            <span class="text-danger">{{ $errors->first($name) }}</span>
          @else
            {{ $example }}
          @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light mt-4">
      <span class="tf-icons mdi mdi-checkbox-marked-circle-outline me-1"></span>Submit
    </button>
    </form>
  </div>
</div>
