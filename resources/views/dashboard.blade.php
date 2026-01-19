<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-88">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-9000">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong>! <br>
                    Ini adalah halaman untuk mengelola konten website sekolah.
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-bold mb-2" style="color: #2563eb;">📰 Berita Sekolah</h3>
                    <p class="text-gray-600 mb-4">Tulis berita, artikel, atau pengumuman terbaru.</p>
                    <a href="{{ route('posts.index') }}" 
                       style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; display: inline-block; text-decoration: none;">
                        Kelola Berita &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-bold mb-2" style="color: #16a34a;">📷 Galeri Foto</h3>
                    <p class="text-gray-600 mb-4">Upload foto kegiatan siswa dan guru.</p>
                    <a href="{{ route('galleries.index') }}" ...
                       style="background-color: #16a34a; color: white; padding: 8px 16px; border-radius: 6px; display: inline-block; text-decoration: none;">
                        Kelola Galeri &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-lg font-bold mb-2" style="color: #9333ea;">⚙️ Pengaturan</h3>
                    <p class="text-gray-600 mb-4">Ubah profil dan password admin.</p>
                    <a href="{{ route('profile.edit') }}" 
                       style="background-color: #9333ea; color: white; padding: 8px 16px; border-radius: 6px; display: inline-block; text-decoration: none;">
                        Edit Profil &rarr;
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>