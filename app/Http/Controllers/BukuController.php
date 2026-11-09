<?php

namespace App\Http\Controllers;

use App\Models\Buku; 
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
    
class BukuController extends Controller
{
    public function index(Request $request)
{
    $bukus = Buku::with('kategori')->latest()->get();

    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return view('siswa.buku.index', compact('bukus'));
    }

    return view('admin.buku.index', compact('bukus'));
}
   
    public function show(Request $request, $id)
    {
   
        $buku = Buku::with('kategori')->findOrFail($id);

      
        if (auth()->check() && auth()->user()->hasRole('siswa')) {
            return view('siswa.buku.show', compact('buku'));
        }

      
        return view('admin.buku.show', compact('buku'));
    }

  
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.buku.create', compact('kategoris'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil ditambahkan.');
    }

   
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.buku.index')->with('success', 'Data buku berhasil dihapus.');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); 
    }

    public function petugasDashboard()
    {
        return view('dashboard'); 

    }
    public function cariSqlInjection(Request $request) {
    $judul = $request->input('judul');
    $result = DB::select("SELECT * FROM bukus WHERE judul = '$judul'"); // Rentan SQLi
    return response()->json($result);
    }
}