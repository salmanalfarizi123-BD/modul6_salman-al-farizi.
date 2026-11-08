<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
         
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden shadow-md sm:rounded-xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-blue-100 text-sm md:text-base">
                    Anda masuk sebagai <span class="font-semibold uppercase bg-blue-800 px-2.5 py-0.5 rounded text-xs">{{ Auth::user()->getRoleNames()->first() ?? 'User' }}</span>. Kelola data buku, peminjaman, dan pengembalian perpustakaan dengan mudah melalui panel navigasi di atas.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Kelola Buku -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Manajemen Buku</div>
                        <p class="text-gray-500 text-sm">Kelola daftar buku perpustakaan, tambah koleksi baru, dan perbarui data via REST API.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url('/admin/buku') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Kelola Buku &rarr;
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Data Peminjaman</div>
                        <p class="text-gray-500 text-sm">Pantau daftar buku yang sedang dipinjam oleh anggota atau siswa secara real-time.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url('/admin/peminjaman') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Lihat Peminjaman &rarr;
                        </a>
                    </div>
                </div>


                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Pengembalian Buku</div>
                        <p class="text-gray-500 text-sm">Proses pengembalian buku dan catat status denda atau riwayat peminjaman selesai.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ url('/admin/pengembalian') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Proses Pengembalian &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>