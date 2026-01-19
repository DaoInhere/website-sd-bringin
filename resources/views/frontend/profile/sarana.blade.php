@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Sarana & Prasarana</h2>

    <div class="row g-4">
        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=Ruang+Kelas" class="card-img-top" alt="Kelas">
                <div class="card-body">
                    <h5 class="fw-bold">Ruang Kelas Nyaman</h5>
                    <p class="text-muted small">Dilengkapi dengan ventilasi udara yang baik dan pencahayaan yang cukup.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=Perpustakaan" class="card-img-top" alt="Perpustakaan">
                <div class="card-body">
                    <h5 class="fw-bold">Perpustakaan Lengkap</h5>
                    <p class="text-muted small">Koleksi buku pelajaran dan bacaan umum untuk menunjang literasi siswa.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=Lab+Komputer" class="card-img-top" alt="Lab Komputer">
                <div class="card-body">
                    <h5 class="fw-bold">Laboratorium Komputer</h5>
                    <p class="text-muted small">Fasilitas komputer modern untuk pembelajaran teknologi informasi.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=Mushola" class="card-img-top" alt="Mushola">
                <div class="card-body">
                    <h5 class="fw-bold">Mushola Sekolah</h5>
                    <p class="text-muted small">Tempat ibadah yang bersih dan nyaman untuk kegiatan keagamaan.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=Lapangan+Olahraga" class="card-img-top" alt="Lapangan">
                <div class="card-body">
                    <h5 class="fw-bold">Lapangan Olahraga</h5>
                    <p class="text-muted small">Lapangan luas untuk upacara, senam, dan kegiatan olahraga siswa.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x250?text=UKS" class="card-img-top" alt="UKS">
                <div class="card-body">
                    <h5 class="fw-bold">Ruang UKS</h5>
                    <p class="text-muted small">Unit Kesehatan Sekolah dengan peralatan P3K standar.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection