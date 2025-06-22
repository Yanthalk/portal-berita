<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kategori.css') }}">
    <title>Kategori Berita</title>
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
            <div class="kategori1">
                <h1>{{ $kategori }}</h1>
            </div>
            <div class="garis-pembatas1"></div>

            {{-- Headline Utama --}}
            @if ($article->count() > 0)
                @php $headline = $article[0]; @endphp
                <a href="{{ route('view-berita', ['id' => $headline['id'], 'source' => $headline['source']]) }}" class="headline-link">
                    <div class="headline-utama" style="position: relative;">
                        <img src="{{ $headline['image_url'] ?? asset('images/post-berita.jpg') }}" alt="Gambar Headline" class="headline-gambar">
                        <div class="headline-overlay">
                            <span class="headline-kategori">HEADLINE</span>
                            <h2 class="headline-judul">{{ $headline['title'] }}</h2>
                            <p class="headline-tanggal">
                                {{ \Carbon\Carbon::parse($headline['pubDate'])->translatedFormat('d F Y, H:i') }}
                            </p>
                        </div>
                    </div>
                </a>
            @endif

            {{-- 4 Berita Di Bawah Headline --}}
            <div class="sub-berita-container">
                @foreach ($article->slice(1, 4) as $berita)
                    <a href="{{ route('view-berita', ['id' => $berita['id'], 'source' => $berita['source']]) }}" class="sub-berita-link">
                        <div class="sub-berita-item">
                            <img src="{{ $berita['image_url'] ?? asset('images/post-berita.jpg') }}" alt="Gambar Berita" class="sub-berita-gambar">
                            <p class="sub-berita-judul">{{ $berita['title'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="garis-pembatas1"></div>
            <div class="teks">
                <h4>Update Berita</h4>
            </div>
            <div class="garis-pembatas1"></div>

            {{-- Update Berita --}}
            @foreach ($article->slice(5) as $berita)
                <div class="update-berita">
                    <div class="gambar-berita">
                        <img src="{{ $berita['image_url'] ?? asset('images/post-berita.jpg') }}" alt="post-berita">
                    </div>
                    <div class="isi-berita">
                        <div class="judul">
                            <h1>{{ $berita['title'] }}</h1>
                        </div>
                        <div class="deskripsi">
                            <p>{{ $berita['description'] ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                        <div class="category-waktu">
                            <p>{{ ucfirst($berita['category'][0] ?? 'umum') }}</p>
                            <p>{{ $berita['pubDate'] ? \Carbon\Carbon::parse($berita['pubDate'])->translatedFormat('d F Y, H:i') : '-' }}</p>
                                <p>
                                    <span class="asal-berita" style="font-style: italic; font-size: 12px; color: gray;">
                                        Sumber: {{ $berita['source'] === 'api' ? 'News API' : 'Lokal' }}
                                    </span>
                                </p>
                        </div>
                        <div class='selengkapnya'>
                            <a href="{{ route('view-berita', ['id' => $berita['id'], 'source' => $berita['source']]) }}">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="lihat-semua-wrapper">
                @php
                    $slug = array_search($kategori, config('kategori'));
                @endphp
                <a href="{{ route('kategori.paginated', ['slug' => $slug]) }}">
                    <button class="btn-lihat-semua">Lihat Semua Berita</button>
                </a>
            </div>
        </div>

        <div class="iklan2">
            <h1>Iklan</h1>
        </div>
    </main>
</body>
</html>
