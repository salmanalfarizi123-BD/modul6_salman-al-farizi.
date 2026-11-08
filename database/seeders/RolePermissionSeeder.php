<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    
        $permissions = [
            'akses dashboard admin',
            'akses dashboard petugas',
            'lihat daftar buku',
            'kelola data buku',
            'kelola data pengguna',
            'kelola role pengguna',
            'kelola peminjaman',
            'kelola pengembalian',
            'mengajukan peminjaman buku',
            'memproses persetujuan peminjaman',
            'mencatat pengembalian buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat laporan perpustakaan',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

   
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $petugasRole = Role::firstOrCreate(['name' => 'petugas']);
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);

   
        $adminRole->givePermissionTo(Permission::all());

        
        $petugasRole->givePermissionTo([
            'akses dashboard petugas',
            'lihat daftar buku',
            'kelola data buku',
            'kelola peminjaman',
            'kelola pengembalian',
            'memproses persetujuan peminjaman',
            'mencatat pengembalian buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat laporan perpustakaan',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ]);

      
        $siswaRole->givePermissionTo([
            'lihat daftar buku',
            'mengajukan peminjaman buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ]);

    
        $admin = User::firstOrCreate(['email' => 'admin@perpustakaan.com'], [
            'name' => 'Administrator', 'password' => Hash::make('password')
        ]);
        $admin->assignRole($adminRole);

        $petugas = User::firstOrCreate(['email' => 'petugas@perpustakaan.com'], [
            'name' => 'Petugas Perpustakaan', 'password' => Hash::make('password')
        ]);
        $petugas->assignRole($petugasRole);

        $siswa = User::firstOrCreate(['email' => 'siswa@perpustakaan.com'], [
            'name' => 'salman al farizi', 'password' => Hash::make('password')
        ]);
        $siswa->assignRole($siswaRole);
    }
}