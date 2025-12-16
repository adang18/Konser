@extends('layouts.app')

@section('content')
<h1>Checkout</h1>

<p><b>Konser:</b> {{ $concert->title }}</p>
<p><b>Kategori:</b> {{ $category->name }}</p>
<p><b>Jumlah:</b> {{ $qty }}</p>
<p><b>Total Harga:</b> Rp {{ number_format($total) }}</p>

<hr>

<form action="{{ route('orders.complete') }}" method="POST">
    @csrf

    <input type="hidden" name="concert_id" value="{{ $concert->id }}">
    <input type="hidden" name="ticket_category_id" value="{{ $category->id }}">
    <input type="hidden" name="quantity" value="{{ $qty }}">

    <label>Nama Lengkap</label>
    <input type="text" name="buyer_name" class="form-control" required>

    <label class="mt-2">Email</label>
    <input type="email" name="buyer_email" class="form-control" required>

    <label class="mt-2">No. Telp</label>
    <input type="text" name="buyer_phone" class="form-control" required>

    <label class="mt-3">Metode Pembayaran</label>
    <select name="payment_method" class="form-select" required>
        <option value="">-- Pilih Metode Pembayaran --</option>
        <option value="bank_transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet (OVO, Dana, Gopay)</option>
        <option value="qris">QRIS</option>
    </select>

    <button class="btn btn-primary mt-3">Selesaikan Pesanan</button>
</form>



@endsection
