@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Detail Pesanan</h4>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Nama:</strong> {{ $order->buyer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->buyer_email }}</p>
                    <p><strong>No. Telp:</strong> {{ $order->buyer_phone }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Acara:</strong> {{ $order->concert->title }}</p>
                    <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
                    <p><strong>Total Bayar:</strong>
                        <span class="fw-bold text-success">
                            Rp {{ number_format($order->total_price) }}
                        </span>
                    </p>
                </div>
            </div>

            <hr>

            <p>
                <strong>Status:</strong>
                @php
                    $badge = [
                        'pending' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                        'cancelled' => 'secondary',
                    ];
                @endphp

                <span class="badge bg-{{ $badge[$order->status] }}">
                    {{ strtoupper($order->status) }}
                </span>
            </p>

            <p>
                <strong>Metode Pembayaran:</strong>
                {{ strtoupper($order->payment_method ?? '-') }}
            </p>

            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
