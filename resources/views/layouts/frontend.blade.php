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

    <div class="bg-sekolah-hijau text-white py-2 text-sm block">
        <div class="container-sekolah flex justify-between items-center px-4">
            <div class="flex gap-6">
                <span><i class="fa fa-phone mr-2"></i> (024) 76631105</span>
                <span><i class="fa fa-envelope mr-2"></i> sdn1bringin@gmail.com</span>
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
                <img src="/asset/logo sd bringin01.png" alt="Logo SDN 1 Bringin"
                    class="w-16 h-16 md:w-20 md:h-20 object-contain">
                <div>
                    <h1 class="text-xl md:text-2xl font-bold leading-none">SD Negeri Bringin 01</h1>
                    <h1 class="text-xs md:text-sm text-gray-400 leading-none">Kota Semarang</h1>
                </div>
            </div>

            <!-- Desktop menu -->
            <div class="hidden lg:flex items-center gap-6 lg:gap-8">
                <a href="{{ route('public.home') }}"
                    class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Beranda</a>

                <div class="relative group h-full flex items-center py-2">
                    <button
                        class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Profil
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul
                        class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="{{ route('public.schoolHistory') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Sejarah
                                Sekolah</a></li>
                        <li><a href="{{ route('public.schoolVisionMission') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Visi
                                & Misi</a></li>
                    </ul>
                </div>

                <div class="relative group h-full flex items-center py-2">
                    <button
                        class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Kesiswaan
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul
                        class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="/kesiswaan/ekstrakurikuler"
                                class="flex justify-between items-center px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Ekstrakurikuler</a>
                        </li>
                        <li><a href="/kesiswaan/prestasi"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Prestasi</a>
                        </li>
                    </ul>
                </div>

                <div class="relative group h-full flex items-center py-2">
                    <button
                        class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Informasi
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul
                        class="absolute top-full right-0 mt-0 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="{{ route('public.posts') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Berita
                                & Pengumuman</a></li>
                        <li><a href="{{ route('public.schedules') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Jadwal
                                KBM</a></li>
                        <li><a href="{{ route('public.teachers') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Daftar
                                Guru & Staff</a></li>
                        <li><a href="{{ route('public.registerRequirements') }}"
                                class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Syarat
                                Pendaftaran</a></li>
                    </ul>
                </div>

                <a href="{{ route('public.galleries') }}"
                    class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Galeri</a>
                <a href="{{ route('public.contact') }}"
                    class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Kontak</a>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-5 rounded shadow-lg transform hover:-translate-y-1 transition text-sm uppercase tracking-wide">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-5 rounded shadow-lg transform hover:-translate-y-1 transition text-sm uppercase tracking-wide">Masuk</a>
                @endauth
            </div>

            <!-- Mobile hamburger button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-button" aria-expanded="false" aria-controls="mobile-menu"
                    class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-sekolah-hijau">
                    <svg id="hamburger-open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="hamburger-close" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="lg:hidden hidden border-t border-gray-100 bg-white">
            <div class="px-4 pt-4 pb-6 space-y-2">
                <a href="{{ route('public.home') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Beranda</a>

                <!-- collapsible Profil -->
                <div>
                    <button
                        class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50 mobile-sub-toggle"
                        data-target="profil-sub">
                        Profil
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <div id="profil-sub" class="hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('public.schoolHistory') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Sejarah
                            Sekolah</a>
                        <a href="{{ route('public.schoolVisionMission') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Visi & Misi</a>
                    </div>
                </div>

                <!-- collapsible Kesiswaan -->
                <div>
                    <button
                        class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50 mobile-sub-toggle"
                        data-target="kesiswaan-sub">
                        Kesiswaan
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <div id="kesiswaan-sub" class="hidden pl-4 mt-1 space-y-1">
                        <a href="/kesiswaan/ekstrakurikuler"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Ekstrakurikuler</a>
                        <a href="/kesiswaan/prestasi"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Prestasi</a>
                    </div>
                </div>

                <!-- collapsible Informasi -->
                <div>
                    <button
                        class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50 mobile-sub-toggle"
                        data-target="informasi-sub">
                        Informasi
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <div id="informasi-sub" class="hidden pl-4 mt-1 space-y-1">
                        <a href="{{ route('public.posts') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Berita &
                            Pengumuman</a>
                        <a href="{{ route('public.schedules') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Jadwal KBM</a>
                        <a href="{{ route('public.teachers') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Daftar Guru &
                            Staff</a>
                        <a href="{{ route('public.registerRequirements') }}"
                            class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-50">Syarat
                            Pendaftaran</a>
                    </div>
                </div>

                <a href="{{ route('public.galleries') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Galeri</a>
                <a href="{{ route('public.contact') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Kontak</a>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="block mt-2 bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded shadow text-center">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block mt-2 bg-sekolah-kuning hover:bg-yellow-500 text-gray-900 font-bold py-2 px-4 rounded shadow text-center">Masuk</a>
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
                <img src="/asset/logo sd bringin01.png" alt="Logo SDN 1 Bringin"
                    class="h-20 mx-auto mb-6 object-contain">

                <p class="max-w-3xl mx-auto leading-relaxed text-sm md:text-base">
                    SD Negeri 1 Bringin adalah sekolah dasar yang berkomitmen mencetak generasi penerus bangsa yang
                    cerdas secara intelektual, emosional, dan spiritual. Melalui lingkungan belajar yang kondusif dan
                    tenaga pendidik yang profesional, kami siap mewujudkan visi sekolah yang unggul dan berkarakter.
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
                        Jl. Raya Gondoriyo, Beringin,<br>
                        Kec. Ngaliyan, Kota Semarang<br>
                        Prov. Jawa Tengah
                    </p>
                </div>

                <div>
                    <div class="text-sekolah-kuning text-2xl mb-4">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h5 class="font-bold text-white mb-2">Telepon / Fax</h5>
                    <p class="leading-relaxed">
                        (024) 76631105<br>
                        (024) 76631105

                    </p>
                </div>

                <div>
                    <div class="text-sekolah-kuning text-2xl mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="font-bold text-white mb-2">Email</h5>
                    <p class="leading-relaxed">
                        sdn1bringin@gmail.com<br>
                    </p>
                </div>
            </div>

            <hr class="border-gray-800 my-10">

            <div class="flex justify-center gap-4">
                <a href="#"
                    class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com/@anaksd8244?si=gGkODOBj4IP4zbbx"
                    class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 bg-sekolah-kuning text-gray-900 flex items-center justify-center rounded hover:bg-sekolah-kuning-dark transition duration-300">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>

            <div class="text-center mt-10 text-sm text-gray-500">
                <p>&copy; 2026 SD Negeri 1 Bringin. All Rights Reserved. Developed by Tim IT Sekolah.</p>
            </div>

        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('hamburger-close');
            const closeIcon = document.getElementById('hamburger-open');

            if (btn && menu) {
                btn.addEventListener('click', () => {
                    const isHidden = menu.classList.contains('hidden');
                    menu.classList.toggle('hidden', !isHidden);
                    btn.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
                    openIcon.classList.toggle('hidden', !isHidden);
                    closeIcon.classList.toggle('hidden', isHidden);
                });
            }

            // mobile submenu toggles
            document.querySelectorAll('.mobile-sub-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const target = button.getAttribute('data-target');
                    const el = document.getElementById(target);
                    if (!el) return;
                    el.classList.toggle('hidden');
                });
            });
        });
    </script>

</body>

</html>
