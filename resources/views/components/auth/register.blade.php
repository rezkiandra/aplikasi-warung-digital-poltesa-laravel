<div class="card p-2">
  <x-application-logo :route="route('guest.home')" />

  <div class="card-body mt-2">
    <div class="text-center">
      <h5 class="mb-2">Selamat Datang di Warung Digital! 👋</h4>
        <p class="mb-4">Silahkan register untuk menggunakan layanan</p>
    </div>

    <form id="formAuthentication" class="mb-3" action="{{ route('signup') }}" method="POST">
      @csrf
      <x-form-floating>
        <x-input-form-label :class="'mb-3'" :label="'Username'" :name="'name'" :type="'text'" :placeholder="'Your name'"
          :value="old('name')" />
      </x-form-floating>

      <x-form-floating>
        <x-input-form-label :class="'mb-3'" :label="'Email'" :name="'email'" :type="'text'" :placeholder="'Your email'"
          :value="old('email')" />
      </x-form-floating>

      <x-form-floating>
        <x-input-form-label :class="'mb-3'" :label="'Password'" :name="'password'" :type="'password'"
          :placeholder="'Your password'" :value="old('password')" />
      </x-form-floating>

      <x-form-floating>
        <x-input-form-label :class="'mb-3'" :label="'Konfirmasi Password'" :name="'konfirmasi'" :type="'password'"
          :placeholder="'Confirm password'" :value="old('konfirmasi')" />
      </x-form-floating>

      {{-- <x-form-check :class="'mb-3'" :label="'Saya setuju dengan syarat dan ketentuan'" :name="'terms'" :type="'checkbox'" :value="old('terms')" /> --}}

      <div class="mb-3">
        <x-submit-button :label="'Register'" :type="'submit'" :variant="'primary'" :icon="'account-plus-outline me-2'"
          :class="'w-100'" />
      </div>
    </form>

    <p class="text-center">
      <span>Sudah punya akun?</span>
      <a href="{{ route('login') }}">
        <span>Login</span>
      </a>
    </p>
  </div>
</div>
