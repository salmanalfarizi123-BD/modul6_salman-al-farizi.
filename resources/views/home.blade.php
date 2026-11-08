@extends('layouts.main')

@section('title', 'Beranda - Perpustakaan')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; min-height: 50vh;">
        <div class="detail-box">
            <h2>Selamat Datang di Perpustakaan Literasi</h2>
            <p>Aplikasi ini menyediakan katalog buku digital yang dapat Anda jelajahi. Silakan menuju ke halaman <strong>Daftar Buku</strong> untuk melihat koleksi kami.</p>
            <a href="{{ route('buku.index') }}" class="btn">Jelajahi Koleksi Buku</a>
        </div>
    </div>
@endsection