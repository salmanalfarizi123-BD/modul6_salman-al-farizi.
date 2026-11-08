<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = ['Sains Populer', 'Psikologi', 'Fiksi Sejarah', 'Keuangan Pribadi', 'Teknologi'];
        foreach ($kategoris as $kategori) {
            Kategori::create(['nama' => $kategori]);
        }
    }
}