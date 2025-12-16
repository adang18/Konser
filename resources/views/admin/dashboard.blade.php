@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: auto">

    <h1>Dashboard Admin</h1>
    <p>Selamat datang di panel admin 👋</p>

    <hr>

    <div style="display: flex; gap: 20px; flex-wrap: wrap">

        <div style="border: 1px solid #ddd; padding: 20px; width: 250px">
            <h3>Pesanan</h3>
            <p>Kelola semua pesanan tiket</p>
            <a href="/admin/orders">Lihat Pesanan</a>
        </div>

        <div style="border: 1px solid #ddd; padding: 20px; width: 250px">
            <h3>Konser</h3>
            <p>Kelola data konser</p>
            <a href="/admin/concerts">Kelola KonserKU</a>
        </div>

        <div style="border: 1px solid #ddd; padding: 20px; width: 250px">
            <h3>User</h3>
            <p>Kembali ke tampilan user</p>
            <a href="/">Halaman User</a>
        </div>

    </div>

</div>
@endsection
