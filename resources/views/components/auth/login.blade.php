<div class="card p-2">
  <x-application-logo :route="route('guest.home')" />

  <div class="card-body mt-2">
    <div class="text-center">
      <h5 class="mb-2">Selamat Datang di Warung Digital! 👋</h4>
      <p class="mb-4">Silahkan login untuk menggunakan layanan</p>
    </div>

    <form id="formAuthentication" class="mb-3" action="{{ route('signin') }}" method="POST">
      @csrf
      <x-form-floating>
        <x-input-form-label :label="'Email'" :name="'email'" :type="'text'" :placeholder="'Email'" :value="old('email')" />
      </x-form-floating>
      
      <x-form-floating>
        <x-input-form-label :label="'Password'" :name="'password'" :type="'password'" :placeholder="'Password'"
          :value="old('password')" />
      </x-form-floating>

      <div class="mb-3">
        <x-submit-button :label="'Login'" :type="'submit'" :variant="'primary'" :icon="'login me-2'"
          :class="'w-100'" />
      </div>
    </form>

    <p class="text-center">
      <span>Belum punya akun?</span>
      <a href="{{ route('register') }}">
        <span>Register</span>
      </a>
    </p>
  </div>
</div>
