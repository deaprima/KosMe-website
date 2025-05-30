<!-- List Kos Start -->
<div id="listkos" class="py-5 container-xxl">
    <div class="container-custom">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="mx-auto mb-5 text-start wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Semua Kos</h1>
                    <p>Jelajahi tempat kos yang paling banyak dicari di kota Anda</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="mb-5 nav nav-pills d-inline-flex justify-content-end">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1"
                            onclick="filterKos('all')">Semua</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2"
                            onclick="filterKos('Kost Campur')">Campur</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3"
                            onclick="filterKos('Kost Putra')">Putra</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-4"
                            onclick="filterKos('Kost Putri')">Putri</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="p-0 tab-pane fade show active">
                <div class="row g-4" id="kos-container">
                    @foreach ($boardingHouses as $boardingHouse)
                        <div class="col-lg-4 col-md-6 wow fadeInUp kos-item"
                            data-wow-delay="{{ 0.1 + $loop->index * 0.2 }}s"
                            data-category="{{ $boardingHouse->categories->first()->name ?? 'Kost Campur' }}">
                            <a href="{{ route('boarding-house.detail', $boardingHouse->slug) }}"
                                class="text-decoration-none">
                                <div class="overflow-hidden rounded property-item h-100">
                                    <div class="overflow-hidden position-relative">
                                        <img class="img-fluid" src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                            alt="{{ $boardingHouse->name }}">
                                        <div
                                            class="top-0 px-3 py-1 m-4 text-white rounded bg-primary position-absolute start-0">
                                            {{ $boardingHouse->categories->first()->name ?? 'Kost Campur' }}
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
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-center col-12 wow fadeInUp" data-wow-delay="0.1s">
            <a class="px-5 py-3 btn btn-primary" href="{{ route('boarding-house.search') }}">Lihat Semua</a>
        </div>
    </div>
</div>

<style>
    .kos-item {
        transition: opacity 0.3s ease;
    }

    .kos-item.hidden {
        opacity: 0;
        display: none;
    }
</style>

<script>
    function filterKos(category) {
        const kosItems = document.querySelectorAll('.kos-item');

        kosItems.forEach(item => {
            if (category === 'all') {
                item.classList.remove('hidden');
            } else {
                if (item.getAttribute('data-category') === category) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            }
        });

        // Update active state of buttons
        const buttons = document.querySelectorAll('.nav-pills .btn');
        buttons.forEach(button => {
            button.classList.remove('active');
            if (button.getAttribute('onclick').includes(category)) {
                button.classList.add('active');
            }
        });
    }
</script>
<!-- List Kos End -->
