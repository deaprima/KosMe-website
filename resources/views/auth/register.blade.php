<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kos Me, Choose Me!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Heebo:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #2563EB;
            /* Indigo Blue */
            --secondary: #F59E0B;
            /* Soft Amber */
            --light: #F9FAFB;
            /* Snow White */
            --dark: #1E293B;
            /* Slate Gray */
        }

        body {
            background: linear-gradient(135deg, var(--light) 0%, #E9ECEF 100%);
            font-family: 'Heebo', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .register-container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            background-color: #fff;
            display: flex;
            flex-direction: column;
        }

        .register-form-container {
            width: 100%;
            padding: 1.75rem;
        }

        .register-image-content {
            position: relative;
            z-index: 2;
        }

        .register-header {
            margin-bottom: 1rem;
            text-align: center;
        }

        .register-header h2 {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.25rem;
            font-size: 1.5rem;
        }

        .register-header p {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .logo {
            width: 60px;
            height: auto;
            margin-bottom: 0.5rem;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .form-floating {
            margin-bottom: 1rem;
        }

        .form-floating label {
            color: #6c757d;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 0.5rem;
            border: 1px solid #ced4da;
            height: 48px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        textarea.form-control {
            height: 80px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
        }

        .btn {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), #1d4ed8);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #1d4ed8, var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-google {
            background-color: #fff;
            color: #555;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .btn-google:hover {
            background-color: var(--light);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 0.75rem 0;
            color: #adb5bd;
            font-size: 0.8rem;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }

        .divider::before {
            margin-right: 0.75rem;
        }

        .divider::after {
            margin-left: 0.75rem;
        }

        .login-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 0.85rem;
        }

        .login-link:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            font-size: 0.8rem;
        }

        .password-toggle {
            cursor: pointer;
            color: #adb5bd;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .progress {
            height: 6px;
            margin-top: 8px;
            border-radius: 3px;
        }

        .progress-bar {
            transition: width 0.3s ease;
        }

        .password-strength-text {
            font-size: 0.75rem;
            margin-top: 5px;
        }

        .steps-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 12px;
        }

        .step-circle {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.8rem;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background-color: var(--primary);
            color: white;
        }

        .step.completed .step-circle {
            background-color: var(--primary);
            color: white;
        }

        .step-label {
            margin-top: 6px;
            font-size: 0.7rem;
            color: #6c757d;
            text-align: center;
        }

        .step.active .step-label {
            color: var(--primary);
            font-weight: 500;
        }

        .step-connector {
            flex: 1;
            height: 2px;
            background-color: #e9ecef;
            position: relative;
            top: 12px;
            z-index: 1;
        }

        .step-connector.active {
            background-color: var(--primary);
        }

        .register-form {
            display: none;
        }

        .register-form.active {
            display: block;
            animation: fadeIn 0.5s ease-out forwards;
        }

        .terms-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .terms-link:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control,
        .btn,
        .register-header,
        .divider {
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .register-header {
            animation-delay: 0.1s;
        }

        .confirmation-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .confirmation-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .confirmation-text {
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
                max-width: 380px;
            }

            .register-form-container {
                padding: 1.5rem 1.25rem;
            }

            .steps-indicator {
                margin-bottom: 0.75rem;
            }

            .step {
                margin: 0 8px;
            }

            .step-label {
                font-size: 0.65rem;
            }
        }

        /* Avatar upload styles */
        .avatar-upload label[for="avatar"] {
            background: linear-gradient(to right, var(--primary), #1d4ed8) !important;
        }

        .avatar-upload label[for="avatar"]:hover {
            background: linear-gradient(to right, #1d4ed8, var(--primary)) !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="register-container">
            <div class="register-form-container">
                <div class="register-header">
                    <img src="{{ asset('assets/logo/logo3.png') }}" alt="Logo"
                        style="height: 80px; width: auto; padding-bottom:15px" class="logo">
                    <h2>Daftar Akun Baru</h2>
                    <p class="mb-4">Lengkapi data diri Anda untuk membuat akun</p>
                </div>


                <form id="registerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3 row align-items-center">
                        <div class="col-md-4">
                            <div class="avatar-upload position-relative d-inline-block w-100">
                                <div class="mb-2 text-center">
                                    <label class="form-label">Photo Profile</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="position-relative">
                                        <img src="{{ Storage::url('avatar/avatar-default.jpg') }}" alt="Avatar Preview"
                                            class="rounded-circle avatar-preview" id="avatarPreview"
                                            style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #e9ecef;">
                                        <label for="avatar"
                                            class="bottom-0 p-2 text-white position-absolute end-0 rounded-circle"
                                            style="cursor: pointer; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; background: linear-gradient(to right, var(--primary), var(--primary));">
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
                            <div class="mt-4 form-floating">
                                <input type="text" class="form-control" id="fullName" name="name"
                                    value="{{ old('name') }}" placeholder="Nama Lengkap" required minlength="3"
                                    maxlength="255">
                                <label for="fullName"><i class="fas fa-user me-2"></i>Nama Lengkap</label>
                                <div class="invalid-feedback">Nama lengkap harus diisi</div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="mt-3 form-floating">
                                <input type="tel" class="form-control" id="phone" name="phone_number"
                                    value="{{ old('phone_number') }}" placeholder="Nomor Telepon" pattern="[0-9]{9,13}"
                                    inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    minlength="9" maxlength="13" required>
                                <label for="phone"><i class="fas fa-phone me-2"></i>Nomor Telepon</label>
                                <div class="invalid-feedback">Nomor telepon tidak valid</div>
                                <div id="phoneError" class="mt-2 text-danger" style="display: none;">
                                    <i class="fas fa-exclamation-circle"></i> <span class="text-danger"></span>
                                </div>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" placeholder="Email" required>
                        <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                        <div id="emailFeedback" class="mt-2 text-danger"></div>
                        @error('email')
                            <div class="mt-2 text-danger">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <!-- Password -->
                    <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password" required minlength="8">
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                            <i class="password-toggle fas fa-eye-slash" id="togglePassword"></i>
                        </div>
                        <div class="invalid-feedback">Password minimal 8 karakter</div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <!-- Konfirmasi Password -->
                    <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Konfirmasi Password" required>
                        <label for="password_confirmation"><i class="fas fa-lock me-2"></i>Konfirmasi Password</label>
                        <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                            <i class="password-toggle fas fa-eye-slash" id="toggleConfirmPassword"></i>
                        </div>
                        <div class="invalid-feedback">Konfirmasi password harus sama dengan password</div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Terms -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" id="termsAccept" name="terms" required>
                        <label class="form-check-label" for="termsAccept">
                            Saya setuju dengan <a href="#" class="terms-link">Syarat & Ketentuan</a> dan
                            <a href="#" class="terms-link">Kebijakan Privasi</a>
                        </label>
                        <div class="invalid-feedback">Anda harus menyetujui syarat dan ketentuan</div>
                        <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                    </div>


                    <div class="mt-3">
                        <button type="submit" class="py-2 btn btn-primary w-100">
                            Daftar Sekarang <i class="fas fa-check ms-2"></i>
                        </button>
                    </div>

                    <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}"
                            class="login-link">Masuk sekarang</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const avatarInput = document.getElementById('avatar');
            const avatarPreview = document.getElementById('avatarPreview');
            const avatarError = document.getElementById('avatarError');
            const emailInput = document.getElementById('email');
            const emailFeedback = document.getElementById('emailFeedback');
            let emailCheckTimeout;

            // Email validation
            emailInput.addEventListener('input', function() {
                clearTimeout(emailCheckTimeout);
                const email = this.value;

                // Reset feedback
                emailFeedback.innerHTML = '';
                emailInput.setCustomValidity('');
                emailInput.classList.remove('is-invalid');

                if (email) {
                    // Check email format
                    if (!email.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/)) {
                        emailFeedback.innerHTML =
                            '<i class="fas fa-exclamation-circle"></i> Format email tidak valid';
                        emailInput.setCustomValidity('Format email tidak valid');
                        emailInput.classList.add('is-invalid');
                    } else {
                        // Check email availability
                        emailCheckTimeout = setTimeout(() => {
                            fetch(`/check-email?email=${encodeURIComponent(email)}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.exists) {
                                        emailFeedback.innerHTML =
                                            '<i class="fas fa-exclamation-circle"></i> Email sudah terdaftar';
                                        emailInput.setCustomValidity('Email sudah terdaftar');
                                        emailInput.classList.add('is-invalid');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        }, 500);
                    }
                }
            });

            // Password visibility toggle
            document.getElementById('togglePassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = this;
                togglePasswordVisibility(passwordInput, toggleIcon);
            });

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

            // Avatar preview
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

            // Password confirmation validation
            confirmPassword.addEventListener('input', function() {
                if (this.value !== password.value) {
                    this.setCustomValidity('Password tidak cocok');
                } else {
                    this.setCustomValidity('');
                }
            });

            password.addEventListener('input', function() {
                if (confirmPassword.value) {
                    if (this.value !== confirmPassword.value) {
                        confirmPassword.setCustomValidity('Password tidak cocok');
                    } else {
                        confirmPassword.setCustomValidity('');
                    }
                }
            });

            // Form validation
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            // Add subtle animation to logo
            const logo = document.querySelector('.logo');
            logo.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.1) rotate(5deg)';
            });

            logo.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
            });

            // Phone number validation
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phoneError');
            let phoneCheckTimeout;

            phoneInput.addEventListener('input', function() {
                const phone = this.value;
                phoneError.style.display = 'none';
                clearTimeout(phoneCheckTimeout);

                if (phone.length > 0) {
                    if (phone.length < 9) {
                        this.setCustomValidity('Nomor telepon tidak valid');
                    } else if (phone.length > 13) {
                        this.setCustomValidity('Nomor telepon maksimal 13 digit');
                    } else {
                        this.setCustomValidity('');
                        // Check if phone number exists
                        phoneCheckTimeout = setTimeout(() => {
                            fetch(`/check-phone?phone=${encodeURIComponent(phone)}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.exists) {
                                        const errorSpan = phoneError.querySelector('span');
                                        errorSpan.textContent = 'Nomor telepon sudah terdaftar';
                                        errorSpan.classList.add('text-danger');
                                        phoneError.style.display = 'block';
                                        this.setCustomValidity('Nomor telepon sudah terdaftar');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        }, 500);
                    }
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>
</body>

</html>
