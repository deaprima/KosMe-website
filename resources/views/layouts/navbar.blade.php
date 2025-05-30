<!-- Navbar Start -->
<div class="nav-bar">
    <nav class="bg-white navbar navbar-expand-lg navbar-light">
        <div class="navbar-container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <div class="p-2 icon me-2">
                    <img class="img-fluid" src="{{ asset('assets/img/icon-deal.png') }}" alt="Icon"
                        style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0" style="color: var(--primary);">KosMe</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                    <a href="#searchkos" class="nav-item nav-link">Cari Kos</a>
                    <a href="#about" class="nav-item nav-link">Tentang</a>
                    <a href="#" class="nav-item nav-link {{ Request::is('myBookings') ? 'active' : '' }}">My
                        Bookings</a>
                    <a href="{{ route('login') }}"
                        class="nav-item nav-link btn btn-success square-btn d-lg-none">Masuk</a>
                </div>
                <a href="{{ route('login') }}"
                    class="btn btn-success square-btn ms-3 d-none d-lg-inline-block">Masuk</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
