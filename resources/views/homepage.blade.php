<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel='stylesheet' href="https://portal-berita-production-960e.up.railway.app/assets/app-C_KJDeLg.css">
    <script src="https://portal-berita-production-960e.up.railway.app/assets/app-DNxiirP_.js" defer></script>
    <title>Homepage Portal Berita</title>
    <script src="{{ asset('js/search.js') }}"></script>
</head>
<body>
    <nav class="navbar">
        <div class="Nama">
            <a href="{{ route('homepage') }}" class="nama1">
                <h1>Hot</h1>
            </a>
            <a href="{{ route('homepage') }}" class="nama2">
                <h1>News</h1>
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
                    <li><a href="{{ route('kategori.show', ['slug' => $key]) }}">{{ $label }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="iklan1">
        <h1>iklan</h1>
    </div>
    <div class="garis-pembatas"></div>
    <main class="main-content">
        <div class="home-berita">
            <div class="teks">
                <h4>update berita</h4>
            </div>
            <div class="garis-pembatas1"></div>
            @foreach ($articles as $article)
                <div class="update-berita">
                    <div class="gambar-berita">
                        <img src="{{ $article['image_url'] ?? asset('images/post-berita.jpg') }}" alt="post-berita">
                    </div>
                    <div class="isi-berita">
                        <div class="judul">
                            <h1>{{ $article['title'] ?? 'Judul Tidak Tersedia' }}</h1>
                        </div>
                        <div class="deskripsi">
                            <p>{{ $article['description'] ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="category-waktu">
                            <p>{{ ucfirst($article['category'][0] ?? 'Umum') }}</p>
                            <p>{{ \Carbon\Carbon::parse($article['pubDate'])->translatedFormat('d F Y, H:i') }}</p>
                        </div>
                        <div class='selengkapnya'>
                            <a href="{{ route('view-berita', ['id' => $article['id'], 'source' => $article['source']]) }}">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($articles->isEmpty())
                <p>Tidak ada data artikel tersedia.</p>
            @endif
            <div class="lihat-semua-wrapper">
                <a href="{{ route('homepage.paginated') }}">
                    <button class="btn-lihat-semua">Lihat Semua Berita</button>
                </a>
            </div>
        </div>
        <div class="iklan2">
            <h1>iklan</h1>
        </div>
    </main>
</body>
</html>
