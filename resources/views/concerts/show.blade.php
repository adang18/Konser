@extends('layouts.app')

@section('content')
<h1>{{ $concert->title }}</h1>
<p>Artist: {{ $concert->artist }}</p>
<p>Tanggal: {{ $concert->date }}</p>
<p>Lokasi: {{ $concert->location }}</p>
<p>{{ $concert->description }}</p>

<hr>

<h3>Pilih Tiket</h3>

<form action="/orders/checkout" method="GET">
    <input type="hidden" name="concert_id" value="{{ $concert->id }}">

    <label>Kategori Tiket:</label>
    <select name="ticket_category_id" class="form-control" required>
        @foreach($concert->ticketCategories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }} - Rp {{ number_format($cat->price) }}</option>
        @endforeach
    </select>

    <label class="mt-2">Jumlah</label>
    <input type="number" name="quantity" value="1" min="1" class="form-control">

    <button class="btn btn-success mt-3">Beli Tiket</button>
</form>
<hr>
<a href="{{ url('/admin/orders') }}" class="btn btn-secondary">Halaman User</a>
@endsection
