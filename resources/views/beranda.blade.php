<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 1 Bringin - Sekolah Penggerak</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-nunito text-gray-700 antialiased bg-gray-50">

    <div class="bg-sekolah-hijau text-white py-2 text-sm hidden md:block">
        <div class="container-sekolah flex justify-between items-center">
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
        <div class="container-sekolah flex justify-between items-center py-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-sekolah-hijau rounded-full flex items-center justify-center text-white font-bold text-xl">SD</div>
                <div>
                    <h1 class="text-2xl font-bold text-sekolah-hijau leading-none">SDN 1 BRINGIN</h1>
                    <p class="text-xs text-sekolah-orange font-bold tracking-wider">SEKOLAH PENGGERAK</p>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-8">
                <a href="#" class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Beranda</a>
                
                <div class="relative group">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Profil
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-2 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Sejarah Sekolah</a></li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Visi & Misi</a></li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Struktur Organisasi</a></li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Sarana Prasarana</a></li>
                    </ul>
                </div>

                <div class="relative group">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Kesiswaan
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-2 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Beasiswa</a></li>
                        <li class="relative">
                            <a href="#" class="flex justify-between items-center px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">
                                Ekstrakurikuler <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Prestasi</a></li>
                    </ul>
                </div>

                <div class="relative group">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Informasi
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-2 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Pengumuman</a></li>
                        
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Jadwal Pelajaran</a></li>
                        
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Agenda Kegiatan</a></li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Data Guru & Staff</a></li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Data Alumni</a></li>
                    </ul>
                </div>

                <div class="relative group">
                    <button class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition flex items-center gap-1">
                        Galeri
                        <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <ul class="absolute top-full left-0 mt-2 w-56 bg-white shadow-xl rounded-b-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border-t-4 border-sekolah-hijau transform origin-top scale-95 group-hover:scale-100">
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">Kegiatan Sekolah</a></li>
                        <li class="relative">
                            <a href="#" class="flex justify-between items-center px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium border-b border-gray-100">
                                Foto Album <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </li>
                        <li><a href="#" class="block px-6 py-3 text-gray-700 hover:text-sekolah-hijau hover:bg-gray-50 transition font-medium rounded-b-lg">Video</a></li>
                    </ul>
                </div>

                <a href="#" class="nav-link text-gray-800 font-bold hover:text-sekolah-hijau transition">Kontak</a>
                <a href="#" class="btn-accent text-sm uppercase tracking-wide shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition">PPDB Online</a>
            </div>
        </div>
    </nav>

    <section id="hero-slider" class="relative h-[600px] overflow-hidden group">
        
        <div id="slider-track" class="flex transition-transform duration-700 ease-in-out h-full">
            
            <div class="w-full flex-shrink-0 relative h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl animate-fade-in-up">
                        <div class="mb-4">
                             <i class="fas fa-certificate text-5xl text-sekolah-kuning drop-shadow-lg"></i>
                        </div>
                        <h3 class="text-sekolah-hijau-light font-bold tracking-widest uppercase mb-2 text-lg md:text-xl">
                            PRESTASI SD NEGERI 1 BRINGIN
                        </h3>
                        <h1 class="text-white text-4xl md:text-6xl font-bold mb-8 leading-tight drop-shadow-md">
                            MEMPEROLEH PREDIKAT <br> SEKOLAH PENGGERAK
                        </h1>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="#" class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Galeri Foto
                            </a>
                            <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex-shrink-0 relative h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl">
                        <div class="mb-4">
                             <i class="fas fa-graduation-cap text-5xl text-sekolah-kuning drop-shadow-lg"></i>
                        </div>
                        <h3 class="text-sekolah-hijau-light font-bold tracking-widest uppercase mb-2 text-lg md:text-xl">
                            VISI & MISI SEKOLAH
                        </h3>
                        <h1 class="text-white text-4xl md:text-6xl font-bold mb-8 leading-tight drop-shadow-md">
                            MENCETAK GENERASI CERDAS <br> DAN BERAKHLAK MULIA
                        </h1>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="#" class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Profil Sekolah
                            </a>
                            <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex-shrink-0 relative h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                    <div class="max-w-4xl">
                        <div class="mb-4">
                             <i class="fas fa-users text-5xl text-sekolah-kuning drop-shadow-lg"></i>
                        </div>
                        <h3 class="text-sekolah-hijau-light font-bold tracking-widest uppercase mb-2 text-lg md:text-xl">
                            PPDB ONLINE 2026
                        </h3>
                        <h1 class="text-white text-4xl md:text-6xl font-bold mb-8 leading-tight drop-shadow-md">
                            BERGABUNGLAH BERSAMA <br> KELUARGA BESAR KAMI
                        </h1>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="#" class="bg-sekolah-hijau hover:bg-sekolah-hijau-dark text-white font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Daftar Sekarang
                            </a>
                            <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded transition duration-300 uppercase tracking-wide">
                                Syarat Pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button id="prevBtn" class="absolute top-1/2 left-0 md:left-4 -translate-y-1/2 bg-white w-12 h-12 flex items-center justify-center text-gray-800 hover:bg-sekolah-hijau hover:text-white transition duration-300 shadow-lg opacity-0 group-hover:opacity-100 z-20 cursor-pointer">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button id="nextBtn" class="absolute top-1/2 right-0 md:right-4 -translate-y-1/2 bg-white w-12 h-12 flex items-center justify-center text-gray-800 hover:bg-sekolah-hijau hover:text-white transition duration-300 shadow-lg opacity-0 group-hover:opacity-100 z-20 cursor-pointer">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-20">
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 cursor-pointer" data-index="0"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 cursor-pointer" data-index="1"></button>
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300 cursor-pointer" data-index="2"></button>
        </div>
    </section>

    <section class="relative -mt-16 z-20 px-4">
        <div class="container-sekolah">
            <div class="grid grid-cols-1 md:grid-cols-3 shadow-2xl rounded-lg overflow-hidden">
                <div class="bg-sekolah-hijau-light p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-mosque text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2">Religius</h3>
                    <p class="text-sm opacity-90">Menenamkan nilai-nilai keimanan dan ketakwaan sejak dini.</p>
                </div>
                <div class="bg-sekolah-hijau p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-medal text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2">Berprestasi</h3>
                    <p class="text-sm opacity-90">Mengembangkan potensi akademik dan non-akademik siswa.</p>
                </div>
                <div class="bg-sekolah-hijau-dark p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-laptop-code text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2">Berbasis IT</h3>
                    <p class="text-sm opacity-90">Pembelajaran modern dengan dukungan teknologi informasi.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container-sekolah">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h4 class="text-3xl font-bold text-sekolah-hijau mb-4 border-b-4 border-sekolah-kuning inline-block pb-2">Sambutan Kepala Sekolah</h4>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Mewujudkan Pendidikan Berkualitas</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kita panjatkan ke hadirat Allah SWT. SD Negeri 1 Bringin berkomitmen untuk memberikan layanan pendidikan terbaik yang ramah anak.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Website ini kami hadirkan sebagai sarana informasi dan komunikasi antara sekolah, orang tua, dan masyarakat. Mari bersama majukan pendidikan Indonesia.
                    </p>
                    <a href="#" class="btn-primary">Baca Selengkapnya</a>
                </div>
                <div class="md:w-1/2 relative">
                    <div class="bg-gray-200 rounded-xl overflow-hidden shadow-xl h-96 w-full flex items-center justify-center text-gray-400">
                        <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Kepala Sekolah" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute bottom-6 right-6 bg-white p-4 rounded-lg shadow-lg border-l-4 border-sekolah-kuning">
                        <p class="font-bold text-gray-800 text-lg">Drs. Budi Santoso, M.Pd</p>
                        <p class="text-sekolah-hijau text-sm">Kepala Sekolah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container-sekolah">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Program Unggulan</h2>
                <div class="w-20 h-1 bg-sekolah-kuning mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Kami menyediakan berbagai program untuk mendukung minat dan bakat siswa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition hover:-translate-y-2 border-b-4 border-white hover:border-sekolah-kuning group">
                    <div class="w-20 h-20 bg-sekolah-hijau/10 text-sekolah-hijau rounded-full flex items-center justify-center text-3xl mb-6 mx-auto group-hover:bg-sekolah-hijau group-hover:text-white transition">
                        <i class="fas fa-book-quran"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Tahfidz Qur'an</h3>
                    <p class="text-gray-600 text-center text-sm">Program hafalan Juz 30 rutin setiap pagi sebelum pembelajaran dimulai.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition hover:-translate-y-2 border-b-4 border-white hover:border-sekolah-kuning group">
                    <div class="w-20 h-20 bg-sekolah-hijau/10 text-sekolah-hijau rounded-full flex items-center justify-center text-3xl mb-6 mx-auto group-hover:bg-sekolah-hijau group-hover:text-white transition">
                        <i class="fas fa-campground"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Pramuka</h3>
                    <p class="text-gray-600 text-center text-sm">Membentuk karakter mandiri, disiplin, tangguh dan cinta tanah air.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition hover:-translate-y-2 border-b-4 border-white hover:border-sekolah-kuning group">
                    <div class="w-20 h-20 bg-sekolah-hijau/10 text-sekolah-hijau rounded-full flex items-center justify-center text-3xl mb-6 mx-auto group-hover:bg-sekolah-hijau group-hover:text-white transition">
                        <i class="fas fa-computer"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Komputer</h3>
                    <p class="text-gray-600 text-center text-sm">Ekstrakurikuler komputer dasar untuk mengenalkan teknologi sejak dini.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white border-t border-gray-100">
        <div class="container-sekolah">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Keunggulan SD Negeri 1 Bringin</h2>
                <div class="w-24 h-1 bg-sekolah-kuning mx-auto"></div>
                <p class="text-gray-600 mt-4">Alasan kenapa harus memilih kami sebagai tempat belajar putra-putri Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="relative rounded-xl overflow-hidden shadow-xl mb-6 group">
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gedung Sekolah" class="w-full h-auto transform transition duration-500 group-hover:scale-105">
                        <div class="absolute bottom-0 left-0 bg-sekolah-hijau text-white px-6 py-2 rounded-tr-xl font-bold text-sm shadow-lg">
                            SEKOLAH PENGGERAK
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-sekolah-hijau mb-2">SD Negeri 1 Bringin - Sekolah Ramah Anak</h3>
                    <div class="flex items-start text-gray-500 text-sm mb-4">
                        <i class="fas fa-map-marker-alt mt-1 mr-2 text-sekolah-kuning text-lg"></i>
                        <p>Jl. Bringin Raya No. 123, Kelurahan Ngaliyan, Kecamatan Ngaliyan, Kota Semarang, Jawa Tengah</p>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed border-l-4 border-sekolah-kuning pl-4 italic">
                        "SD Negeri 1 Bringin merupakan sekolah dasar yang telah bertransformasi menjadi Sekolah Penggerak, fokus pada pengembangan hasil belajar siswa secara holistik demi mewujudkan Profil Pelajar Pancasila."
                    </p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-lg flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sekolah-hijau transition">Guru & Tenaga Pendidik Profesional</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Dididik oleh guru-guru bersertifikat pendidik, berpengalaman, ramah anak, dan berdedikasi tinggi dalam membimbing siswa sesuai Kurikulum Merdeka.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-lg flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
                            <i class="fas fa-school"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sekolah-hijau transition">Fasilitas Lengkap & Modern</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Dilengkapi laboratorium komputer, perpustakaan nyaman, ruang kelas multimedia, mushola, dan sarana olahraga yang memadai.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-lg flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sekolah-hijau transition">Pengembangan Karakter Unggul</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Fokus pada pembentukan karakter siswa yang beriman, mandiri, kreatif, dan bergotong royong melalui berbagai kegiatan pembiasaan positif.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[#111111] text-gray-300 py-16">
        <div class="container-sekolah">
            
            <div class="text-center mb-10">
                <img src="assets/images/logo-sd-panjang.png" alt="Logo SDN 1 Bringin" class="h-20 mx-auto mb-6">
                
                <p class="max-w-3xl mx-auto leading-relaxed text-sm md:text-base">
                    SD Negeri 1 Bringin adalah sekolah dasar penggerak yang berkomitmen mencetak generasi penerus bangsa yang cerdas secara intelektual, emosional, dan spiritual. Melalui lingkungan belajar yang kondusif dan tenaga pendidik yang profesional, kami siap mewujudkan visi sekolah yang unggul dan berkarakter.
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