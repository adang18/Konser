@extends('layouts.app')

@section('content')
<style>
    .concert-page {
        background: #0d0f1a;
        color: white;
        min-height: 100vh;
        padding-bottom: 50px;
        font-family: 'Poppins', sans-serif;
    }

    .concert-title {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 30px;
        background: linear-gradient(90deg, #00e1ff, #ff22e6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .concert-card {
        padding: 25px;
        border-radius: 16px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        transition: 0.3s;
        margin-bottom: 22px;
    }

    .concert-card:hover {
        transform: translateY(-6px);
        background: rgba(255,255,255,0.15);
    }

    .concert-card p {
        margin-bottom: 6px;
        opacity: 0.9;
    }

    .btn-detail {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        border: none;
        color: white;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-detail:hover {
        transform: scale(1.05);
        filter: brightness(1.2);
        color: white;
    }
</style>

<div class="concert-page">
    <div class="container pt-5">
        <h2 class="concert-title">🎵 Daftar Konser</h2>

        @foreach($concerts as $concert)
        <div class="concert-card">
            <h3>{{ $concert->title }}</h3>
            <p>{{ $concert->artist }} – {{ $concert->location }}</p>
            <p>
                <i class="bi bi-calendar-event"></i>
                {{ \Carbon\Carbon::parse($concert->date)->format('d M Y') }}
            </p>
            <a href="{{ route('concerts.show', $concert->id) }}" class="btn-detail">
                Lihat Detail
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
