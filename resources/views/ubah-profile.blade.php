<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ubah-profile.css') }}">
    <title>Ubah Profile</title>
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
                <h1>ubah profile</h1>
            </div>
        </div>
        <div class="garis-pembatas"></div>
        <div class="foto-profile">
            <h1>foto<br>profile</h1>
        </div>
        <div class="teks1">
            <p>
                Ubah Foto Profile
            </p>
        </div>
        <div class="teks2">
            <p>
                Ubah Username
            </p>
        </div>
        <div class="enter-username">
            <input type="text" name="username" placeholder="Enter Username" required>
        </div>
        <div class="container-btn">
            <button type="submit" class="btn">Simpan</button>
        </div>
    </main>
</body>
</html>
