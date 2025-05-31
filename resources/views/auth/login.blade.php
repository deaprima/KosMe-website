<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kos Me, Choose Me!</title>
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

        .login-container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            background-color: #fff;
            display: flex;
            flex-direction: row-reverse;
        }

        .login-form-container {
            width: 100%;
            padding: 1.75rem;
        }

        .login-image {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light);
            text-align: center;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('HMP TI.png') center/cover no-repeat;
            opacity: 0.3;
            z-index: 1;
        }

        .login-image-content {
            position: relative;
            z-index: 2;
        }

        .login-header {
            margin-bottom: 1rem;
            text-align: center;
        }

        .login-header h2 {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.25rem;
            font-size: 1.5rem;
        }

        .login-header p {
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

        .google-icon {
            display: inline-block;
            margin-right: 6px;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }

        .forgot-password:hover {
            color: #1d4ed8;
            text-decoration: underline;
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

        .signup-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .signup-link:hover {
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

        .input-group-text {
            background-color: transparent;
            border-left: none;
            cursor: pointer;
        }

        .password-toggle {
            cursor: pointer;
            color: #adb5bd;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .signup-text {
            font-size: 0.85rem;
            margin-top: 0.75rem !important;
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 380px;
            }

            .login-image {
                height: 120px;
                padding: 1rem;
            }

            .login-form-container {
                padding: 1.5rem 1.25rem;
            }
        }

        /* Animations */
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
        .login-header,
        .divider,
        .form-check,
        .signup-text {
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .login-header {
            animation-delay: 0.1s;
        }

        .form-floating:nth-child(1) {
            animation-delay: 0.2s;
        }

        .form-floating:nth-child(2) {
            animation-delay: 0.3s;
        }

        .form-check,
        .forgot-password-container {
            animation-delay: 0.4s;
        }

        .login-button {
            animation-delay: 0.5s;
        }

        .divider {
            animation-delay: 0.6s;
        }

        .google-button {
            animation-delay: 0.7s;
        }

        .signup-text {
            animation-delay: 0.8s;
        }

        /* Floating label adjustments */
        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            color: var(--primary);
        }

        /* Error notification styles */
        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: none;
            animation: fadeInUp 0.5s ease-out forwards;
        }

        .alert-danger {
            background-color: #FEE2E2;
            color: #DC2626;
            border-left: 4px solid #DC2626;
        }

        .alert-success {
            background-color: #DCFCE7;
            color: #16A34A;
            border-left: 4px solid #16A34A;
        }

        .alert i {
            margin-right: 8px;
        }

        /* Form error styles */
        .is-invalid {
            border-color: #DC2626 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 38, 38, 0.25) !important;
        }

        .invalid-feedback {
            color: #DC2626;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .form-floating .invalid-feedback {
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="login-form-container col-lg-6">
                <div class="login-header">
                    <img src="/home/img/logo_kosme.png" alt="KosKita Logo" class="logo rounded-circle">
                    <h2>Selamat Datang Kembali!</h2>
                    <p class="mb-0">Silakan login untuk mengakses akun Anda</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Email" required>
                        <label for="email"><i class="fas fa-envelope me-2"></i>Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                @if ($message == 'These credentials do not match our records.')
                                    Email atau password yang Anda masukkan salah
                                @elseif($message == 'The email field is required.')
                                    Email harus diisi
                                @elseif($message == 'Please enter a valid email address.')
                                    Mohon masukkan alamat email yang valid
                                @else
                                    {{ $message }}
                                @endif
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required>
                        <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                        <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                            <i class="password-toggle fas fa-eye-slash" id="togglePassword"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                @if ($message == 'The password field is required.')
                                    Password harus diisi
                                @elseif($message == 'The password is incorrect.')
                                    Password yang Anda masukkan salah
                                @else
                                    {{ $message }}
                                @endif
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <div class="forgot-password-container">
                            <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
                        </div>
                    </div> --}}

                    <button type="submit" class="py-2 mb-2 btn btn-primary w-100 login-button">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>

                    {{-- <div class="divider">atau lanjutkan dengan</div>

                    <button type="button" class="py-2 mb-2 btn btn-google w-100 google-button">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/simple-icons/6.0.0/google.svg" alt="Google"
                            width="16" height="16">
                        Lanjutkan dengan Google
                    </button> --}}

                    <p class="text-center signup-text">Belum punya akun? <a href="{{ route('register') }}"
                            class="signup-link"> Daftar sekarang</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
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

        // Add subtle animation to logo
        const logo = document.querySelector('.logo');
        logo.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
        });

        logo.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>

</html>
