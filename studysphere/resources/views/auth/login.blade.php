<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4"
            >
                <div class="container">
                    <div class="row justify-content-center">
                        <div
                            class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"
                        >
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">
                                            Login to Your Account
                                        </h5>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label" >Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                <x-input-error :messages="$errors->get('Please enter your email.')" class="invalid-feedback" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="password" :value="__('Password')" class="form-label"/>
                                            <x-text-input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password"
                                            />
                                            <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    name="remember"
                                                    value="true"
                                                    id="rememberMe"
                                                />
                                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                <span class="form-check-label">{{ __('Remember me') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <x-primary-button class="btn btn-primary w-100">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>
                                        <div class="col text-center d-flex justify-content-center flex-column">
                                            <p class="small mb-0">
                                                Don't have account?
                                                <a href="{{ route('register') }}">Create an account</a>
                                            </p>

                                            @if (Route::has('password.request'))
                                                <a class="small mb-0" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>   
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-guest-layout>
