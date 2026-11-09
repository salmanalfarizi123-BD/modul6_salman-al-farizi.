<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Tambahkan Facade Gate
use App\Models\User;               // <-- Tambahkan Model User

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // === SOAL 3: Definisi Gate kelola-buku ===
        // Hanya mengizinkan role 'admin' dan 'petugas' untuk mengelola buku
        Gate::define('kelola-buku', function (User $user) {
            return $user->hasRole(['admin', 'petugas']);
        });
    }
}