<!-- Testimonial Start -->
<div class="py-5 container-xxl">
    <div class="container-custom">
        <div class="mx-auto mb-5 text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Apa Kata Mereka?</h1>
            <p>Dengarkan pengalaman nyata dari penghuni kos yang telah menemukan hunian ideal mereka melalui KosMe.
                Temukan kisah sukses dan kepuasan mereka dalam mencari tempat tinggal yang nyaman.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($testimonials as $testimonial)
                <div class="p-3 rounded testimonial-item bg-light">
                    <div class="p-4 bg-white border rounded">
                        <p>{{ $testimonial->content }}</p>
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded img-fluid"
                                src="{{ asset('storage/' . $testimonial->photo) }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="mb-1 fw-bold">{{ $testimonial->name }}</h6>
                                <small>{{ $testimonial->boardingHouse->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
