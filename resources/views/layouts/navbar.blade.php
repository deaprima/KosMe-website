<!-- Navbar Start -->
<div class="nav-bar">
    <nav class="bg-white navbar navbar-expand-lg navbar-light">
        <div class="navbar-container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <img class="img-fluid" src="{{ asset('assets/logo/logo1.png') }}" alt="Icon"
                    style="width: 30px; height: 30px;">
                <img src="{{ asset('assets/logo/logo4.png') }}" alt="KosMe Logo"
                    style="height: 40px; width: auto; padding-left: 10px;">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('boarding-house.search') }}" class="nav-item nav-link">Cari Kos</a>
                    <a href="#about" class="nav-item nav-link">Tentang</a>
                    @auth
                        <div class="nav-item dropdown d-lg-none">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}"
                                    class="rounded-circle" style="width: 32px; height: 32px; object-fit: cover;">
                            </a>
                            <div class="dropdown-menu">
                                <div class="px-3 py-2">
                                    <p class="mb-0 fw-bold">{{ Auth::user()->name }}</p>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="nav-item nav-link btn btn-success square-btn d-lg-none">Masuk</a>
                    @endauth
                </div>
                @auth
                    <div class="dropdown d-none d-lg-block">
                        <button class="p-0 border-0 btn" type="button" data-bs-toggle="dropdown">
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}"
                                class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="px-3 py-2">
                                <p class="mb-0 fw-bold">{{ Auth::user()->name }}</p>
                                <small class="text-muted">{{ Auth::user()->email }}</small>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-success square-btn ms-3 d-none d-lg-inline-block">Masuk</a>
                @endauth
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
