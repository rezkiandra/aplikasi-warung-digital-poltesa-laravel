<div class="card p-2">
  <x-application-logo :route="route('home')" />

  <div class="card-body mt-2">
    <h4 class="mb-2">Welcome to Warung Digital! 👋</h4>
    <p class="mb-4">Please sign-in to your account and start purchase</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('signin') }}" method="POST">
      @csrf
      <x-input-form-label :class="'mb-3'" :label="'Email'" :name="'email'" :type="'text'" :placeholder="'Your email'" :value="old('email')" />
      <x-input-form-label :class="'mb-3'" :label="'Password'" :name="'password'" :type="'password'" :placeholder="'Your password'" :value="old('password')" />

      <div class="mb-3 d-flex justify-content-between">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember-me" />
          <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
        <a href="" class="float-end mb-1">
          <span>Forgot Password?</span>
        </a>
      </div>
      <div class="mb-3">
        <x-submit-button :label="'Sign In'" :type="'submit'" :variant="'primary'" :icon="'login'" :class="'w-100'" />
      </div>
    </form>

    <p class="text-center">
      <span>Don't have an account?</span>
      <a href="{{ route('register') }}">
        <span>Sign Up</span>
      </a>
    </p>
  </div>
</div>
