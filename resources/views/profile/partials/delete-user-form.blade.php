<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-4">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-4">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-danger square-btn w-100" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        <i class="fas fa-trash-alt me-2"></i>{{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 mb-4">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 mb-4">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="{{ __('Enter your password') }}" required>
                <label for="password">
                    <i class="fas fa-lock me-2"></i>{{ __('Password') }}
                </label>
                <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                    <i class="password-toggle fas fa-eye-slash" id="togglePassword"></i>
                </div>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-secondary square-btn" x-on:click="$dispatch('close')">
                    <i class="fas fa-times me-2"></i>{{ __('Cancel') }}
                </button>

                <button type="submit" class="btn btn-danger square-btn">
                    <i class="fas fa-trash-alt me-2"></i>{{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this;

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        });
    });
</script>
