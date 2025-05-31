<!-- Footer Start -->
<div class="pt-5 mt-5 container-fluid bg-dark text-white-50 footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-white">Mengenal Kami</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Surabaya, Jawa Timur, Indonesia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>KosMe@gmail.com</p>
                <div class="pt-2 d-flex">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-white">Menu</h5>
                <a class="btn btn-link text-white-50" href="{{ route('boarding-house.search') }}">List Kos</a>
                <a class="btn btn-link text-white-50" href="#about">About</a>
                <a class="btn btn-link text-white-50" href="{{ route('profile.edit') }}">Profile</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-white">Galeri Foto</h5>
                <div class="pt-2 row g-2">
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-1.jpeg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-2.jpeg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-3.jpeg') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-4.png') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-5.png') }}"
                            alt="">
                    </div>
                    <div class="col-4">
                        <img class="p-1 rounded img-fluid bg-light" src="{{ asset('assets/img/property-6.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-4 text-white">Newsletter</h5>
                <p>Kami menghargai setiap masukan. Laporkan masalah teknis atau kesalahan sistem melalui email di bawah.
                </p>
                <div class="mx-auto position-relative" style="max-width: 400px;">
                    <input class="py-3 bg-transparent form-control w-100 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="top-0 py-2 mt-2 btn btn-primary position-absolute end-0 me-2">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="mb-3 text-center col-md-6 text-md-start mb-md-0">
                    &copy; <a class="text-white border-bottom" href="#">KosMe</a>, All Right Reserved.
                </div>
                <div class="text-center col-md-6 text-md-end">
                    <div class="footer-menu">
                        <a href="" class="text-white">Home</a>
                        <a href="" class="text-white">Cookies</a>
                        <a href="" class="text-white">Help</a>
                        <a href="" class="text-white">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
