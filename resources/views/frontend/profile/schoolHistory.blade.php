@extends('layouts.frontend')

@section('content')
<main class="pb-16">
    
    <section class="relative">
        <div class="relative h-[320px] sm:h-[380px] lg:h-[420px] overflow-hidden">
        
            <img
                src="{{ asset('asset/galeri foto.jpg') }}"
                alt="Galeri SDN 1 Bringin"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
            />

        
            <div class="absolute inset-0 bg-black/40"></div>

            
            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white drop-shadow">
                        Sejarah Sekolah
                    </h2>
                    <p class="mt-3 text-white/90">
                        Mengenal lebih dekat sejarah SD Negeri Bringin 01 Kota Semarang
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl bg-sekolah-hijau shadow-xl ring-1 ring-black/5">
            <div class="grid grid-cols-1 gap-10 p-6 sm:p-10 lg:grid-cols-12">
            
                <div class="lg:col-span-7">
                    <h3 class="text-3xl font-semibold text-white">SDN 1 BRINGIN</h3>

                    <div class="mt-6 space-y-5 text-white/90 leading-relaxed text-justify">
                        <p>
                            Secara administrasi SD NEGERI BRINGIN 01 beralamat di Jalan Raya Gondoriyo, Kelurahan Bringin,
                            Kecamatan Ngaliyan, Kota Semarang, Provinsi Jawa Tengah. Kode POS 50189.
                            Dengan posisi geografis Lintang : -7 Bujur : 110
                        </p>

                        <p>
                            SD NEGERI BRINGIN 01 memiliki luas lahan 1.500 M², Dengan batas-batas :
                        </p>

                        <ul class="list-disc pl-5 space-y-1">
                            <li>Utara : Kelurahan Bringin</li>
                            <li>Timur : Kelurahan Kedungpane</li>
                            <li>Selatan : Kelurahan Wates</li>
                            <li>Barat : Kelurahan Gondoriyo</li>
                        </ul>

                        <p>
                            Jarak tempuh ± 15 menit dari Balaikota Semarang, SD NEGERI BRINGIN 01 terdiri dari 3 (Tiga)
                            bangunan utama, dengan rincian 7 (tujuh) ruangan kelas, 1 (satu) ruang Kepala Sekolah,
                            1 (satu) ruangan Guru, 1 (satu) ruangan UKS, dan 1 (satu) bangunan kantin serta toilet
                            di bagian belakang sekolah.
                        </p>

                        <p>
                            SD NEGERI BRINGIN 01 berdiri pada tahun 1979 yang juga berada di bangunan sekolah saat ini.
                            SD NEGERI BRINGIN 01 berdiri tanggal 01 Januari 1979 melalui SK Pendirian sekolah
                            No. 421.2/001/VI/32/85, juga SK Izin Operasional No. 421.2/04571/98 tanggal 24 Juli 1998.
                            Profil lengkap SD NEGERI BRINGIN 01 Kota Semarang dapat dilihat pada Data Pokok Pendidikan
                            Direktorat Jenderal PAUD, Dikdas, dan Dikmen Kemendikbud.
                        </p>
                    </div>
                </div>

                
                <div class="lg:col-span-5">
                    <div class="overflow-hidden rounded-2xl bg-white/10 ring-1 ring-white/15">
                        <img
                            src="{{ asset('asset/gerbang sdn bringin 01.jpg') }}"
                            alt="Gerbang SDN 1 Bringin"
                            class="h-72 w-full object-cover sm:h-80 lg:h-[420px]"
                        />
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
                            <p class="text-sm text-white/70">Luas Lahan</p>
                            <p class="mt-1 text-lg font-semibold text-white">1.500 m²</p>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
                            <p class="text-sm text-white/70">Berdiri</p>
                            <p class="mt-1 text-lg font-semibold text-white">1979</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
