@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Galeri Kegiatan</h2>
        <p class="text-muted">Dokumentasi aktivitas siswa dan guru SDN Bringin 01.</p>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <div style="height: 250px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                         class="card-img-top h-100 w-100 object-fit-cover" 
                         alt="{{ $gallery->title }}"
                         style="transition: transform 0.3s ease;">
                </div>
                
                <div class="card-footer bg-white border-0 text-center py-3">
                    <small class="fw-bold text-dark">{{ $gallery->title ?? 'Kegiatan Sekolah' }}</small>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-info d-inline-block">Belum ada foto di galeri.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection