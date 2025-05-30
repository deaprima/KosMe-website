@extends('layouts.app')

@section('content')
    <div class="py-5 container-xxl">
        <div class="container-custom">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="mx-auto mb-5 text-start wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Semua Kos</h1>
                        <p>Jelajahi tempat kos yang paling banyak dicari di kota Anda</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="p-0 tab-pane fade show active">
                    <div class="row g-4">
                        @foreach ($boardingHouses as $boardingHouse)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.2 }}s">
                                <div class="overflow-hidden rounded property-item">
                                    <div class="overflow-hidden position-relative">
                                        <a href="{{ route('boarding-house.detail', $boardingHouse->slug) }}">
                                            <img class="img-fluid" src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                                alt="{{ $boardingHouse->name }}">
                                        </a>
                                        <div
                                            class="top-0 px-3 py-1 m-4 text-white rounded bg-primary position-absolute start-0">
                                            {{ $boardingHouse->categories->first()->name ?? 'Campur' }}
                                        </div>
                                        <div
                                            class="bottom-0 px-3 pt-1 mx-4 bg-white rounded-top text-primary position-absolute start-0">
                                            {{ $boardingHouse->rooms->where('is_available', true)->count() }} Kamar Tersedia
                                        </div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="mb-3 text-primary">Rp
                                            {{ number_format($boardingHouse->rooms->min('price_per_month'), 0, ',', '.') }}/month
                                        </h5>
                                        <a class="mb-2 d-block h5"
                                            href="{{ route('boarding-house.detail', $boardingHouse->slug) }}">{{ $boardingHouse->name }}</a>
                                        <p><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $boardingHouse->address }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="py-2 text-center flex-fill border-end">
                                            <i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $boardingHouse->rooms->min('square_feet') }}
                                            Sqft
                                        </small>
                                        <small class="py-2 text-center flex-fill border-end">
                                            <i class="fa fa-bed text-primary me-2"></i>Kasur
                                        </small>
                                        <small class="py-2 text-center flex-fill">
                                            <i class="fa fa-wifi text-primary me-2"></i>WiFi
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $boardingHouses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
