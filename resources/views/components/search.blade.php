<!-- Search Start -->
<div id="searchkos" class="mb-5 container-fluid bg-primary wow fadeIn" data-wow-delay="0.1s"
    style="padding: 25px; scroll-margin-top: 70px;">
    <div class="container">
        <form action="{{ route('boarding-house.search') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="search" class="py-3 border-0 form-control"
                        placeholder="Cari Kos sesuai dengan keinginan mu" value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="py-3 border-0 btn btn-dark w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search End -->
