<div class="card p-2">
  <x-application-logo :route="route('home')" />

  <div class="card-body mt-2">
    <h4 class="mb-2">Welcome to Warung Digital! 🚀</h4>
    <p class="mb-4">Please sign-up to your account to use our platforms</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('signup') }}" method="POST">
      @csrf
      <x-input-form-label :class="'mb-3'" :label="'Username'" :name="'name'" :type="'text'" :placeholder="'Your name'" :value="'name'" />
      <x-input-form-label :class="'mb-3'" :label="'Email'" :name="'email'" :type="'text'" :placeholder="'Your email'" :value="'email'" />
      <x-input-form-label :class="'mb-3'" :label="'Password'" :name="'password'" :type="'password'" :placeholder="'Your password'" :value="'password'" />
      <x-input-form-label :class="'mb-3'" :label="'Confirm Password'" :name="'konfirmasi'" :type="'password'" :placeholder="'Confirm password'" :value="'konfirmasi'" />
      <x-form-check :class="'mb-3'" :label="'I aggree to our terms and conditions'" :name="'terms'" :type="'checkbox'" :value="'terms'" />

      <div class="mb-3">
        <x-submit-button :label="'Sign Up'" :type="'submit'" :variant="'primary'" />
      </div>
    </form>

    <p class="text-center">
      <span>Have an account?</span>
      <a href="{{ route('login') }}">
        <span>Sign In</span>
      </a>
    </p>
  </div>
</div>
<img src="{{ asset('materio/assets/img/illustrations/tree-3.png') }}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block" />
<img src="{{ asset('materio/assets/img/illustrations/auth-basic-mask-light.png') }}" class="authentication-image d-none d-lg-block" alt="triangle-bg" data-app-light-img="illustrations/auth-basic-mask-light.png" data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
<img src="{{ asset('materio/assets/img/illustrations/tree.png') }}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block" />
</div>
