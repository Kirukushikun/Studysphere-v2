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
                                        <p class="small">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                                    </div>

                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label" >Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                                <x-input-error :messages="$errors->get('Please enter your email.')" class="invalid-feedback" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <x-primary-button class="btn btn-primary w-100">
                                                {{ __('Reset') }}
                                            </x-primary-button>
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
