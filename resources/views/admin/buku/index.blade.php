<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Manajemen Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-6 border border-blue-100">
                
                <!-- Notifikasi Pesan Sukses -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Notifikasi Error Validasi -->
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulir Tambah / Ubah Buku (Hanya muncul jika punya izin kelola buku) -->
                @can('kelola data buku')
                <div class="card mb-6 p-5 border border-blue-200 rounded-xl bg-blue-50/50 shadow-sm">
                    <span class="text-lg font-semibold text-blue-900 mb-3 block" id="form-title">Tambah Buku Baru</span>
                    
                    {{-- Form diarahkan ke store secara default --}}
                    <form id="buku-form" action="{{ route('admin.buku.store') }}" method="POST">
                        @csrf
                        <div id="method-container"></div>
                        <input type="hidden" id="buku-id">

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-blue-900 mb-1">Kategori ID</label>
                            <input type="number" name="kategori_id" id="kategori_id" value="{{ old('kategori_id') }}" class="mt-1 block w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-blue-900 mb-1">Judul Buku</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="mt-1 block w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-blue-900 mb-1">Penulis</label>
                            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" class="mt-1 block w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-blue-900 mb-1">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}" class="mt-1 block w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>
                        <div class="flex space-x-2">
                            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2 px-5 rounded-lg shadow transition" id="submit-btn">Simpan Data</button>
                            <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-5 rounded-lg shadow hidden transition" id="cancel-btn" onclick="resetForm()">Batal</button>
                        </div>
                    </form>
                </div>
                @endcan

                <!-- Tabel Data Buku -->
                <div class="overflow-x-auto rounded-xl border border-blue-100 shadow-sm">
                    <table class="min-w-full divide-y divide-blue-100">
                        <thead>
                            <tr>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Penulis</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Tahun Terbit</th>
                                <th class="px-6 py-3.5 bg-blue-900 text-white text-left text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-50">
                            @forelse($bukus as $buku)
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->kategori->nama ?? 'Umum' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-blue-900">{{ $buku->judul }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->penulis }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $buku->tahun_terbit }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <button type="button" class="bg-blue-900 hover:bg-blue-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow transition" onclick="editBuku({{ $buku->id }}, {{ $buku->kategori_id }}, '{{ addslashes($buku->judul) }}', '{{ addslashes($buku->penulis) }}', {{ $buku->tahun_terbit }})">Ubah</button>
                                        <form action="{{ route('admin.buku.destroy', $buku->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-semibold shadow transition">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data buku tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Script Pendukung untuk Mode Edit -->
    <script>
    function editBuku(id, kategori_id, judul, penulis, tahun_terbit) {
        const form = document.getElementById('buku-form');
        form.action = `/admin/buku/${id}`;
        
        document.getElementById('method-container').innerHTML = '@method("PUT")';
        document.getElementById('buku-id').value = id;
        document.getElementById('kategori_id').value = kategori_id;
        document.getElementById('judul').value = judul;
        document.getElementById('penulis').value = penulis;
        document.getElementById('tahun_terbit').value = tahun_terbit;
        
        document.getElementById('form-title').innerText = 'Ubah Data Buku';
        document.getElementById('submit-btn').innerText = 'Perbarui Data';
        document.getElementById('cancel-btn').classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function resetForm() {
        const form = document.getElementById('buku-form');
        form.action = "{{ route('admin.buku.store') }}";
        
        document.getElementById('method-container').innerHTML = '';
        form.reset();
        document.getElementById('buku-id').value = '';
        document.getElementById('form-title').innerText = 'Tambah Buku Baru';
        document.getElementById('submit-btn').innerText = 'Simpan Data';
        document.getElementById('cancel-btn').classList.add('hidden');
    }
    </script>
</x-app-layout>