<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // 👇 Tambahkan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 👇 Pastikan relasi ke model Buku juga ada
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}