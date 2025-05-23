<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/daftarstyle.css') }}">
  <title>Daftar Portal Berita</title>
</head>

<body>
  <div class="wrapper">
    <form action="daftar.php" method="POST">
      <h1>Daftar Akun</h1>
      <div class="input_box_username">
        <input type="text" placeholder="Enter Username" required>
      </div>
      <div class="input_box_password">
        <input type="password" id="password" placeholder="Enter Password" required>
        <input type="password" id="confirm-password" placeholder="Confirm Password" required>
      </div>
      <button type="submit" class="btn">Daftar</button>
      <div class="login_akun">
        <p>Sudah punya akun?<a href="#">Masuk Login</a></p>
      </div>
    </form>
  </div>
</body>

</html>
