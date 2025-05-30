<section class="px-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-4">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-4">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="current_password" name="current_password"
                placeholder="Current Password" required autocomplete="current-password">
            <label for="current_password">
                <i class="fas fa-lock me-2"></i>{{ __('Current Password') }}
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleCurrentPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="New Password"
                required autocomplete="new-password">
            <label for="password">
                <i class="fas fa-lock me-2"></i>{{ __('New Password') }}
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleNewPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm Password" required autocomplete="new-password">
            <label for="password_confirmation">
                <i class="fas fa-lock me-2"></i>{{ __('Confirm Password') }}
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleConfirmPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary square-btn">
                <i class="fas fa-key me-2"></i>{{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility for current password
        document.getElementById('toggleCurrentPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('current_password');
            const toggleIcon = this;
            togglePasswordVisibility(passwordInput, toggleIcon);
        });

        // Toggle password visibility for new password
        document.getElementById('toggleNewPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this;
            togglePasswordVisibility(passwordInput, toggleIcon);
        });

        // Toggle password visibility for confirm password
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const toggleIcon = this;
            togglePasswordVisibility(passwordInput, toggleIcon);
        });

        function togglePasswordVisibility(input, icon) {
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    });
</script>
