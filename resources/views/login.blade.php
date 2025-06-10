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
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <h1>Portal Berita</h1>
      <h3>Selamat Datang di Portal Berita</h3>

      @if ($errors->any())
        <div class="error-message" style="color:red;">
          {{ $errors->first() }}
        </div>
      @endifs
      
      <div class="input_box">
        <input type="text" name="login" placeholder="Enter Username or Email" required
          value="{{ old('login', request()->cookie('remembered_nama')) }}">
        <i class='bx bxs-user'></i>
      </div>

      <div class="input_box">
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="ingat_lupa">
        <label>
          <input type="checkbox" name="remember"
            {{ request()->cookie('remembered_nama') ? 'checked' : '' }}>
          Ingat Saya
        </label>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="daftar_akun">
        <p>Tidak punya akun?<a href="{{ route('daftar') }}">Daftar akun?</a></p>
      </div>
    </form>
  </div>
</body>

</html>
