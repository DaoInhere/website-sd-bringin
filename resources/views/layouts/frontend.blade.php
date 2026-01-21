<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 1 Bringin</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
@stack('scripts')
<body class="font-nunito text-gray-700 antialiased bg-gray-50">

    <div class="bg-sekolah-hijau text-white py-2 text-sm hidden md:block">
        <div class="container-sekolah flex justify-between items-center px-4">
            <div class="flex gap-6">
                <span><i class="fa fa-phone mr-2"></i> (024) 7654-3210</span>
                <span><i class="fa fa-envelope mr-2"></i> sdn1bringin@email.com</span>
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-sekolah-kuning transition"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-sekolah-kuning transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-sekolah-kuning transition"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container-sekolah flex justify-between items-center py-4 px-4">
            
            <div class="flex items-center gap-4">
                <img 
                    src="/asset/logo sd bringin01.png" 
                    alt="Logo SDN 1 Bringin" 
                    class="w-16 h-16 md:w-20 md:h-20 object-contain"
                >
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-sekolah-hijau leading-none">SDN 1 BRINGIN</h1>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-6 lg:gap-8">
                <a href="{{ route('home') }}" class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Beranda</a>
                
                <div class="relative group h-full flex items-center py-2">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Profil
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="{{ route('public.sejarah') }}" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Sejarah Sekolah</a></li>
                        <li><a href="{{ route('public.visi') }}" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Visi & Misi</a></li>
                    </ul>
                </div>

                <div class="relative group h-full flex items-center py-2">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Kesiswaan
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li class="relative group/sub">
                            <a href="#" class="flex justify-between items-center px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">
                                Ekstrakurikuler</i>
                            </a>
                        </li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Prestasi</a></li>
                    </ul>
                </div>

                <div class="relative group h-full flex items-center py-2">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Informasi
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="{{ route('public.posts') }}" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Berita & Pengumuman</a></li>
                        <li><a href="{{ url('/informasi/jadwalkbm') }}" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Jadwal KBM</a></li>
                        <li><a href="{{ route('public.teachers') }}" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Daftar Guru & Staff</a></li>
                    </ul>
                </div>

                <div class="relative group h-full flex items-center py-2">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        <a class="nav-link {{ request()->routeIs('public.galleries') ? 'active' : '' }}" href="{{ route('public.galleries') }}">Galeri</a>
                    </button>
                </div>

                <a href="#" class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Kontak</a>
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-5 rounded shadow-lg transform hover:-translate-y-1 transition text-sm uppercase tracking-wide">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-5 rounded shadow-lg transform hover:-translate-y-1 transition text-sm uppercase tracking-wide">
                        Login Admin
                    </a>
                @endauth

            </div>

            </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#111111] text-gray-300 py-16">
        <div class="container-sekolah">
            
            <div class="text-center mb-10">
                <img src="/asset/logo sd bringin01.png" alt="Logo SDN 1 Bringin" class="h-20 mx-auto mb-6 object-contain">
                
                <p class="max-w-3xl mx-auto leading-relaxed text-sm md:text-base">
                    SD Negeri 1 Bringin adalah sekolah dasar yang berkomitmen mencetak generasi penerus bangsa yang cerdas secara intelektual, emosional, dan spiritual. Melalui lingkungan belajar yang kondusif dan tenaga pendidik yang profesional, kami siap mewujudkan visi sekolah yang unggul dan berkarakter.
                </p>
            </div>

            <hr class="border-gray-800 my-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="text-sekolah-kuning text-2xl mb-4">
                        <i class="fas fa-home"></i>
                    </div>
                    <h5 class="font-bold text-white mb-2">Alamat Sekolah</h5>
                    <p class="leading-relaxed">
                        Jl. Bringin Raya No. 123,<br>
                        Kelurahan Ngaliyan, Kecamatan Ngaliyan,<br>
                        Kota Semarang, Jawa Tengah
                    </p>
                </div>
                
                <div>
                    <div class="text-sekolah-kuning text-2xl mb-4">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h5 class="font-bold text-white mb-2">Telepon / Fax</h5>
                    <p class="leading-relaxed">
                        (024) 7654-3210<br>
                        (024) 7654-3211
                    </p>
                </div>
                
                <div>
                    <div class="text-sekolah-kuning text-2xl mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="font-bold text-white mb-2">Email & Website</h5>
                    <p class="leading-relaxed">
                        sdn1bringin@disdik.semarangkota.go.id<br>
                        www.sdn1bringin.sch.id
                    </p>
                </div>
            </div>

            <hr class="border-gray-800 my-10">

            <div class="flex justify-center gap-4">
                <a href="#" class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>

            <div class="text-center mt-10 text-sm text-gray-500">
                <p>&copy; 2026 SD Negeri 1 Bringin. All Rights Reserved. Developed by Tim IT Sekolah.</p>
            </div>

        </div>
    </footer>

</body>
</html>