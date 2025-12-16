@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- HEADER --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold">Daftar Pesanan Tiket KonserKU</h2>
    </div>

    {{-- FILTER --}}
    <form method="GET" class="mb-3">
        <div class="d-flex gap-2 justify-content-center">
            <select name="status" class="form-select w-auto">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="paid" {{ request('status')=='paid'?'selected':'' }}>Paid</option>
                <option value="failed" {{ request('status')=='failed'?'selected':'' }}>Failed</option>
                <option value="cancelled" {{ request('status')=='cancelled'?'selected':'' }}>Cancelled</option>
            </select>
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- TABLE --}}
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>#</th>
                        <th>Konser</th>
                        <th>Kategori</th>
                        <th>Pembeli</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                    <tr class="text-center">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->concert->title }}</td>
                        <td>{{ $order->ticketCategory->name }}</td>
                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp {{ number_format($order->total_price) }}</td>

                        {{-- STATUS --}}
                        <td>
                            @php
                                $badge = [
                                    'pending' => 'warning',
                                    'paid' => 'success',
                                    'failed' => 'danger',
                                    'cancelled' => 'secondary'
                                ];
                            @endphp

                            <span class="badge bg-{{ $badge[$order->status] }}">
                                {{ ucfirst($order->status) }}
                            </span>

                            {{-- DROPDOWN STATUS (ADMIN CONTROL) --}}
                            <form action="{{ route('admin.order.updateStatus',$order->id) }}"
                                  method="POST" class="mt-1">
                                @csrf
                                @method('PUT')
                                <select name="status"
                                        class="form-select form-select-sm"
                                        onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>
                                    <option value="paid" {{ $order->status=='paid'?'selected':'' }}>Paid</option>
                                    <option value="failed" {{ $order->status=='failed'?'selected':'' }}>Failed</option>
                                    <option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>

                        {{-- PAYMENT --}}
                        <td>
                            @if($order->payment_method == 'bank_transfer')
                                Transfer Bank
                            @elseif($order->payment_method == 'ewallet')
                                E-Wallet
                            @elseif($order->payment_method == 'qris')
                                QRIS
                            @else
                                -
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td>
                            <a href="{{ route('orders.detail',$order->id) }}"
                               class="btn btn-sm btn-info mb-1">
                                Detail
                            </a>

                            @if($order->status == 'pending')
                                <form action="{{ route('admin.order.updateStatus',$order->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="paid">
                                    <button class="btn btn-sm btn-success mb-1">
                                        Konfirmasi
                                    </button>
                                </form>

                                <form action="{{ route('admin.order.updateStatus',$order->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button class="btn btn-sm btn-danger mb-1">
                                        Batalkan
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3 text-center">
        <a href="/admin/concerts" class="btn btn-outline-primary me-2">Kelola Konser</a>
        <a href="/" class="btn btn-outline-secondary">Halaman User</a>
    </div>

</div>
@endsection
