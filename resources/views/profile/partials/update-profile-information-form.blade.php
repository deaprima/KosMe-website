<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-4">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 mb-4">
            {{ __("Update your account's profile information and email address.") }}
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
                        <label class="form-label">Photo Profile</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="position-relative">
                            <img src="{{ Auth::user()->avatar_url }}" alt="Avatar Preview"
                                class="rounded-circle avatar-preview" id="avatarPreview"
                                style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #e9ecef;">
                            <label for="avatar"
                                class="bottom-0 p-2 text-white position-absolute end-0 rounded-circle"
                                style="cursor: pointer; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background: linear-gradient(to right, var(--primary), var(--primary-dark));">
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
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
                        placeholder="Nama Lengkap" required>
                    <label for="name"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Nomor Telepon -->
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="phone" name="phone_number"
                        value="{{ old('phone_number', $user->phone_number) }}" placeholder="Nomor Telepon"
                        pattern="[0-9]{9,13}" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        minlength="9" maxlength="13" required>
                    <label for="phone"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"
                placeholder="Email" required autocomplete="username">
            <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary square-btn">
                <i class="fas fa-save me-2"></i>{{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

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
