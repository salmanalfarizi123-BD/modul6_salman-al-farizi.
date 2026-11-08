<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Form Pengajuan Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-8 border border-blue-100">
                
                <form action="{{ route('siswa.peminjaman.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-blue-950 mb-1">Pilih Buku yang Ingin Dipinjam</label>
                        <select name="buku_id" class="w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach($bukus as $buku)
                                <option value="{{ $buku->id }}">{{ $buku->judul }} (Penulis: {{ $buku->penulis ?? '-' }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 text-xs text-blue-900">
                        <strong>Catatan:</strong> Setelah Anda mengajukan peminjaman, status buku akan menjadi *Pending* dan perlu divalidasi oleh petugas/admin perpustakaan.
                    </div>

                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg shadow transition">Ajukan Peminjaman</button>
                        <a href="{{ route('siswa.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2.5 px-6 rounded-lg shadow transition">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>