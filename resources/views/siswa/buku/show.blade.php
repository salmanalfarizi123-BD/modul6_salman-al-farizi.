<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-8 border border-blue-100">
                <h3 class="text-2xl font-bold text-blue-950 mb-2">{{ $buku->judul }}</h3>
                <p class="text-gray-600 mb-4">Penulis: {{ $buku->penulis }}</p>
                <p class="text-gray-600 mb-4">Tahun Terbit: {{ $buku->tahun_terbit }}</p>
                <p class="text-gray-600 mb-6">Kategori: {{ $buku->kategori->nama ?? 'Umum' }}</p>

                <a href="{{ route('buku.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold px-4 py-2 rounded-lg">
                    &larr; Kembali ke Daftar Buku
                </a>
            </div>
        </div>
    </div>
</x-app-layout>