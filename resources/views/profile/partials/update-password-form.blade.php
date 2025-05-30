<section class="p-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-4">
            Perbarui Kata Sandi
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-4">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="current_password" name="current_password"
                placeholder="Kata Sandi Saat Ini" required autocomplete="current-password">
            <label for="current_password">
                <i class="fas fa-lock me-2"></i>Kata Sandi Saat Ini
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleCurrentPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Baru"
                required autocomplete="new-password">
            <label for="password">
                <i class="fas fa-lock me-2"></i>Kata Sandi Baru
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleNewPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
            <label for="password_confirmation">
                <i class="fas fa-lock me-2"></i>Konfirmasi Kata Sandi
            </label>
            <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                <i class="password-toggle fas fa-eye-slash" id="toggleConfirmPassword"></i>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary square-btn">
                <i class="fas fa-key me-2"></i>Perbarui Kata Sandi
            </button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success d-inline-flex align-items-center py-2 px-3 mb-0" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <span>Kata sandi berhasil diperbarui.</span>
                </div>
            @endif
        </div>
    </form>
</section>

<style>
    .alert {
        border-radius: 4px;
        font-size: 0.875rem;
    }

    .alert-success {
        background-color: #d1fae5;
        border-color: #a7f3d0;
        color: #065f46;
    }

    .alert-danger {
        background-color: #fee2e2;
        border-color: #fecaca;
        color: #991b1b;
    }

    .text-danger {
        color: #dc2626 !important;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>

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
