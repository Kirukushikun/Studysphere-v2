<x-guest-layout>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('register') }}" class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        @csrf
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Laravel Project</span>
                            </a>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>    

                                <div class="row g-3 needs-validation">
                                    <!-- Name -->
                                    <div class="col-12">
                                        <x-input-label for="name" :value="__('Name')" class="form-label"/>
                                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('Please, enter your name!')" class="invalid-feedback" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-12">
                                        <x-input-label for="email" :value="__('Email')" class="form-label"/>
                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('Please enter a valid Email adddress!')" class="mt-2" class="invalid-feedback"/>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-12">
                                        <x-input-label for="password" :value="__('Password')" class="form-label"/>

                                        <x-text-input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('Please enter your password!')" class="invalid-feedback" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-12">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"/>

                                        <x-text-input id="password_confirmation" class="form-control"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('Password not match!')" class="invalid-feedback" />
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <x-primary-button class="btn btn-primary w-100">
                                            {{ __('Register') }}
                                        </x-primary-button>    
                                    </div>

                                    <div class="col-12">
                                        <a class="small mb-0" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </form>                       
                </div>
            </div>
        </section>

     
    </div>

</x-guest-layout>
