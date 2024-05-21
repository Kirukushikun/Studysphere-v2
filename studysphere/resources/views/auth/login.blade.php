<x-guest-layout>
    <div class="container">
        <!-- Session Status -->
        
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('login') }}" class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <x-auth-session-status class="mb-4" :status="session('status')" />   
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
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <div class="row g-3 needs-validation">
                                    <!-- Email Address -->
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('Please enter your username.')" class="mt-2" />
                                        </div>                    
                                    </div>
                                    <!-- Password -->
                                    <div class="col-12">
                                        <x-input-label for="password" :value="__('Password')"  class="form-label"/>
                                        <x-text-input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('Please enter your password!')" class="mt-2" />
                                    </div>
                                    <!-- Remember Me -->
                                    <div class="col-12">
                                        <div for="remember_me" class="form-check">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                            <span class="form-check-label">{{ __('Remember me') }}</span>
                                        </div>
                                    </div>
                                    <div class="small mb-0">
                                        <x-primary-button class="btn btn-primary w-100">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                    </div>

                                    <!-- <div class="small mb-0">
                                        <button class="btn btn-outline primary w-100" onclick="{{ route('register') }}" norequire>
                                                Register
                                        </button>                                        
                                    </div> -->
                                    
                                    @if (Route::has('password.request'))
                                        <div class="col-12">
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>                                            
                                        </div>
                                    @endif                 
                                </div>

                            </div>
                        </div>


                    </form>                        
                </div>
            </div>
        </section>
    
    </div>

</x-guest-layout>
