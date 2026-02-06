@extends('layouts.frontend')

@section('content')
<main class="bg-gray-50">

    {{-- 3. SECTION LOKASI & GOOGLE MAPS --}}
    <section class="py-12 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Kunjungi Kami</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        SD Negeri Bringin 01 berlokasi di tempat yang strategis dan nyaman untuk proses belajar mengajar. Silakan kunjungi kami pada jam operasional sekolah.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                            <span class="text-2xl mr-4">📍</span>
                            <span class="text-sm text-gray-700">Jl. Bringin Raya No.1, Kec. Ngaliyan, Kota Semarang</span>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                            <span class="text-2xl mr-4">📞</span>
                            <span class="text-sm text-gray-700">02476631105</span>
                        </div>
                    </div>
                    <a href="https://maps.app.goo.gl/4BGw5U2pidNASJLT7" rel="noopener noreferrertarget="_blank" 
                    class="mt-8 inline-block bg-green-600 text-white px-8 py-3 rounded-full font-bold shadow-lg hover:bg-green-700 transition">
                    Buka di Google Maps →
                    </a>
                </div>
                
                {{-- Embed Google Maps (Iframe) --}}
                <div class="h-80 md:h-96 w-full rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3016.3915721193925!2d110.32788276672362!3d-7.011548860752646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7060161efeaa81%3A0x2a9a2cae581e3254!2sSD%20Negeri%20Bringin%201!5e1!3m2!1sid!2sid!4v1769430584314!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
>
    </section>

</main>
@endsection