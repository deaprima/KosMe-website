<!-- Testimonial Start -->
<div class="py-5 container-xxl">
    <div class="container-custom">
        <div class="mx-auto mb-5 text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Apa Kata Mereka?</h1>
            <p class="text-muted">Dengarkan pengalaman nyata dari penghuni kos yang telah menemukan hunian ideal mereka
                melalui KosMe.
                Temukan kisah sukses dan kepuasan mereka dalam mencari tempat tinggal yang nyaman.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($testimonials as $testimonial)
                <div class="p-3 rounded testimonial-item">
                    <div class="p-4 bg-white border rounded shadow-sm h-100">
                        <div class="mb-3 text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <p class="mb-4 text-muted" style="font-style: italic;">"{{ $testimonial->content }}"</p>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 position-relative">
                                <img class="border-2 img-fluid border-primary"
                                    src="{{ asset('storage/' . $testimonial->photo) }}"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            </div>
                            <div class="ps-3">
                                <h6 class="mb-1 fw-bold">{{ $testimonial->name }}</h6>
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-home text-primary me-2"></i>
                                    <small class="text-muted">{{ $testimonial->boardingHouse->name }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->

@push('styles')
    <style>
        .testimonial-item {
            transition: transform 0.3s ease;
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
        }

        .testimonial-carousel .owl-nav {
            margin-top: 20px;
            text-align: center;
        }

        .testimonial-carousel .owl-nav button {
            width: 40px;
            height: 40px;
            border-radius: 50% !important;
            background: #0F172B !important;
            margin: 0 5px;
        }

        .testimonial-carousel .owl-nav button i {
            color: #fff;
            font-size: 20px;
            line-height: 40px;
        }

        .testimonial-carousel .owl-nav button:hover {
            background: #FEA116 !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            },
            navText: [
                '<i class="fa fa-arrow-left"></i>',
                '<i class="fa fa-arrow-right"></i>'
            ]
        });
    </script>
@endpush
