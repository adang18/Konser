@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 40px auto; padding: 25px; border: 1px solid #ddd; border-radius: 10px; background: #fff;">
    
    <h2 style="margin-bottom: 20px;">Detail Pesanan</h2>

    <div style="line-height: 1.8; font-size: 16px;">
        <p><strong>Nama:</strong> {{ $order->buyer_name }}</p>
        <p><strong>Email:</strong> {{ $order->buyer_email }}</p>
        <p><strong>No. Telp:</strong> {{ $order->buyer_phone }}</p>
        <p><strong>Acara:</strong> {{ $order->concert->title }}</p>
        <p><strong>Kategori Tiket:</strong> {{ $order->ticketCategory->name }}</p>
        <p><strong>Jumlah:</strong> {{ $order->quantity }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method ?? '-' }}</p>
        <p><strong>Total Bayar:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

        @if($order->status === 'pending')
            <p><strong>Status:</strong> <span style="color: orange;">Menunggu Pembayaran</span></p>
        @elseif($order->status === 'paid')
            <p><strong>Status:</strong> <span style="color: green;">Sudah Dibayar</span></p>
        @else
            <p><strong>Status:</strong> {{ $order->status }}</p>
        @endif

        @if($order->payment_proof)
            <p><strong>Bukti Pembayaran:</strong></p>
            <img src="{{ asset('storage/' . $order->payment_proof) }}" 
                 style="width: 100%; max-width: 300px; border-radius: 8px; margin-top: 10px;">
        @endif
    </div>

    <div style="margin-top: 25px;">
        <a href="{{ url()->previous() }}" style="color: #4A60E3;">Kembali</a>
    </div>
</div>
@endsection