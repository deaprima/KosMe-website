@extends('layouts.app')

@section('content')
    <div class="py-5 container-xxl">
        <div class="container-custom">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <div class="p-4 text-center border rounded">
                            <div class="mb-4">
                                <i class="fa fa-check-circle text-success" style="font-size: 64px;"></i>
                            </div>
                            <h2 class="mb-4">Pemesanan Berhasil!</h2>
                            <p class="mb-4">Terima kasih telah melakukan pemesanan. Berikut adalah detail pemesanan Anda:
                            </p>

                            <div class="p-4 mb-4 border rounded">
                                <div class="row">
                                    <div class="col-md-6 text-start">
                                        <p class="mb-2"><strong>Kode Transaksi:</strong></p>
                                        <p class="mb-2"><strong>Kost:</strong></p>
                                        <p class="mb-2"><strong>Kamar:</strong></p>
                                        <p class="mb-2"><strong>Tanggal Mulai:</strong></p>
                                        <p class="mb-2"><strong>Durasi:</strong></p>
                                        <p class="mb-2"><strong>Metode Pembayaran:</strong></p>
                                        <p class="mb-2"><strong>Total Pembayaran:</strong></p>
                                    </div>
                                    <div class="col-md-6 text-start">
                                        <p class="mb-2">{{ $transaction->code }}</p>
                                        <p class="mb-2">{{ $transaction->boardingHouse->name }}</p>
                                        <p class="mb-2">{{ $transaction->room->name }}</p>
                                        <p class="mb-2">{{ $transaction->start_date->format('d F Y') }}</p>
                                        <p class="mb-2">{{ $transaction->duration }} bulan</p>
                                        <p class="mb-2">
                                            {{ $transaction->payment_method === 'full_payment' ? 'Bayar Penuh' : 'Bayar DP (30%)' }}
                                        </p>
                                        <p class="mb-2">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
