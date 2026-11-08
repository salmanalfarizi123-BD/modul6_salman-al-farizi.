<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Katalog Daftar Buku Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-6 border border-blue-100">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-blue-950">Daftar Koleksi Buku Tersedia</h3>
                </div>

                <div class="overflow-x-auto rounded-xl border border-blue-100 shadow-sm">
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead>
                            <tr>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Judul Buku</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Penulis</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Tahun Terbit</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
                            @forelse($bukus as $buku)
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-950">{{ $buku->judul }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->kategori->nama ?? 'Umum' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->penulis ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->tahun_terbit ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <!-- Pastikan mengarah ke route buku.show yang menghasilkan URL /buku/{id} -->
                                     <a href="{{ route('buku.show', $buku->id) }}" class="bg-blue-50 text-blue-900 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                      Lihat Detail
                                     </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data buku di dalam katalog.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>