<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perpustakaan Literasi Kita</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts (Tailwind CSS via Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-blue-50/50 text-gray-800 font-sans min-h-screen flex flex-col justify-between">

        <!-- Header / Navbar -->
        <header class="w-full bg-white border-b border-blue-100 shadow-sm py-4 px-6 md:px-12 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <h1 class="text-lg md:text-xl font-bold text-blue-950">Perpustakaan Literasi Kita</h1>
            </div>
            
            <div class="space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-900 hover:bg-blue-800 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-900 hover:text-blue-700 px-4 py-2 text-sm font-semibold transition">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-blue-900 hover:bg-blue-800 text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow transition">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-grow flex items-center justify-center px-6 py-12">
            <div class="max-w-4xl mx-auto text-center space-y-6">
                <span class="bg-blue-100 text-blue-900 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">
                    Sistem Manajemen Perpustakaan Modern
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-blue-950 leading-tight">
                    Jelajahi Dunia Lewat Membaca <br class="hidden md:inline"> Bersama <span class="text-blue-700">Literasi Kita</span>
                </h2>
                <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
                    Platform digital terpadu untuk pencarian katalog buku, pengajuan peminjaman mandiri, dan pengelolaan perpustakaan secara cepat, transparan, dan efisien.
                </p>

                <!-- Action Buttons -->
                <div class="flex justify-center space-x-4 pt-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-xl shadow-lg transition text-base">
                            Masuk ke Dashboard &rarr;
                        </a>
                    @else
                        
                        @if (Route::has('register'))

                        @endif
                    @endauth
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-blue-100 py-6 text-center text-xs text-gray-500">
            bonces612@gmail.com
        </footer>

    </body>
</html>