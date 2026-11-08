<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Dashboard Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
    
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden shadow-md sm:rounded-xl p-8 text-white">
                <h3 class="text-2xl font-bold mb-2">Halo, {{ Auth::user()->name }}!</h3>
                <p class="text-blue-100 text-sm md:text-base">
                    Selamat datang di panel Siswa Perpustakaan Literasi Kita. Anda dapat melihat daftar katalog buku dan mengajukan peminjaman buku dengan mudah.
                </p>
            </div>

         
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
          
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Katalog Buku</div>
                        <p class="text-gray-500 text-sm">Jelajahi seluruh koleksi buku perpustakaan yang tersedia.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('buku.index') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Lihat Daftar Buku &rarr;
                        </a>
                    </div>
                </div>

      
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Pinjam Buku</div>
                        <p class="text-gray-500 text-sm">Ajukan peminjaman buku baru secara mandiri dari katalog.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('siswa.peminjaman.create') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Form Peminjaman &rarr;
                        </a>
                    </div>
                </div>

                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Riwayat Peminjaman</div>
                        <p class="text-gray-500 text-sm">Lihat status dan riwayat buku yang pernah Anda pinjam.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('siswa.riwayat') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Lihat Riwayat &rarr;
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-blue-100 flex flex-col justify-between">
                    <div>
                        <div class="text-blue-900 font-semibold text-lg mb-1">Profil Akun</div>
                        <p class="text-gray-500 text-sm">Kelola informasi akun dan periksa status profil Anda.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-900 hover:bg-blue-800 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow">
                            Edit Profil &rarr;
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>