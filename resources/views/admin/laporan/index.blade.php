<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Laporan & Statistik Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Statistik Ringkas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-blue-100">
                    <div class="text-gray-500 text-sm font-medium">Total Koleksi Buku</div>
                    <div class="text-3xl font-bold text-blue-950 mt-1">{{ $totalBuku }}</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-blue-100">
                    <div class="text-gray-500 text-sm font-medium">Total Riwayat Peminjaman</div>
                    <div class="text-3xl font-bold text-blue-950 mt-1">{{ $totalPeminjaman }}</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-blue-100">
                    <div class="text-gray-500 text-sm font-medium">Total Pengguna Terdaftar</div>
                    <div class="text-3xl font-bold text-blue-950 mt-1">{{ $totalPengguna }}</div>
                </div>
            </div>

            <!-- Tabel Riwayat Laporan -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-6 border border-blue-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-blue-950">Rekapitulasi Aktivitas Peminjaman</h3>
                    
                </div>

                <div class="overflow-x-auto rounded-xl border border-blue-100 shadow-sm">
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead>
                            <tr>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Peminjam</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Judul Buku</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Tanggal Pinjam</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Status Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
                            @forelse($laporans as $lap)
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-950">{{ $lap->user->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $lap->buku->judul ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $lap->created_at->toDateString() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $lap->status == 'Dipinjam' ? 'bg-yellow-100 text-yellow-800' : ($lap->status == 'Dikembalikan' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $lap->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data laporan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>




