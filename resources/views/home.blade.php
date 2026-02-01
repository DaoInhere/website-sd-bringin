@extends('layouts.frontend')

@section('content')
<main class="bg-white">
    {{-- HERO SLIDER --}}
<section id="hero-slider" class="relative h-[520px] sm:h-[600px] overflow-hidden group bg-gray-100">
    <div class="h-full overflow-hidden">
        <div id="slider-track" class="flex h-full transition-transform duration-700 ease-in-out">
            @if($herobanners->isEmpty())
                <div class="slide min-w-full relative h-full bg-cover bg-center flex items-center justify-center bg-gray-200">
                    <div class="text-gray-600">Belum ada data.</div>
                </div>
            @else
                @foreach($herobanners as $herobanner)
                <div class="slide min-w-full relative h-full bg-cover bg-center"
                    style="background-image: url('{{ $herobanner->image_url }}');">
                    <div class="absolute inset-0 bg-black/60"></div>

                    <div class="absolute inset-0 flex items-center justify-center text-center px-4">
                        <div class="max-w-4xl">

                            <h3 class="text-sekolah-hijau-light font-bold tracking-widest uppercase mb-2 text-lg md:text-xl">
                                {{ $herobanner->title }}
                            </h3>

                            <h1 class="text-white text-4xl md:text-6xl font-bold mb-8 leading-tight drop-shadow-md">
                                {{ $herobanner->subtitle }}
                            </h1>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- NAV BUTTONS --}}
    <button id="prevBtn" type="button" aria-label="Sebelumnya"
        class="absolute top-1/2 left-2 md:left-6 -translate-y-1/2 bg-white/90 w-12 h-12 rounded-xl flex items-center justify-center text-gray-800 hover:bg-sekolah-hijau hover:text-white transition duration-300 shadow-lg opacity-0 group-hover:opacity-100 z-20">
        <i class="fas fa-chevron-left text-xl" aria-hidden="true"></i>
    </button>

    <button id="nextBtn" type="button" aria-label="Berikutnya"
        class="absolute top-1/2 right-2 md:right-6 -translate-y-1/2 bg-white/90 w-12 h-12 rounded-xl flex items-center justify-center text-gray-800 hover:bg-sekolah-hijau hover:text-white transition duration-300 shadow-lg opacity-0 group-hover:opacity-100 z-20">
        <i class="fas fa-chevron-right text-xl" aria-hidden="true"></i>
    </button>

    {{-- DOTS (dinamis) --}}
    @php
        $dotCount = $herobanners->isEmpty() ? 1 : $herobanners->count();
    @endphp

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-20" id="slider-dots">
        @for($i = 0; $i < $dotCount; $i++)
            <button class="slider-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300"
                data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"></button>
        @endfor
    </div>
</section>

    {{-- 3 VALUE CARDS --}}
    <section class="relative -mt-16 z-20 px-4">
        <div class="mx-auto max-w-7xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 shadow-2xl rounded-2xl overflow-hidden hover:bg-sekolah-kuning">
                <div class="bg-sekolah-hijau-light p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-mosque text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2 text-white">Religius</h3>
                    <p class="text-sm opacity-90">Menanamkan nilai-nilai keimanan dan ketakwaan sejak dini.</p>
                </div>
                <div class="bg-sekolah-hijau p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-medal text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2 text-white">Berprestasi</h3>
                    <p class="text-sm opacity-90">Mengembangkan potensi akademik dan non-akademik siswa.</p>
                </div>
                <div class="bg-sekolah-hijau-dark p-10 text-white text-center hover:-translate-y-2 transition duration-300">
                    <i class="fas fa-laptop-code text-5xl mb-4 text-sekolah-kuning"></i>
                    <h3 class="text-xl font-bold mb-2 text-white">Berbasis IT</h3>
                    <p class="text-sm opacity-90">Pembelajaran modern dengan dukungan teknologi informasi.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SAMBUTAN --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-center gap-10 lg:gap-14">
                <div class="md:w-5/12">
                    <h4 class="text-3xl font-bold text-sekolah-hijau mb-4 border-b-4 border-sekolah-kuning inline-block pb-2">
                        Sambutan Kepala Sekolah
                    </h4>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Mewujudkan Pendidikan Berkualitas</h2>

                    <div class="text-gray-600 leading-relaxed text-justify space-y-4">
                        <p>Assalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                        <p>Salam sehat, salam semangat untuk kita semua. Puji Syukur kami panjatkan kehadirat Allah Swt atas segala limpahan rahmat dan karunia-Nya, sehingga SD Negeri Bringin 01 berhasil membangun website sekolah.</p>
                        <p>Kehadiran website SD Negeri Bringin 01 diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada warga sekolah, alumni, dan masyarakat serta instansi lain yang terkait.</p>
                        <p>Di era global dan pesatnya teknologi informasi dan komunikasi ini, tidak dipungkiri bahwa keberadaan website untuk suatu organisasi, termasuk SD Negeri Bringin 01 sangatlah penting.</p>
                        <p>Oleh karena itu, kami sangat berharap, melalui website ini SD Negeri Bringin 01 akan semakin berkembang lebih maju dan solid. Terimakasih.</p>
                        <p class="font-semibold text-sekolah-hijau">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>
                    </div>
                </div>

                <div class="md:w-5/12 flex justify-center">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl inline-block group bg-gray-50">
                        <img
                            src="{{ $headmaster ? $headmaster->photo_url : asset('asset/nophoto.png') }}"
                            alt="foto Kepala Sekolah"
                            class="max-h-96 w-auto object-contain transition-transform duration-500 group-hover:scale-105">

                        <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm p-3 rounded-xl shadow-md border-l-4 border-sekolah-kuning">
                            <p class="font-bold text-gray-800 text-base">{{ $headmaster ? $headmaster->name : 'Foto' }}</p>
                            <p class="text-sekolah-hijau text-xs">Kepala Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM UNGGULAN --}}
    <section class="py-20 bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Program Unggulan</h2>
                <div class="w-20 h-1 bg-sekolah-kuning mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Kami menyediakan berbagai program untuk mendukung minat dan bakat siswa.</p>
            </div>

            @if($extracurriculars->isEmpty())
                <div class="rounded-2xl bg-white p-6 text-center text-gray-600 shadow-sm ring-1 ring-black/5">
                    Belum ada data.
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="grid grid-cols-2 gap-6">
                        @foreach($extracurriculars as $extracurricular)
                        <div class="bg-white overflow-hidden p-8 rounded-2xl shadow-md hover:shadow-xl transition hover:-translate-y-2 border-b-4 border-white hover:border-sekolah-kuning group">
                            <div class="w-50 h-50 overflow-hidden bg-sekolah-hijau/10 text-sekolah-hijau rounded-full flex items-center justify-center text-3xl mx-auto group-hover:bg-sekolah-hijau group-hover:text-white transition">
                                <img src="{{ $extracurricular->image_url }}" class="w-full h-full object-contain">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-xl font-bold text-center mb-3">{{ $extracurricular->subject }}</h3>
                                <p class="text-gray-600 text-center text-sm">{{ $extracurricular->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- KEUNGGULAN --}}
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Keunggulan SD Negeri 1 Bringin</h2>
                <div class="w-24 h-1 bg-sekolah-kuning mx-auto"></div>
                <p class="text-gray-600 mt-4">Alasan kenapa harus memilih kami sebagai tempat belajar putra-putri Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="relative rounded-2xl overflow-hidden shadow-xl mb-6 group">
                        <img src="{{ asset('asset/sekolah sd bringin 01 semarang.jpg') }}"
                            alt="Gedung Sekolah"
                            class="w-full h-auto transform transition duration-500 group-hover:scale-105">
                    </div>

                    <h3 class="text-2xl font-bold text-sekolah-hijau mb-2">SD Negeri 1 Bringin - Sekolah Ramah Anak</h3>

                    <div class="flex items-start text-gray-500 text-sm mb-4">
                        <i class="fas fa-map-marker-alt mt-1 mr-2 text-sekolah-kuning text-lg"></i>
                        <p>Jl. Bringin Raya No. 123, Kelurahan Ngaliyan, Kecamatan Ngaliyan, Kota Semarang, Jawa Tengah</p>
                    </div>

                    <p class="text-gray-600 text-sm leading-relaxed border-l-4 border-sekolah-kuning pl-4 italic">
                        "SD Negeri 1 Bringin merupakan sekolah dasar unggulan yang fokus pada pengembangan hasil belajar siswa secara holistik demi mewujudkan Profil Pelajar Pancasila."
                    </p>
                </div>

                <div class="space-y-8">
                    <div class="flex gap-6 group">
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-2xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
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
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-2xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
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
                        <div class="flex-shrink-0 w-20 h-20 bg-sekolah-hijau rounded-2xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:bg-sekolah-hijau-dark transition duration-300">
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
</main>
@endsection


@push('scripts')
<script>
(function() {
    const track = document.getElementById('slider-track');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = () => Array.from(document.querySelectorAll('.slider-dot'));
    const slides = () => track ? Array.from(track.querySelectorAll('.slide')) : [];

    if (!track) return;

    let index = 0;
    let timer = null;

    function setActiveDot(i) {
        dots().forEach((d, idx) => {
            if (idx === i) {
                d.classList.add('bg-white');
                d.classList.remove('bg-white/50');
                d.setAttribute('aria-current', 'true');
            } else {
                d.classList.remove('bg-white');
                d.classList.add('bg-white/50');
                d.setAttribute('aria-current', 'false');
            }
        });
    }

    function goTo(i) {
        const s = slides();
        if (s.length === 0) return;
        index = (i + s.length) % s.length;
        track.style.transform = `translateX(-${index * 100}%)`;
        setActiveDot(index);
    }

    function startAuto() {
        stopAuto();
        const s = slides();
        if (s.length <= 1) return; // tidak auto-rotate kalau 0 atau 1 slide
        timer = setInterval(() => goTo(index + 1), 6000);
    }

    function stopAuto() {
        if (timer) clearInterval(timer);
        timer = null;
    }

    prevBtn?.addEventListener('click', () => {
        goTo(index - 1);
        startAuto();
    });

    nextBtn?.addEventListener('click', () => {
        goTo(index + 1);
        startAuto();
    });

    // dots: attach events (dots are server-rendered)
    dots().forEach(dot => {
        dot.addEventListener('click', () => {
            const i = Number(dot.dataset.index || 0);
            goTo(i);
            startAuto();
        });
    });

    // init
    goTo(0);
    startAuto();

    // pause on hover
    const hero = document.getElementById('hero-slider');
    hero?.addEventListener('mouseenter', stopAuto);
    hero?.addEventListener('mouseleave', startAuto);
})();
</script>
@endpush