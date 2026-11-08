<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Kategori;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $dataAwal = [
            ['judul' => 'Cosmos', 'penulis' => 'Carl Sagan', 'tahun_terbit' => 1980, 'kategori' => 'Sains Populer'],
            ['judul' => 'Filosofi Teras', 'penulis' => 'Daniel Kahneman', 'tahun_terbit' => 2011, 'kategori' => 'Psikologi'],
            ['judul' => 'Laut Bercerita', 'penulis' => 'Leila S. Chudori', 'tahun_terbit' => 2017, 'kategori' => 'Fiksi Sejarah'],
            ['judul' => 'Gadis Kretek', 'penulis' => 'Ratih Kumala', 'tahun_terbit' => 2012, 'kategori' => 'Fiksi Sejarah'],
            ['judul' => 'Psychology of Money', 'penulis' => 'Morgan Housel', 'tahun_terbit' => 2020, 'kategori' => 'Keuangan Pribadi'],
        ];

        foreach ($dataAwal as $buku) {
            $kategori = Kategori::where('nama', $buku['kategori'])->first();
            
            // Menggunakan firstOrCreate agar data yang sama tidak diinput dua kali berdasarkan 'judul'
            Buku::firstOrCreate(
                ['judul' => $buku['judul']], // Kondisi unik yang dicek
                [
                    'kategori_id' => $kategori ? $kategori->id : 1,
                    'penulis' => $buku['penulis'],
                    'tahun_terbit' => $buku['tahun_terbit'],
                ]
            );
        }
    }
}