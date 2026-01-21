@extends('layouts.frontend')

@section('content')
<main class="pb-16">
    {{-- HERO / HEADER --}}
    <section class="relative">
        <div class="relative h-[260px] sm:h-[320px] lg:h-[360px] overflow-hidden">
            <img
                src="{{ asset('asset/galeri foto.jpg') }}"
                alt="Visi dan Misi SDN 1 Bringin"
                class="absolute inset-0 h-full w-full object-cover blur-sm scale-110"
            />
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 flex h-full items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white drop-shadow">
                        Visi & Misi
                    </h2>
                    <p class="mt-3 text-white/90">
                        SD Negeri Bringin 01 • Kecamatan Ngaliyan • Kota Semarang
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl bg-sekolah-hijau shadow-xl ring-1 ring-black/5">
            <div class="p-6 sm:p-10">
                {{-- GRID: Visi+Misi (left) | Logo+Tujuan (right) --}}
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-12">
                    {{-- LEFT --}}
                    <div class="lg:col-span-8 space-y-6">
                        {{-- VISI --}}
                        <div class="rounded-2xl bg-white/10 p-6 ring-1 ring-white/15">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20">
                                    <span class="text-white font-semibold">V</span>
                                </div>
                                <h3 class="text-2xl font-semibold text-white">Visi</h3>
                            </div>
                            <p class="mt-4 text-white/90 leading-relaxed text-justify">
                                “Terwujudnya siswa beriman, berkarakter, berbudi pekerti luhur, sehat jasmani rohani, cerdas, terampil, menuju prestasi”
                            </p>
                        </div>

                        {{-- MISI --}}
                        <div class="rounded-2xl bg-white/10 p-6 ring-1 ring-white/15">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20">
                                    <span class="text-white font-semibold">M</span>
                                </div>
                                <h3 class="text-2xl font-semibold text-white">Misi</h3>
                            </div>

                            <ol class="mt-4 space-y-3 text-white/90 leading-relaxed list-decimal pl-5">
                                <li>Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga tiap siswa berkembang secara optimal sesuai dengan potensi yang dimiliki.</li>
                                <li>Mendorong menumbuh kembangkan untuk berprestasi kepada seluruh warga sekolah secara intensif.</li>
                                <li>Mendorong dan membimbing setiap siswa untuk mengenali potensi dirinya sehingga dapat dikembangkan secara optimal.</li>
                                <li>Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan komite sekolah.</li>
                                <li>Menumbuhkan penghayatan terhadap ajaran agama yang dianutnya dan juga budaya bangsa, sehingga menjadi sumber kearifan dalam bertindak.</li>
                                <li>Membiasakan berlaku santun terhadap siapa saja dan menghargai pendapat orang lain.</li>
                            </ol>
                        </div>
                    </div>

                    {{-- RIGHT --}}
                    <div class="lg:col-span-4 space-y-6">
                        {{-- LOGO --}}
                        <div class="rounded-2xl bg-white/10 ring-1 ring-white/15 p-6">
                            <img
                                src="{{ asset('asset/logo sd bringin01.png') }}"
                                alt="Logo SDN 1 Bringin"
                                class="mx-auto h-40 w-40 rounded-full object-contain bg-white p-4 ring-2 ring-white/30"
                            />
                        </div>

                        {{-- TUJUAN --}}
                        <div class="rounded-2xl bg-white/10 p-6 ring-1 ring-white/15">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20">
                                    <span class="text-white font-semibold">T</span>
                                </div>
                                <h3 class="text-2xl font-semibold text-white">Tujuan</h3>
                            </div>

                            <div class="mt-4 rounded-xl bg-white/10 p-4 ring-1 ring-white/15">
                                <p class="text-white/90 text-sm leading-relaxed text-justify">
                                    Menyelenggarakan pendidikan dan pembelajaran yang berkualitas dan profesional, dengan meletakkan dasar kecerdasan, pengetahuan,
                                    kepribadian, akhlak mulia, serta keterampilan untuk menghasilkan peserta didik yang beriman dan bertaqwa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NILAI-NILAI ORGANISASI: FULL WIDTH (di luar grid) --}}
                <div class="mt-8 rounded-2xl bg-white/10 p-6 ring-1 ring-white/15">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 ring-1 ring-white/20">
                            <span class="text-white font-semibold">N</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-white">Nilai-Nilai Organisasi</h3>
                    </div>

                    <ul class="mt-5 grid grid-cols-1 gap-4 lg:grid-cols-2 text-white/90 leading-relaxed">
                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15">
                            <p class="font-semibold text-white">Nilai Kedisiplinan</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai kedisiplinan antara lain: datang tepat waktu, memakai seragam lengkap sesuai ketentuan, menaati semua peraturan di sekolah,
                                melaksanakan kewajiban sesuai dengan tugas dan fungsi masing-masing, mengembangkan potensi dan kemampuan diri.
                            </p>
                        </li>

                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15">
                            <p class="font-semibold text-white">Nilai Kebersamaan</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai kebersamaan antara lain: menjaga kebersihan bersama, kerja kelompok bersama, menyelesaikan persoalan secara bersama-sama
                                dan melibatkan teman dalam kegiatan.
                            </p>
                        </li>

                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15">
                            <p class="font-semibold text-white">Nilai Kekeluargaan</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai kekeluargaan antara lain: menjenguk teman yang sakit, membantu teman yang kesusahan, saling menyayangi dan menghormati.
                            </p>
                        </li>

                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15">
                            <p class="font-semibold text-white">Nilai Gotong Royong</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai gotong royong antara lain: kerja bakti membersihkan sekolah, mengerjakan madding bersama.
                            </p>
                        </li>

                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15 lg:col-span-2">
                            <p class="font-semibold text-white">Nilai Sosial</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai sosial antara lain: berpakaian rapi dan sopan saat ke sekolah, menghormati orang yang lebih tua, berkarakter yang sopan santun,
                                berpikir positif, kreatif, inovatif dan tidak memaksakan kehendak kepada orang lain, saling peduli, bersaing secara sehat,
                                tidak merugikan satu dengan yang lain.
                            </p>
                        </li>

                        <li class="rounded-xl bg-white/10 p-5 ring-1 ring-white/15 lg:col-span-2">
                            <p class="font-semibold text-white">Nilai Religius</p>
                            <p class="mt-2 text-sm text-white/85 text-justify">
                                Nilai religius antara lain: menjalankan ibadah dengan tenang sesuai ajaran kepercayaan dan agama masing-masing,
                                saling menghargai pengamalan kepercayaan dan agama masing-masing.
                            </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
