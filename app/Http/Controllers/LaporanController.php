<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
       
        $laporans = Peminjaman::with(['user', 'buku'])->latest()->get();

        // Menghitung statistik lengkap untuk ditampilkan di view laporan
        $totalBuku = Buku::count();
        $totalPeminjaman = Peminjaman::count();
        $totalSiswa = User::role('siswa')->count();
        $totalPengguna = User::count(); 

        return view('admin.laporan.index', compact(
            'laporans', 
            'totalBuku', 
            'totalPeminjaman', 
            'totalSiswa', 
            'totalPengguna'
        ));
    }
}