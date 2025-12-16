@extends('layouts.app')

@section('content')
<h2>Tambah Konser</h2>

<form action="{{ route('admin.concerts.store') }}" method="POST">
    @csrf

    <label>Judul Konser</label>
    <input type="text" name="title" class="form-control" required>

    <label class="mt-2">Artis</label>
    <input type="text" name="artist" class="form-control" required>

    <label class="mt-2">Tanggal</label>
    <input type="date" name="date" class="form-control" required>

    <label class="mt-2">Lokasi</label>
    <input type="text" name="location" class="form-control" required>

    <label class="mt-2">Deskripsi</label>
    <textarea name="description" class="form-control" required></textarea>

    <button class="btn btn-primary mt-3">Tambah Konser</button>
</form>
@endsection
