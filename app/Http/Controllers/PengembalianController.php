<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])->where('status', 'Dipinjam')->get();
        return view('admin.pengembalian.index', compact('peminjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);
        $peminjaman->update([
            'status' => 'Dikembalikan',
            'tanggal_kembali' => now(),
        ]);

        return redirect()->route('admin.pengembalian.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}