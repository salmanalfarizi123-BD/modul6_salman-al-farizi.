<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Manajemen Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-6 border border-blue-100">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto rounded-xl border border-blue-100 shadow-sm">
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead>
                            <tr>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Peminjam (Siswa)</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Judul Buku</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Tanggal Pinjam</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
                            @forelse($peminjamans as $item)
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-950">{{ $item->user->name ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->buku->judul ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $item->tanggal_pinjam ?? $item->created_format ?? $item->created_at->toDateString() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $item->status == 'Dipinjam' ? 'bg-yellow-100 text-yellow-800' : ($item->status == 'Dikembalikan' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') }}">
                                            {{ $item->status ?? 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form action="{{ route('admin.peminjaman.updateStatus', $item->id) }}" method="POST" class="inline-flex space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="text-xs rounded border-blue-200 p-1">
                                                <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Dipinjam" {{ $item->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                                <option value="Dikembalikan" {{ $item->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                                <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-3 py-1 rounded text-xs font-semibold shadow transition">Ubah</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data peminjaman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>