<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="{{ route('admin.bank_accounts') }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      {{ $title }}
    </div>
  </h5>
  <div class="card-body">
    <form action="{{ $route }}" method="POST">
      @csrf
      @method('PUT')

      @include('components.input-form-label')
      <x-submit-button :label="'Submit'" :type="'submit'" :variant="'primary'" :icon="'check-circle-outline'" />
    </form>
  </div>
</div>
