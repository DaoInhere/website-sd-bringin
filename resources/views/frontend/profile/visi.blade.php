@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Visi & Misi</h2>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4 bg-primary text-white">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-lightbulb-fill display-4"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Visi</h3>
                    <p class="fs-5 fst-italic">
                        "Terwujudnya Peserta Didik yang Beriman, Cerdas, Terampil, Mandiri, dan Berwawasan Global"
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="card-body">
                    <h3 class="fw-bold text-primary mb-3">Misi</h3>
                    <ol class="list-group list-group-numbered list-group-flush">
                        <li class="list-group-item">Menanamkan keimanan dan ketaqwaan melalui pengamalan ajaran agama.</li>
                        <li class="list-group-item">Mengoptimalkan proses pembelajaran dan bimbingan secara efektif.</li>
                        <li class="list-group-item">Mengembangkan bidang Ilmu Pengetahuan dan Teknologi berdasarkan minat, bakat, dan potensi peserta didik.</li>
                        <li class="list-group-item">Membina kemandirian peserta didik melalui kegiatan pembiasaan, kewirausahaan, dan pengembangan diri.</li>
                        <li class="list-group-item">Menjalin kerjasama yang harmonis antar warga sekolah, dan lingkungan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection