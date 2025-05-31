@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">Riwayat Transaksi</h4>
                    </div>
                    <div class="card-body">
                        @if ($transactions->isEmpty())
                            <div class="text-center py-5">
                                <i class="fas fa-history fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada riwayat transaksi</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kode Transaksi</th>
                                            <th>Kos</th>
                                            <th>Kamar</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Durasi</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->code }}</td>
                                                <td>{{ $transaction->boardingHouse->name }}</td>
                                                <td>{{ $transaction->room->name }}</td>
                                                <td>{{ $transaction->start_date->format('d/m/Y') }}</td>
                                                <td>{{ $transaction->duration }} Bulan</td>
                                                <td>Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($transaction->payment_status === 'pending')
                                                        <span class="badge bg-warning">Menunggu Pembayaran</span>
                                                    @elseif($transaction->payment_status === 'paid')
                                                        <span class="badge bg-success">Lunas</span>
                                                    @else
                                                        <span class="badge bg-danger">Gagal</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $transactions->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
