@extends('layouts.main')

@section('title', 'Detail Buku - Perpustakaan')

@section('content')
    @if (!$buku)
        <div class="alert-error">
            <h3>Buku Tidak Ditemukan</h3>
            <p>Maaf, buku dengan ID tersebut tidak ada dalam sistem kami.</p>
            <a href="{{ route('buku.index') }}" class="btn">Kembali ke Daftar Buku</a>
        </div>
    @else
        <div class="detail-box">
            <h2>{{ $buku['judul'] }}</h2>
            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 1rem 0;">
            <p><strong>ID Buku:</strong> {{ $buku['id'] }}</p>
            <p><strong>Penulis:</strong> {{ $buku['penulis'] }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $buku['tahun_terbit'] }}</p>
            <p><strong>Kategori:</strong> <span class="badge">{{ $buku['kategori'] }}</span></p>

            <div style="margin-top: 1.5rem;">
                <a href="{{ route('buku.index') }}" class="btn" style="background-color: #475569;">Kembali ke Daftar Buku</a>
            </div>
        </div>
    @endif
@endsection