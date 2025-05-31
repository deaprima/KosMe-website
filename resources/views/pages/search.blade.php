@extends('layouts.app')

@section('content')
    <!-- Banner Start -->
    <div class="kos-banner position-relative" style="background: var(--primary); min-height: 200px;">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="mx-auto text-center text-white col-lg-8">
                    <h1 class="mb-3 display-5 fw-bold" style="letter-spacing: -0.5px;">
                        <span class="text-white">Temukan Kos Ideal dengan KosMe</span>
                    </h1>
                    <p class="mb-0 lead" style="font-size: 1.1rem; opacity: 0.9;">
                        Platform pencarian kos terbaik dengan ribuan pilihan hunian berkualitas di seluruh Indonesia
                    </p>
                </div>
            </div>
        </div>

        <!-- Simple Wave Divider -->
        <div class="bottom-0 position-absolute start-0 w-100"
            style="height: 40px; background: white; clip-path: polygon(0 50%, 100% 50%, 100% 100%, 0% 100%);"></div>
    </div>
    <!-- Banner End -->

    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>

    <!-- Filter/Search Start -->
    <div id="searchkos" class="container" style="scroll-margin-top: 90px;">
        <div class="px-4 py-3 bg-white rounded shadow" style="margin-top: -40px; position: relative; z-index: 2;">
            <form action="{{ route('boarding-house.search') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="search" class="py-3 form-select" placeholder="Cari kos..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select class="py-3 form-select" name="city" aria-label="Pilih Kota">
                            <option value="">Semua Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="py-3 form-select" name="type" aria-label="Tipe Kos">
                            <option value="">Semua Tipe</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}"
                                    {{ request('type') == $category->name ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button class="py-3 btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Filter/Search End -->

    <!-- Hasil Info -->
    <div class="container mb-4" style="margin-top: 40px;">
        <p class="mb-4">
            <strong>
                Menampilkan {{ $boardingHouses->firstItem() ?? 0 }} - {{ $boardingHouses->lastItem() ?? 0 }}
                dari {{ $boardingHouses->total() ?? 0 }} Kos
                @if (request('city'))
                    di {{ $cities->firstWhere('id', request('city'))->name }}
                @endif
                {{ request('search') ? 'untuk "' . request('search') . '"' : '' }}
                {{ request('type') ? 'tipe ' . request('type') : '' }}
                bisa Anda booking
            </strong>
        </p>
    </div>

    <!-- List Kos Start -->
    <div class="container">
        <div class="tab-content">
            <div id="tab-1" class="p-0 tab-pane fade show active">
                <div class="row g-4">
                    @forelse($boardingHouses as $boardingHouse)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a href="{{ route('boarding-house.detail', $boardingHouse->slug) }}"
                                class="text-decoration-none">
                                <div class="overflow-hidden rounded property-item h-100">
                                    <div class="overflow-hidden position-relative">
                                        <img class="img-fluid" src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                            alt="{{ $boardingHouse->name }}">
                                        <div
                                            class="top-0 px-3 py-1 m-4 text-white rounded bg-primary position-absolute start-0">
                                            {{ $boardingHouse->categories->first()->name ?? 'Campur' }}
                                        </div>
                                        <div
                                            class="bottom-0 px-3 pt-1 mx-4 bg-white rounded-top text-primary position-absolute start-0">
                                            {{ $boardingHouse->rooms->where('is_available', true)->count() }} Tipe Kamar
                                            Tersedia
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="mb-3 text-primary">Rp
                                            {{ number_format($boardingHouse->rooms->min('price_per_month'), 0, ',', '.') }}/bulan
                                        </h5>
                                        <h5 class="mb-2 transition-colors text-dark hover:text-primary">
                                            {{ $boardingHouse->name }}</h5>
                                        <p class="text-dark"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $boardingHouse->address }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="py-2 text-center flex-fill border-end text-dark">
                                            <i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $boardingHouse->rooms->min('square_feet') }}
                                            m2
                                        </small>
                                        <small class="py-2 text-center flex-fill border-end text-dark">
                                            <i class="fa fa-bed text-primary me-2"></i>Kasur
                                        </small>
                                        <small class="py-2 text-center flex-fill text-dark">
                                            <i class="fa fa-wifi text-primary me-2"></i>WiFi
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="text-center col-12">
                            <p class="text-muted">Tidak ada kos yang ditemukan</p>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    @if ($boardingHouses->hasPages())
                        <div class="text-center col-12 wow fadeInUp" data-wow-delay="0.1s">
                            {{ $boardingHouses->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- List Kos End -->
@endsection
