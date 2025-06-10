<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <title>Homepage Portal Berita</title>
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
    <div class="not-found-wrapper">
        <div class="not-found">
            <i class='bx bx-error-circle'></i>
            <h2>Kami tidak menemukan halaman yang Anda cari</h2>
            <p>Mohon periksa kembali kata kunci pencarian atau coba lagi nanti.</p>
            <a href="/" class="btn-homepage">Kembali ke Homepage</a>
        </div>
    </div>
</body>
</html>
