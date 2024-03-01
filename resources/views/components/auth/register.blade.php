<div class="card p-2">
  <x-application-logo :route="route('home')" />

  <div class="card-body mt-2">
    <h4 class="mb-2">Welcome to Warung Digital! 🚀</h4>
    <p class="mb-4">Please sign-up to your account to use our platforms</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('signup') }}" method="POST">
      @csrf
      <x-form-floating>
				<x-input-form-label :class="'mb-3'" :label="'Username'" :name="'name'" :type="'text'" :placeholder="'Your name'" :value="old('name')" />
			</x-form-floating>
			
      <x-form-floating>
				<x-input-form-label :class="'mb-3'" :label="'Email'" :name="'email'" :type="'text'" :placeholder="'Your email'" :value="old('email')" />
			</x-form-floating>
			
      <x-form-floating>
				<x-input-form-label :class="'mb-3'" :label="'Password'" :name="'password'" :type="'password'" :placeholder="'Your password'" :value="old('password')" />
			</x-form-floating>
			
      <x-form-floating>
				<x-input-form-label :class="'mb-3'" :label="'Confirm Password'" :name="'konfirmasi'" :type="'password'" :placeholder="'Confirm password'" :value="old('konfirmasi')" />
			</x-form-floating>
			
      <x-form-check :class="'mb-3'" :label="'I aggree to our terms and conditions'" :name="'terms'" :type="'checkbox'" :value="old('terms')" />

      <div class="mb-3">
        <x-submit-button :label="'Sign Up'" :type="'submit'" :variant="'primary'" :icon="'account-plus-outline'" :class="'w-100'" />
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
