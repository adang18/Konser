@extends('layout')

@section('content')
<div class="container mt-4">

    <h3>Upload Bukti Pembayaran</h3>

    <form action="/order/{{ $order->id }}/upload-proof" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="payment_proof" class="form-control mb-3" required>

        <button class="btn btn-success w-100">Upload</button>
    </form>

    <p class="mt-3 text-muted">Setelah upload, tunggu admin konfirmasi ya!</p>

</div>
@endsection
