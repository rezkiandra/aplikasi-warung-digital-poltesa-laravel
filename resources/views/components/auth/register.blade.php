<div
    class="position-relative radial-gradient min-vh-100 d-flex align-items-center justify-content-center overflow-hidden">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="{{ route('home') }}" class="text-nowrap logo-img d-block w-100 py-3 text-center">
                            <x-application-logo :width="200" />
                        </a>
                        <p class="text-center">Sign up to use platforms</p>
                        <form>
                            <div class="mb-3">
                                <x-input-form-label :label="__('Name')" :name="'name'" :type="'text'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Email address')" :name="'email'" :type="'email'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Password')" :name="'password'" :type="'password'" />
                            </div>

                            <div class="mb-3">
                                <x-input-form-label :label="__('Konfirmasi Password')" :name="'konfirmasi'" :type="'konfirmasi'" />
                            </div>

                            <div class="mb-4">
                                <x-button :type="'button'" :variant="'bg-blue-500'">Sign Up</x-button>
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
