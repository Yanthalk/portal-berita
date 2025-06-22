<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian {{ $query }}</title>
    <link rel="stylesheet" href="{{ asset('css/cari.css') }}">
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
    <div class="container">   
        <div class="teks">
            <h2>Hasil pencarian untuk : <span style="color: #333">{{ $query }}</span></h2>
        </div>
        <div class="garis-pembatas1"></div>

        @foreach ($results as $item)
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ $item['image_url'] ?? asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            <a href="{{ $item['url'] }}">{{ $item['judul'] }}</a>
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>{{ $item['description'] ?? 'Tidak ada deskripsi.' }}</p>
                    </div>
                    <div class="category-waktu">
                        <p>{{ ucfirst($item['category'][0] ?? 'umum') }}</p>
                        <p>
                            {{ isset($item['pubDate']) ? \Carbon\Carbon::parse($item['pubDate'])->translatedFormat('d F Y, H:i') : '-' }}
                        </p>
                        <p>
                            <span class="asal-berita" style="font-style: italic; font-size: 12px; color: gray;">
                                Sumber: {{ $item['source'] === 'api' ? 'News API' : 'Lokal' }}
                            </span>
                        </p>
                    </div>
                    <div class='selengkapnya'>
                        <a href="{{ $item['url'] }}">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="garis-pembatas1"></div>
        {{-- Pagination --}}
        <div class="pagination-container">
            <div class="pagination-links">
                {{ $results->onEachSide(1)->links('vendor.pagination.no-prev-next') }}
            </div>
        </div>
    </div>

</body>
</html>
