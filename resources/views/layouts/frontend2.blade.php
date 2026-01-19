<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SD Negeri Bringin 01</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .nav-link { font-weight: 500; color: #555 !important; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: #0d6efd !important; }
        .dropdown-item:active { background-color: #0d6efd; }
        
        .hero-section { background: linear-gradient(to right, #0061f2, #00c6f7); color: white; padding: 60px 0; }
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            <i class="bi bi-mortarboard-fill me-2"></i>SDN BRINGIN 01
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                    Profil
                </a>
                <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('public.sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ route('public.visi') }}">Visi & Misi</a></li>
                    <li><a class="dropdown-item" href="{{ route('public.struktur') }}">Struktur Organisasi</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('public.sarana') }}">Sarana & Prasarana</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('public.teachers') || request()->is('schedule*') ? 'active' : '' }}" href="#" id="navbarDropdownInfo" role="button" data-bs-toggle="dropdown">
                    Informasi
                </a>
                <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="navbarDropdownInfo">
                    <li><a class="dropdown-item" href="{{ route('public.teachers') }}">Guru & Staff</a></li>
                    
                    <li><a class="dropdown-item" href="{{ url('/schedule') }}">Jadwal Pelajaran</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('public.posts') ? 'active' : '' }}" href="{{ route('public.posts') }}">Berita</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('public.galleries') ? 'active' : '' }}" href="{{ route('public.galleries') }}">Galeri</a>
            </li>

            @auth
                <li class="nav-item ms-lg-3">
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4 rounded-pill fw-bold">
                        Dashboard
                    </a>
                </li>
            @else
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-4 rounded-pill fw-bold">
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

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 text-center text-md-start">
                    <h5 class="fw-bold text-primary">SDN BRINGIN 01</h5>
                    <p class="small text-white-50">Mewujudkan generasi penerus bangsa yang cerdas, berkarakter, dan berakhlak mulia.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2026 SD Negeri Bringin 01</p>
                    <small class="text-white-50">Dibuat oleh Tim Magang TI UIN Walisongo</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>