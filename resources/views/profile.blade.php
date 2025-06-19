<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>Profile</title>
</head>
<body>
    <main class="container-1">
        <div class="back-judul">
            <div class="back">
                <a href="{{ route('homepage') }}">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="judul">
                <h1>profile saya</h1>
            </div>
        </div>
        <div class="garis-pembatas"></div>
        <div class="bagian-profile">
            <div class="bagian1">
                <p>Username</p>
                <div class="username">
                    <p>
                        Lorem ipsum
                    </p>
                </div>
            </div>
            <div class="bagian2">
                <p>Email</p>
                <div class="email">
                    <p>
                        Loremipsum2456@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </main>
    <div class="container-2">
        <div class="ubah-profile">
            <a href="{{ route('ubah-profile') }}">
                <p>
                    Ubah Profile
                </p>
            </a>
        </div>
        <div class="garis-pembatas"></div>
        <div class="logout-akun">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <p>Logout Akun</p>
                </button>
            </form>
        </div>
    </div>
</body>
</html>
