<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kategori-selection.css') }}">
    <title>Pilih Kategori</title>
</head>
<body>
    <nav class="navbar">
        <div class="Nama">
            <a href="{{ route('homepage') }}" class="nama1">
                <h1>Portal</h1>
            </a>
            <a href="{{ route('homepage') }}" class="nama2">
                <h1>Berita</h1>
            </a>
        </div>
        <div class="navbar-right">
            <div class="search-container">
                <form action="{{ route('berita.cari') }}" method="GET" id="search-form">
                    <input type="text" id="search-input" name="query" placeholder="Search...">
                </form>
                <div id="search-results" class="search-results"></div>
            </div>
            <div class="profile">
                @auth
                    <a href="{{ route('profile') }}" class="btn-login">Profile</a>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container-navbar">
        <nav class="navbar-kedua">
            <ul class="kategori">
                @foreach (config('kategori') as $key => $label)
                    <li><a href="#">{{ $label }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
    <main class="pilih-kategori">
        <h1 class="teks1">
            Pilih Kategori Berita Kesukaanmu
        </h1>
        <h2 class="teks2">
            Untuk Personalisasi feed kamu
        </h2>
        <ul class="list-1">
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
        </ul>
        <ul class="list-2">
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
            <li><a href="#">Sport</a></li>
        </ul>
        <div class="container-btn">
            <button type="submit" class="btn">Pilih</button>
        </div>
    </main>
</body>
</html>
