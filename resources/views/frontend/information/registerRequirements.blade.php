@extends('layouts.frontend')

@section('content')
<main class="pb-16 bg-gray-50">

    <section class="relative">
        <div class="relative h-[320px] sm:h-[380px] lg:h-[420px] overflow-hidden">
            <img
                src="{{ asset('asset/banner_Syarat.png') }}"
                alt="Syarat Pendaftaran Siswa Baru"
                class="absolute inset-0 h-full w-full object-cover blur-sm"
            />
            <div class="absolute inset-0 bg-black/45"></div>

            <div class="relative z-10 flex h-full items-center justify-center text-center px-4">
                <div class="text-white">
                    <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight drop-shadow text-white">
                        Syarat Pendaftaran Siswa Baru
                    </h1>
                    <p class="mt-2 text-lg text-white/90">
                        Panduan lengkap persyaratan dan dokumen untuk mendaftar ke SD
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 space-y-10">


        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">1. Syarat Umum</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Calon siswa harus berusia minimal <strong>6 tahun</strong> pada tanggal 1 Juli tahun pendaftaran.</li>
                <li>Usia <strong>7 tahun</strong> diprioritaskan diterima.</li>
                <li>Usia 5 tahun 6 bulan dapat dipertimbangkan jika memiliki kesiapan psikis dan rekomendasi.</li>
                <li>Siswa tidak diwajibkan memiliki ijazah TK/PAUD untuk mendaftar.</li>
            </ul>
        </div>


        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">2. Dokumen Administrasi</h2>
            <p class="text-gray-700 mb-3">Pastikan semua dokumen sudah lengkap dan difotokopi sebelum dikirim/dimuat ke sistem PPDB:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Formulir pendaftaran yang diisi lengkap.</li>
                <li>Akte Kelahiran (copy legal/terverifikasi).</li>
                <li>Kartu Keluarga (KK).</li>
                <li>Pas foto terbaru calon siswa (ukuran 3×4).</li>
                <li>KTP orang tua/wali.</li>
                <li>Surat keterangan domisili (jika diperlukan).</li>
            </ul>
        </div>


        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">3. Ketentuan Usia</h2>
            <p class="text-gray-700">Persyaratan usia peserta didik diatur dalam Permendikbud terbaru:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Usia minimal pendaftaran adalah <strong>6 tahun</strong> pada 1 Juli tahun berjalan.</li>
                <li>Usia 7 tahun diprioritaskan diterima di kelas 1.</li>
                <li>Usia di bawah 6 tahun (5 tahun 6 bulan) dapat dicantumkan dengan rekomendasi khusus.</li>
            </ul>
        </div>


        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Ketentuan & Pengecualian</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>PPDB tidak boleh mewajibkan tes membaca, menulis, atau berhitung sebagai syarat masuk SD.</li>
                <li>Anak penyandang disabilitas atau peserta dari daerah 3T punya ketentuan usia/dokumen khusus.</li>
                <li>Jalur zonasi memprioritaskan siswa berdomisili dekat sekolah.</li>
            </ul>
        </div>


        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">5. Tips Penting untuk Orang Tua</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Siapkan fotokopi dokumen jauh sebelum jadwal PPDB dibuka.</li>
                <li>Pastikan data di KK sesuai dan telah terverifikasi.</li>
                <li>Gunakan jalur sesuai kebutuhan: zonasi, afirmasi, prestasi, dll.</li>
            </ul>
        </div>

    </section>
</main>
@endsection