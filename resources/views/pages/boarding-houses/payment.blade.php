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
                            @if (isset($snapToken))
                                <div class="alert alert-info">
                                    Silakan selesaikan pembayaran Anda menggunakan metode pembayaran yang tersedia di bawah
                                    ini.
                                </div>

                                <div class="border rounded p-3 p-lg-4 mb-4">
                                    <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                        <span>Kode Transaksi</span>
                                        <span>{{ $transaction->code }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                        <span>Harga Sewa (1 bulan)</span>
                                        <span>Rp {{ number_format($room->price_per_month, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                        <span>Durasi Sewa</span>
                                        <span>{{ $transaction->duration }} bulan</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 mb-lg-3">
                                        <span>Metode Pembayaran</span>
                                        <span>{{ $transaction->payment_method === 'full_payment' ? 'Bayar Penuh' : 'Bayar DP (50%)' }}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <strong>Total Pembayaran</strong>
                                        <strong>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</strong>
                                    </div>
                                </div>

                                <button id="pay-button" class="btn btn-primary btn-lg w-100">Bayar Sekarang</button>
                            @else
                                <form
                                    action="{{ route('booking.process', ['boardingHouse' => $boardingHouse->slug, 'room' => $room->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                            id="start_date" name="start_date" value="{{ old('start_date') }}"
                                            min="{{ date('Y-m-d') }}">
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="duration" class="form-label">Durasi Sewa (bulan)</label>
                                        <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                            id="duration" name="duration" value="{{ old('duration', 1) }}" min="1">
                                        @error('duration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Metode Pembayaran</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="full_payment" value="full_payment"
                                                {{ old('payment_method') === 'full_payment' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="full_payment">
                                                Bayar Penuh
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method"
                                                id="down_payment" value="down_payment"
                                                {{ old('payment_method') === 'down_payment' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="down_payment">
                                                Bayar DP (50%)
                                            </label>
                                        </div>
                                        @error('payment_method')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="border rounded p-3 p-lg-4 mb-4">
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

                                    <button type="submit" class="btn btn-primary btn-lg w-100">Lanjut ke
                                        Pembayaran</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($snapToken))
        <script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            document.getElementById('pay-button').onclick = function() {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        window.location.href = '{{ route('booking.success', $transaction) }}';
                    },
                    onPending: function(result) {
                        window.location.href = '{{ route('booking.success', $transaction) }}';
                    },
                    onError: function(result) {
                        alert('Pembayaran gagal!');
                    },
                    onClose: function() {
                        alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                    }
                });
            };
        </script>
    @else
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const durationInput = document.getElementById('duration');
                    const durationDisplay = document.getElementById('duration-display');
                    const totalAmount = document.getElementById('total-amount');
                    const paymentMethodInputs = document.querySelectorAll('input[name="payment_method"]');
                    const paymentMethodDisplay = document.getElementById('payment-method-display');
                    const pricePerMonth = {{ $room->price_per_month }};

                    function formatRupiah(amount) {
                        return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }

                    function calculateTotal() {
                        const duration = parseInt(durationInput.value) || 1;
                        let total = pricePerMonth * duration;

                        // Check which payment method is selected
                        const fullPaymentRadio = document.getElementById('full_payment');
                        const downPaymentRadio = document.getElementById('down_payment');

                        if (downPaymentRadio.checked) {
                            total = total * 0.5; // 50% for down payment
                        }

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
                });
            </script>
        @endpush
    @endif
@endsection
