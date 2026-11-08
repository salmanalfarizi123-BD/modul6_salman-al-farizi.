<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return response()->json(Buku::with('kategori')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|min:3',
            'penulis' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $buku = Buku::create($validated);
        return new BukuResource($buku);
    }

    public function show($id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);
        return new BukuResource($buku);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|min:3',
            'penulis' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $buku->update($validated);
        return new BukuResource($buku);
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return response()->json([
            'message' => 'Buku berhasil dihapus'
        ], 200);
    }
}