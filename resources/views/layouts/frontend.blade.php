<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SD Negeri Bringin 01</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .hero-section { background: linear-gradient(to right, #0061f2, #00c6f7); color: white; padding: 60px 0; }
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">SDN BRINGIN 01</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>

            @auth
                <li class="nav-item ms-lg-3">
                    <a href="{{ url('/dashboard') }}" class="btn btn-success px-4 rounded-pill">
                        Dashboard
                    </a>
                </li>
            @else
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 rounded-pill">
                        Login Admin
                    </a>
                </li>
            @endauth

          </ul>
        </div>
      </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2026 SD Negeri Bringin 01</p>
            <small class="text-white-50">Dibuat oleh Tim Magang TI UIN Walisongo</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>