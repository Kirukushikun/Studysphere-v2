<section>
    <div class="tab-pane fade profile-edit" id="profile-edit">
        <h5 class="card-title">Update Password</h5>
        <p class="small fst-italic">{{ __("Ensure your account is using a long, random password to stay secure.") }}</p>
        
        <form class="row g-3 needs-validation" method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="col-12">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" class="form-label" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="invalid-feedback" />
            </div>

            <div class="col-12">
                <x-input-label for="update_password_password" :value="__('New Password')" class="form-label"/>
                <x-text-input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="invalid-feedback" />
            </div>

            <div class="col-12">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="form-label"/>
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="invalid-feedback" />
            </div>

            <div class="col-12">
                <x-primary-button class="btn btn-primary w-100">{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>