@extends('layouts.app')

@section('content')
    <div class="py-5 container-xxl" style="max-width: 1800px;">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="p-3 border rounded p-lg-5">
                            <h2 class="mb-4">Detail Pembayaran</h2>

                            <!-- Boarding House Images -->
                            <div class="mb-4 mb-lg-5">
                                <div class="overflow-hidden rounded position-relative">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('storage/' . $room->boardingHouse->thumbnail) }}"
                                        alt="{{ $room->boardingHouse->name }}"
                                        style="height: 300px; height: 400px; object-fit: cover;">
                                </div>
                            </div>

                            <!-- Booking Details -->
                            <div class="mb-4 mb-lg-5">
                                <h4 class="mb-3 mb-lg-4">Detail Pemesanan</h4>
                                <div class="p-3 border rounded p-lg-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <h5 class="mb-2 text-primary">Informasi Kost</h5>
                                                <p class="mb-2"><strong>Nama
                                                        Kost:</strong><br>{{ $room->boardingHouse->name }}</p>
                                                <p class="mb-2">
                                                    <strong>Alamat:</strong><br>{{ $room->boardingHouse->address }}
                                                </p>
                                                <p class="mb-0">
                                                    <strong>Kota:</strong><br>{{ $room->boardingHouse->city->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <h5 class="mb-2 text-primary">Informasi Kamar</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="mb-2"><strong>Nama
                                                                Kamar:</strong><br>{{ $room->name }}</p>
                                                        <p class="mb-0">
                                                            <strong>Kapasitas:</strong><br>{{ $room->capacity }} orang
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-2"><strong>Harga per Bulan:</strong><br>Rp
                                                            {{ number_format($room->price_per_month, 0, ',', '.') }}</p>
                                                        <p class="mb-0"><strong>Luas:</strong><br>{{ $room->square_feet }}
                                                            m²</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Owner and Tenant Information -->
                            <div class="mb-4 mb-lg-5">
                                <h4 class="mb-3 mb-lg-4">Informasi Pemilik dan Penyewa</h4>
                                <div class="row">
                                    <!-- Owner Information -->
                                    <div class="mb-4 col-md-6 mb-md-0">
                                        <div class="p-3 border rounded p-lg-4 h-100">
                                            <div class="mb-3 d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $room->boardingHouse->user->avatar) }}"
                                                    alt="{{ $room->boardingHouse->user->name }}"
                                                    class="rounded-circle me-3"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                                <div>
                                                    <h5 class="mb-1">{{ $room->boardingHouse->user->name }}</h5>
                                                    <p class="mb-0 text-muted">Pemilik Kost</p>
                                                </div>
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-2"><i class="fa fa-phone text-primary me-2"></i>Nomor:
                                                    {{ $room->boardingHouse->user->phone_number ?? 'Tidak tersedia' }}</p>
                                                <p class="mb-0"><i class="fa fa-envelope text-primary me-2"></i>Email:
                                                    {{ $room->boardingHouse->user->email }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tenant Information -->
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded p-lg-4 h-100">
                                            <div class="mb-3 d-flex align-items-center">
                                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                                    alt="{{ auth()->user()->name }}" class="rounded-circle me-3"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                                <div>
                                                    <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                                                    <p class="mb-0 text-muted">Penyewa</p>
                                                </div>
                                            </div>
                                            <div class="ms-4">
                                                <p class="mb-2"><i class="fa fa-phone text-primary me-2"></i>Nomor:
                                                    {{ auth()->user()->phone_number ?? 'Tidak tersedia' }}</p>
                                                <p class="mb-0"><i class="fa fa-envelope text-primary me-2"></i>Email:
                                                    {{ auth()->user()->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Form -->
                            <form action="{{ route('booking.process', [$boardingHouse, $room]) }}" method="POST"
                                id="payment-form">
                                @csrf
                                <div class="mb-4 mb-lg-5">
                                    <h4 class="mb-3 mb-lg-4">Informasi Sewa</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6 mb-lg-4">
                                            <label class="form-label">Tanggal Mulai</label>
                                            <div class="row g-2">
                                                <div class="col-4">
                                                    <select name="start_day" class="form-select form-select-lg" required>
                                                        <option value="">Hari</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="start_month" class="form-select form-select-lg" required>
                                                        <option value="">Bulan</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">
                                                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select name="start_year" class="form-select form-select-lg" required>
                                                        <option value="">Tahun</option>
                                                        @php
                                                            $currentYear = date('Y');
                                                            $endYear = $currentYear + 5; // Example: show current year + 5 years
                                                        @endphp
                                                        @for ($i = $currentYear; $i <= $endYear; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6 mb-lg-4">
                                            <label class="form-label">Durasi Sewa (Bulan)</label>
                                            <input type="number" name="duration" class="form-control form-control-lg"
                                                required min="1" value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 mb-lg-5">
                                    <h4 class="mb-3 mb-lg-4">Metode Pembayaran</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6 mb-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="full_payment" value="full_payment" checked>
                                                <label class="form-check-label" for="full_payment">
                                                    Bayar Penuh
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6 mb-lg-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="down_payment" value="down_payment">
                                                <label class="form-check-label" for="down_payment">
                                                    Bayar DP (50%)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 mb-lg-5">
                                    <h4 class="mb-3 mb-lg-4">Ringkasan Pembayaran</h4>
                                    <div class="border rounded p-3 p-lg-4">
                                        <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                            <span>Harga Sewa (1 bulan)</span>
                                            <span>Rp {{ number_format($room->price_per_month, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                            <span>Durasi Sewa</span>
                                            <span id="duration-display">1 bulan</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                            <span>Metode Pembayaran</span>
                                            <span id="payment-method-display">Bayar Penuh</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <strong>Total Pembayaran</strong>
                                            <strong id="total-amount">Rp
                                                {{ number_format($room->price_per_month, 0, ',', '.') }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100">Bayar Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            console.log('Payment page script loaded');

            document.addEventListener('DOMContentLoaded', function() {
                // Get all required elements
                const durationInput = document.querySelector('input[name="duration"]');
                const durationDisplay = document.getElementById('duration-display');
                const totalAmount = document.getElementById('total-amount');
                const pricePerMonth = {{ $room->price_per_month }};
                const paymentMethodInputs = document.querySelectorAll('input[name="payment_method"]');

                // Function to format currency
                function formatRupiah(number) {
                    return 'Rp ' + number.toLocaleString('id-ID');
                }

                // Function to calculate and update total
                function calculateTotal() {
                    // Get current values
                    const duration = parseInt(durationInput.value) || 1;
                    const fullPaymentRadio = document.getElementById('full_payment');
                    const downPaymentRadio = document.getElementById('down_payment');
                    const paymentMethodDisplay = document.getElementById('payment-method-display');

                    const isDownPayment = downPaymentRadio.checked;

                    // Log values for debugging
                    console.log('calculateTotal called');
                    console.log('Duration input value:', durationInput.value);
                    console.log('Parsed duration:', duration);
                    console.log('Is down payment:', isDownPayment);

                    // Calculate total
                    let total = pricePerMonth * duration;
                    if (isDownPayment) {
                        total = total * 0.5;
                    }

                    // Log calculated total
                    console.log('Calculated total:', total);

                    // Update displays immediately
                    durationDisplay.textContent = duration + ' bulan';
                    totalAmount.textContent = formatRupiah(total);

                    // Update payment method display
                    if (fullPaymentRadio.checked) {
                        paymentMethodDisplay.textContent = 'Bayar Penuh';
                    } else if (downPaymentRadio.checked) {
                        paymentMethodDisplay.textContent = 'Bayar DP (50%)';
                    }
                }

                // Add event listeners for immediate updates
                durationInput.oninput = calculateTotal;
                durationInput.onchange = calculateTotal;

                // Add event listeners for payment method changes
                paymentMethodInputs.forEach(input => {
                    input.onchange = calculateTotal;
                });

                // Set initial value and calculate
                durationInput.value = 1;
                calculateTotal();

                console.log('DOM content loaded and initial calculation triggered.');
            });
        </script>
    @endpush
@endsection
