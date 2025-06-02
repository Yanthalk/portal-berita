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
                <a href="{{ url()->previous() }}">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="judul">
                <h1>profile saya</h1>
            </div>
        </div>
        <div class="garis-pembatas"></div>
        <div class="bagian-profile">
            <div class="foto-profile">
                <h1>foto<br>profile</h1>
            </div>
            <div class="username">
                <p>
                    Lorem ipsum
                </p>
            </div>
            <div class="email">
                <p>
                    Loremipsum2456@gmail.com
                </p>
            </div>
        </div>
    </main>
    <div class="container-2">
        <div class="ubah-profile">
            <a href=#>
                <p>
                    Ubah Profile
                </p>
            </a>
        </div>
        <div class="garis-pembatas"></div>
        <div class="logout-akun">
            <a href=#>
                <p>
                    Logout Akun
                </p>
            </a>
        </div>
    </div>
</body>
</html>
