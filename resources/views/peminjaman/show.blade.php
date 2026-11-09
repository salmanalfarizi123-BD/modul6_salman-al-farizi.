<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <h3 class="text-lg font-bold mb-4">Informasi Transaksi Peminjaman #{{ $peminjaman->id }}</h3>

                <div class="mb-3">
                    <strong>ID Peminjaman:</strong> {{ $peminjaman->id }}
                </div>
                <div class="mb-3">
                    <strong>ID User / Peminjam:</strong> {{ $peminjaman->user_id ?? '-' }}
                </div>
                <div class="mb-3">
                    <strong>ID Buku:</strong> {{ $peminjaman->buku_id ?? '-' }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> {{ $peminjaman->status ?? 'Dipinjam' }}
                </div>

                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-600 text-white text-sm rounded-md hover:bg-gray-700">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>