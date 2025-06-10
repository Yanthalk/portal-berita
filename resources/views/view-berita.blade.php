<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/view-berita.css') }}">
    <title>Post Berita</title>
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
        <div class="post-berita">
            <div class="judul-berita">
                <h1>
                    wuthering waves 2.4
                </h1>
            </div>
            <div class="keterangan">
                <p>
                    <a href="#">portal berita</a> - 04/06/25, 00:00 WIB
                </p>
            </div>
            <div class="jurnalis">
                <img src="{{ asset('images/profile.jpg') }}" alt="jurnalis1">
                <img src="{{ asset('images/profile.jpg') }}" alt="jurnalis1">
                <p>jurnalis1, jurnalis2</p>
            </div>
            <div class="cover-berita">
                <img src="{{ asset('images/cover-berita.jpg') }}" alt="cover">
            </div>
            <div class="isi-berita">
                <p>
                    Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content. Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content. Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
Excepteur efficient emerging, minim veniam anim aute carefully curated Ginza conversation exquisite perfect nostrud nisi intricate Content.
                </p>
            </div>
            <div class="action-button">
                <button>👍</button>
                <button>👎</button>
                <button>🔗</button>
                <button>🔖</button>
            </div>
            <div class="judul-komentar-berita">
                <h1>
                    Komentar
                </h1>
            </div>
            <div class="komentar">
                <div class="tulis-komentar">
                    <input type="text" placeholder="Tulis komentar..." />
                    <button class="send-button">📨</button>
                </div>
                <div class="comment">
                    <img src="#" alt="Profile" class="profile-pic"/>
                    <div class="comment-section">
                        <div class="comment-header">
                            <span class="username">Nama User</span>
                            <span class="time-elapsed">2 jam lalu</span>
                        </div>
                        <div class="comment-text">
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
                        </div>
                        <div class="comment-actions">
                            <button class="like-btn">👍</button>
                            <button class="dislike-btn">👎</button>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <img src="#" alt="Profile" class="profile-pic"/>
                    <div class="comment-section">
                        <div class="comment-header">
                            <span class="username">Nama User</span>
                            <span class="time-elapsed">2 jam lalu</span>
                        </div>
                        <div class="comment-text">
                            Body text for your whole article or post. We'll put in some lorem ipsum to show how a filled-out page might look.
                        </div>
                        <div class="comment-actions">
                            <button class="like-btn">👍</button>
                            <button class="dislike-btn">👎</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iklan2">
            <h1>iklan</h1>
        </div>
    </main>
</body>
</html>
