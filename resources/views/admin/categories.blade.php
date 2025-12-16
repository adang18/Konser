@extends('layouts.app')

@section('content')
<h2>Tambah Kategori Tiket – {{ $concert->title }}</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.categories.store', $concert->id) }}" method="POST">
    @csrf

    <label class="mt-2">Nama Kategori</label>
    <input type="text" name="name" class="form-control" required>

    <label class="mt-2">Harga</label>
    <input type="number" name="price" class="form-control" required>

    <label class="mt-2">Stok</label>
    <input type="number" name="stock" class="form-control" required>

    <button class="btn btn-primary mt-3">Tambah Kategori</button>
</form>


<hr>

<h4>Daftar Kategori</h4>
<table class="table table-bordered mt-3">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
    </tr>
    
    @foreach($concert->ticketCategories as $cat)
    <tr>
        <td>{{ $cat->name }}</td>
        <td>Rp {{ number_format($cat->price) }}</td>
        <td>{{ $cat->stock }}</td>
    </tr>
    @endforeach
</table>
<hr>

<a href="{{ url('/admin/orders') }}" class="btn btn-primary mt-3">Halaman User</a>
@endsection
