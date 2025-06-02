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
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </div>
        <div class="navbar-right">
            <div class="search-container">
                <input type="text" placeholder="Search...">
            </div>
            <div class="profile">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture">
            </div>
        </div>
    </nav>
    <div class="container-navbar">
        <nav class="navbar-kedua">
            <ul class="kategori">
                @foreach (range(1,6) as $item)
                    <li><a href="#">Sport</a></li>
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
