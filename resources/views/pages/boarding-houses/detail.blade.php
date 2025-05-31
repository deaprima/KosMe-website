@extends('layouts.app')

@section('content')
    <div class="py-5 container-xxl">
        <div class="container-custom">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Boarding House Images -->
                    <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="overflow-hidden rounded position-relative">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                alt="{{ $boardingHouse->name }}">
                        </div>
                    </div>

                    <!-- Boarding House Info -->
                    <div class="mb-4 wow fadeInUp" data-wow-delay="0.2s">
                        <h2 class="mb-3">{{ $boardingHouse->name }}</h2>
                        <p class="mb-4"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $boardingHouse->address }}</p>
                        <p class="mb-4">{{ $boardingHouse->description }}</p>
                    </div>

                    <!-- Available Rooms -->
                    <div class="mb-4 wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="mb-4">Kamar Tersedia</h3>
                        <div class="row g-4">
                            @foreach ($boardingHouse->rooms->where('is_available', true) as $room)
                                <div class="col-md-6">
                                    <div class="p-4 border rounded">
                                        <div class="mb-3 overflow-hidden rounded position-relative">
                                            @if ($room->images->count() > 0)
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('storage/' . $room->images->first()->image) }}"
                                                    alt="{{ $room->name }}" style="height: 200px; object-fit: cover;">
                                            @else
                                                <img class="img-fluid w-100" src="{{ asset('assets/img/no-image.jpg') }}"
                                                    alt="{{ $room->name }}" style="height: 200px; object-fit: cover;">
                                            @endif
                                        </div>
                                        <h4 class="mb-3">{{ $room->name }}</h4>
                                        <p class="mb-2"><i
                                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $room->square_feet }}
                                            m2</p>
                                        <p class="mb-2"><i class="fa fa-users text-primary me-2"></i>Kapasitas:
                                            {{ $room->capacity }} orang</p>
                                        <p class="mb-2"><i class="fa fa-tag text-primary me-2"></i>Rp
                                            {{ number_format($room->price_per_month, 0, ',', '.') }}/bulan</p>
                                        <a href="{{ route('booking.payment', [$boardingHouse, $room]) }}"
                                            class="btn btn-primary">Booking
                                            Sekarang</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Bonuses -->
                    @if ($boardingHouse->bonuses->count() > 0)
                        <div class="mb-4 wow fadeInUp" data-wow-delay="0.4s">
                            <h3 class="mb-4">Fasilitas</h3>
                            <div class="row g-4">
                                @foreach ($boardingHouse->bonuses as $bonus)
                                    <div class="col-md-4">
                                        <div class="p-3 text-center border rounded">
                                            <img src="{{ asset('storage/' . $bonus->image) }}" alt="{{ $bonus->name }}"
                                                class="mb-3 img-fluid" style="height: 100px; object-fit: contain;">
                                            <h5 class="mb-2">{{ $bonus->name }}</h5>
                                            <p class="mb-0">{{ $bonus->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Testimonials -->
                    @if ($boardingHouse->testimonials->count() > 0)
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <h3 class="mb-4">Testimoni</h3>
                            <div class="row g-4">
                                @foreach ($boardingHouse->testimonials as $testimonial)
                                    <div class="col-md-6">
                                        <div class="p-4 border rounded">
                                            <div class="mb-3 d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                                    alt="{{ $testimonial->name }}" class="rounded-circle me-3"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                <div>
                                                    <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                                    <div class="text-warning">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i
                                                                class="fa fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0">{{ $testimonial->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="p-4 border rounded">
                            <h3 class="mb-4">Informasi Kontak</h3>
                            <p class="mb-2"><i class="fa fa-user text-primary me-2"></i>{{ $boardingHouse->user->name }}
                            </p>
                            <p class="mb-2"><i
                                    class="fa fa-phone text-primary me-2"></i>{{ $boardingHouse->user->phone_number ?? 'Tidak tersedia' }}
                            </p>
                            <p class="mb-2"><i
                                    class="fa fa-envelope text-primary me-2"></i>{{ $boardingHouse->user->email }}</p>
                            <a href="#" class="btn btn-primary w-100">Hubungi Pemilik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
