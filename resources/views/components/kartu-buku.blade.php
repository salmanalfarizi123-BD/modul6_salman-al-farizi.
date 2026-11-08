@props(['id', 'judul', 'penulis', 'tahun'])

<div class="book-card">
    <div>
        {{ $badge ?? '' }}
        <h3>{{ $judul }}</h3>
        <p><strong>Penulis:</strong> {{ $penulis }}</p>
        <p><strong>Tahun:</strong> {{ $tahun }}</p>
    </div>
    <div>
        <a href="{{ route('buku.show', $id) }}" class="btn">Lihat Detail</a>
    </div>
</div>