<div
    class="position-relative radial-gradient min-vh-100 d-flex align-items-center justify-content-center overflow-hidden">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <a href="{{ route('home') }}" class="text-nowrap logo-img d-block w-100 py-3 text-center">
                            <x-application-logo :width="200" />
                        </a>
                        <p class="text-center">Sign up to use platforms</p>
                        <form action="{{ route('signup') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-input-form-label :label="__('Name')" :name="'name'" :type="'text'"
                                    :value="'name'" :placeholder="'Your name'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Email address')" :name="'email'" :type="'email'"
                                    :value="'email'" :placeholder="'Your email'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Password')" :name="'password'" :type="'password'"
                                    :value="'password'" :placeholder="'Your password'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Konfirmasi Password')" :name="'konfirmasi'" :type="'password'"
                                    :value="'password'" :placeholder="'Confirm password'" />
                            </div>

                            <div class="mb-4">
                                <x-button :type="'submit'" :variant="'bg-blue-500'">Sign Up</x-button>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 fw-bold mb-0">Already have an account?</p>
                                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
