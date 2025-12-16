@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- JUDUL --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Kelola Konser</h2>

        <a href="{{ route('admin.concerts.create') }}" class="btn btn-success">
            + Tambah Konser
        </a>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($concerts as $concert)
                    <tr class="text-center">
                        <td>{{ $concert->id }}</td>
                        <td class="fw-semibold">{{ $concert->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($concert->date)->format('d M Y') }}</td>
                        <td>{{ $concert->location }}</td>
                        <td>
                            <a href="{{ url('/admin/concert/' . $concert->id . '/categories') }}"
                               class="btn btn-sm btn-outline-info">
                                Kategori
                            </a>

                            <a href="{{ route('admin.concerts.edit', $concert->id) }}"
                               class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>

                            <form action="{{ route('admin.concerts.destroy', $concert->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Yakin ingin menghapus konser ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Belum ada data konser
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    {{-- NAV --}}
    <div class="mt-4">
        <a href="/admin/orders" class="btn btn-primary me-2">Daftar Pesanan</a>
        <a href="/" class="btn btn-secondary">Halaman User</a>
    </div>

</div>
@endsection
