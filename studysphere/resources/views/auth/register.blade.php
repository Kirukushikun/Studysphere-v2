<x-guest-layout>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="col-12">
                                            <x-input-label for="name" :value="__('Your Name')" class="form-label" />
                                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            @error('name')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="email" :value="__('Your Email')" class="form-label"/>
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                            @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="password" :value="__('Password')" class="form-label"/>
                                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
                                            @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            @error('password_confirmation')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required/>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <x-primary-button class="btn btn-primary w-100">
                                                {{ __('Register') }}
                                            </x-primary-button>
                                        </div>

                                        <div class="col-12 text-center">
                                            <p class="small mb-0">Already have an account? 
                                                <a href="{{ route('login') }}">
                                                    {{ __('Log in') }}
                                                </a>
                                            </p>
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
