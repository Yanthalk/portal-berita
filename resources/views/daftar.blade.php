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
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('daftar') }}" method="POST">
      @csrf
      <h1>Daftar Akun</h1>
      <div class="input_box_username">
        <input type="text" name="nama" placeholder="Enter Nama" value="{{ old('nama') }}" required>
      </div>
      <div class="input_box_email">
        <input type="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
      </div>
      <div class="input_box_password">
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      </div>
      <button type="submit" class="btn">Daftar</button>
      <div class="login_akun">
        <p>Sudah punya akun?<a href="{{ route('login') }}">Masuk Login</a></p>
      </div>
    </form>
  </div>
</body>

</html>
