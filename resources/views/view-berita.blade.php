<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/view-berita.css') }}">
    <title>{{ $judul }}</title>
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
        <div class="post-berita">
            <div class="judul-berita">
                <h1>
                    {{ $judul }}
                </h1>
            </div>
            <div class="keterangan">
                <p>
                    <a href="{{ route('homepage') }}">portal berita</a> - {{ $tanggal }}
                </p>
            </div>
            <div class="jurnalis">
                <p>{{ $penulis }}</p>
            </div>
            <div class="cover-berita">
                @if ($gambar)
                    <img src="{{ $gambar }}" alt="cover">
                @endif
            </div>
            <div class="isi-berita">
                <p>{!! nl2br(e($konten)) !!}</p>
            </div>
            @if (!is_null($komentar))
                <div class="judul-komentar-berita">
                    <h1>
                        Komentar
                    </h1>
                </div>
                <div class="komentar-section">
                    {{-- Form kirim komentar --}}
                    @auth
                        <form action="{{ route('kirim-komentar', ['id' => request()->route('id')]) }}" method="POST" class="tulis-komentar">
                            @csrf
                            <input name="komentar" required placeholder="Tulis komentar..."></input>
                            <button type="submit" class="send-button">
                                <i class='bx bx-send'></i>
                            </button>
                        </form>
                        <div class="garis-pembatas"></div>
                    @endauth

                    @guest
                        <div class="komentar-login-warning">
                            <p>Silakan <a href="{{ route('login') }}" class="btn-login-komentar">login</a> untuk mengirim komentar.</p>
                        </div>
                    @endguest

                    {{-- Daftar komentar --}}
                    <div class="daftar-komentar">
                        @foreach ($komentar as $komen)
                            <div class="comment">
                                <div class="comment-section">
                                    <div class="comment-header">
                                        <span class="username">{{ $komen->user->nama }}</span>
                                        <span class="time-elapsed">{{ \Carbon\Carbon::parse($komen->tanggal_komentar)->translatedFormat('d F Y H:i') }}</span>
                                    </div>
                                    <div class="comment-text">
                                        {{ $komen->komentar }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="iklan2">
            <h1>iklan</h1>
        </div>
    </main>
</body>
</html>
