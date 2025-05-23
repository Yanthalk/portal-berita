<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
  <title>Login Portal Berita</title>
</head>

<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h1>Portal Berita</h1>
      <h3>Selamat Datang di Portal Berita</h3>
      <div class="input_box">
        <input type="text" name="username" placeholder="Enter Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input_box">
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="ingat_lupa">
        <label><input type="checkbox" name="remember">Ingat Saya</label>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="daftar_akun">
        <p>Tidak punya akun?<a href="#">Daftar akun?</a></p>
      </div>
    </form>
  </div>
</body>

</html>
