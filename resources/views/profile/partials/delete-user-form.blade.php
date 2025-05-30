<section class="p-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-4">
            Hapus Akun
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-4">
            Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus
            akun Anda, silakan unduh data atau informasi yang ingin Anda simpan.
        </p>
    </header>

    <button class="btn btn-danger square-btn w-100" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        <i class="fas fa-trash-alt me-2"></i>Hapus Akun
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 mb-4">
                Apakah Anda yakin ingin menghapus akun Anda?
            </h2>

            <p class="mt-1 text-sm text-gray-600 mb-4">
                Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Silakan masukkan
                kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.
            </p>

            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan kata sandi Anda" required>
                <label for="password">
                    <i class="fas fa-lock me-2"></i>Kata Sandi
                </label>
                <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                    <i class="password-toggle fas fa-eye-slash" id="togglePassword"></i>
                </div>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-secondary square-btn" x-on:click="$dispatch('close')">
                    <i class="fas fa-times me-2"></i>Batal
                </button>

                <button type="submit" class="btn btn-danger square-btn">
                    <i class="fas fa-trash-alt me-2"></i>Hapus Akun
                </button>
            </div>
        </form>
    </x-modal>
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
