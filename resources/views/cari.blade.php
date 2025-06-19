<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="{{ asset('css/cari.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </div>
        <div class="navbar-right">
            <div class="search-container">
                <form action="{{ route('berita.cari') }}" method="GET" id="search-form">
                    <input type="text" id="search-input" name="query" placeholder="Search...">
                </form>
                <div id="search-results" class="search-results"></div>
            </div>
            <div class="profile">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture">
            </div>
        </div>
    </nav>
    <div class="container">
        
        <div class="teks">
            <h2>Hasil pencarian untuk : <span style="color: #333">{{ $query }}</span></h2>
        </div>
        <div class="garis-pembatas1"></div>

        @foreach ($results as $item)
            <div class="cari-berita">
                <div class="judul-berita">
                    <h1>
                        <a href="{{ $item['url'] }}" target="{{ $item['source'] === 'api' ? '_blank' : '_self' }}">
                            {{ $item['judul'] }}
                        </a>
                    </h1>
                </div>
            </div>
        @endforeach
        <div class="garis-pembatas1"></div>
        {{-- Pagination --}}
        <div class="pagination-container">
            <div class="pagination-links">
                {{ $results->onEachSide(1)->links('vendor.pagination.no-prev-next') }}
            </div>
        </div>
    </div>

</body>
</html>
