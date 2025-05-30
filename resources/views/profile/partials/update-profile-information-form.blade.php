<section class="p-4">
    <header>
        <h2 class="mb-4 text-lg font-medium text-gray-900">
            Informasi Profil
        </h2>

        <p class="mt-1 mb-4 text-sm text-gray-600">
            Perbarui informasi profil dan alamat email akun Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-4 row align-items-center">
            <div class="col-md-4">
                <div class="avatar-upload position-relative d-inline-block w-100">
                    <div class="mb-2 text-center">
                        <label class="form-label">Foto Profil</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="position-relative">
                            <img src="{{ Auth::user()->avatar_url }}" alt="Avatar Preview"
                                class="rounded-circle avatar-preview" id="avatarPreview"
                                style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #e9ecef;">
                            <label for="avatar" class="bottom-0 p-2 text-white position-absolute end-0 rounded-circle"
                                style="cursor: pointer; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: var(--primary);">
                                <i class="fas fa-camera"></i>
                            </label>
                        </div>
                    </div>
                    <input type="file" class="d-none" id="avatar" name="avatar" accept="image/*">
                </div>
                <div class="mt-2 text-danger" id="avatarError"></div>
                @error('avatar')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-8">
                <!-- Nama Lengkap -->
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $user->name) }}" placeholder="Nama Lengkap" required>
                    <label for="name"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3 form-floating">
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                        id="phone" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                        placeholder="Nomor Telepon" pattern="[0-9]{9,13}" inputmode="numeric"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="9" maxlength="13" required>
                    <label for="phone"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                    @error('phone_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3 form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required
                        autocomplete="username">
                    <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="mt-2 text-sm text-gray-800">
                    Alamat email Anda belum terverifikasi.

                    <button form="send-verification" class="p-0 m-0 align-baseline btn btn-link">
                        Klik di sini untuk mengirim ulang email verifikasi.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600">
                        Link verifikasi baru telah dikirim ke alamat email Anda.
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary square-btn">
                <i class="fas fa-save me-2"></i>Simpan
            </button>

            @if (session('status') === 'profile-updated')
                <div class="px-3 py-2 mb-0 alert alert-success d-inline-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <span>Profil berhasil diperbarui.</span>
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
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarError = document.getElementById('avatarError');

        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    avatarError.textContent = 'Ukuran file maksimal 2MB';
                    avatarInput.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    avatarError.textContent = 'Format file harus jpeg, png, jpg, atau gif';
                    avatarInput.value = '';
                    return;
                }

                avatarError.textContent = '';
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
