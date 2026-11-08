<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>

    <!-- Memanggil CSS & JS Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <header>
        <h1>Perpustakaan Literasi Kita</h1>
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('buku.index') }}">Daftar Buku</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>bonces612@gmail.com</p>
    </footer>

</body>
</html>