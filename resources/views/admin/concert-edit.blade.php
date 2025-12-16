@extends('layouts.app')

@section('content')
<h2>Edit Konser</h2>

<form action="{{ route('admin.concerts.update', $concert->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Judul Konser</label>
        <input type="text" name="title" class="form-control" value="{{ $concert->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Artis</label>
        <input type="text" name="artist" class="form-control" value="{{ $concert->artist }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="date" class="form-control" value="{{ $concert->date }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" value="{{ $concert->location }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="5" required>{{ $concert->description }}</textarea>
    </div>

    <button class="btn btn-success">Simpan Perubahan</button>
    <a href="{{ route('admin.concerts') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
