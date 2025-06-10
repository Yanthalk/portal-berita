{{-- resources/views/kategori.blade.php --}}

@php
    $topBeritaList = [
        [
            'judul' => 'Unboxing Motorola Edge 60 Fusion Indonesia, Isi Kemasan Lengkap Tanpa Plastik',
            'gambar' => 'images/post-berita.jpg',
            'tanggal' => '05/06/2025, 19:00 WIB',
        ],
        [
            'judul' => 'Cara Melacak Nomor HP dengan Google Maps, Mudah dan Praktis',
            'gambar' => 'images/post-berita.jpg',
        ],
        [
            'judul' => 'Bukan Karena Teknologi, Ini Alasan Harga Smartphone Bisa Meroket Tahun Ini',
            'gambar' => 'images/post-berita.jpg',
        ],
        [
            'judul' => 'Pengalaman Buruk Beli HP Vivo di Official Store, Unit Baru Ternyata Ada Bekas Sidik Jari',
            'gambar' => 'images/post-berita.jpg',
        ],
        [
            'judul' => 'Review Kamera HP Mid-Range: Lebih Tajam dari iPhone?',
            'gambar' => 'images/post-berita.jpg',
        ],
    ];
@endphp

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
    <div class="iklan1">
        <h1>iklan</h1>
    </div>
    <div class="garis-pembatas"></div>
    <main class="main-content">
        <div class="home-berita">
            <div class="kategori1">
                <h1>
                    sport
                </h1>
            </div>
            <div class="garis-pembatas1"></div>
            <div class="top-berita" id="top-berita">

                {{-- Headline Utama --}}
                <a href="{{ url('view-berita.blade.php') }}" class="headline-link">
                    <div class="headline-utama" style="position: relative;">
                        <img src="{{ asset($topBeritaList[0]['gambar']) }}" alt="Gambar Headline" class="headline-gambar">
                        <div class="headline-overlay">
                            <span class="headline-kategori">HEADLINE</span>
                            <h2 class="headline-judul">{{ $topBeritaList[0]['judul'] }}</h2>
                            <p class="headline-tanggal">{{ $topBeritaList[0]['tanggal'] }}</p>
                        </div>
                    </div>
                </a>

                {{-- 4 Berita Di Bawah Headline --}}
                <div class="sub-berita-container">
                    @foreach ($topBeritaList as $index => $berita)
                        @if ($index > 0)
                            <a href="{{ url('view-berita.blade.php') }}" class="sub-berita-link">
                                <div class="sub-berita-item">
                                    <img src="{{ asset($berita['gambar']) }}" alt="Gambar Berita" class="sub-berita-gambar">
                                    <p class="sub-berita-judul">{{ $berita['judul'] }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            <div class="garis-pembatas1"></div>
            </div>
            <div class="teks">
                <h4>update berita</h4>
            </div>
            <div class="garis-pembatas1"></div>
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            valorant vct kickoff
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                        </p>
                    </div>
                    <div class="category-waktu">
                        <p>kategori</p>
                        <p>waktu</p>
                    </div>
                </div>
            </div>
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            valorant vct kickoff
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                        </p>
                    </div>
                    <div class="category-waktu">
                        <p>kategori</p>
                        <p>waktu</p>
                    </div>
                </div>
            </div>
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            valorant vct kickoff
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                        </p>
                    </div>
                    <div class="category-waktu">
                        <p>kategori</p>
                        <p>waktu</p>
                    </div>
                </div>
            </div>
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            valorant vct kickoff
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                        </p>
                    </div>
                    <div class="category-waktu">
                        <p>kategori</p>
                        <p>waktu</p>
                    </div>
                </div>
            </div>
            <div class="update-berita">
                <div class="gambar-berita">
                    <img src="{{ asset('images/post-berita.jpg') }}" alt="post-berita">
                </div>
                <div class="isi-berita">
                    <div class="judul">
                        <h1>
                            valorant vct kickoff
                        </h1>
                    </div>
                    <div class="deskripsi">
                        <p>
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                        </p>
                    </div>
                    <div class="category-waktu">
                        <p>kategori</p>
                        <p>waktu</p>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <a href="#" class="prev">&#10094;</a> <!-- panah kiri -->
                <a href="#" class="page-number active">1</a>
                <a href="#" class="page-number">2</a>
                <a href="#" class="page-number">3</a>
                <a href="#" class="page-number">4</a>
                <a href="#" class="next">&#10095;</a> <!-- panah kanan -->
            </div>
        </div>
        <div class="iklan2">
            <h1>iklan</h1>
        </div>
    </main>

<script>
    const beritaList = @json($topBeritaList);
    let index = 1;
    const max = beritaList.length;
    const beritaText = document.getElementById('berita-text');

    setInterval(() => {
        if (index >= max) index = 0;
        beritaText.innerText = beritaList[index];
        index++;
    }, 5000);
</script>
</body>
</html>
