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
    <div class="iklan1">
        <h1>iklan</h1>
    </div>
    <div class="garis-pembatas"></div>
    <main class="main-content">
        <div class="home-berita">
            <div class="atur-berita">
                <a href="halaman-tujuan.php">
                    <button type="button" class="btn-atur">atur konten berita</button>
                </a>
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
</body>
</html>
