@extends('layouts.frontend')

@section('content')

<header class="hero-section text-center py-5 bg-light border-bottom">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di SDN Bringin 01</h1>
        <p class="lead text-muted">Mewujudkan Generasi Cerdas, Berkarakter, dan Berakhlak Mulia</p>
    </div>
</header>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Berita Terbaru</h2>
    </div>
    
    @if($posts->count() > 0)
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    
                    <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/' . $post->image) }}" 
                         class="card-img-top" 
                         alt="{{ $post->title }}"
                         style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $post->category->title ?? 'Umum' }}</span>
                        
                        <h5 class="card-title fw-bold">
                            {{ Str::limit($post->title, 40) }}
                        </h5>
                        
                        <p class="card-text text-muted">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">Baca Selengkapnya</a>
                    </div>
                    
                    <div class="card-footer bg-white border-0 text-muted small">
                        <i class="bi bi-calendar"></i> {{ $post->created_at->diffForHumans() }} | 
                        <i class="bi bi-person"></i> Admin
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="alert alert-info d-inline-block">
                Belum ada berita yang diterbitkan saat ini.
            </div>
        </div>
    @endif
</div>

<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Galeri Kegiatan</h2>

        @if($galleries->count() > 0)
            <div class="row g-4">
                @foreach($galleries as $gallery)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden position-relative group-hover">
                        
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                             class="card-img-top" 
                             alt="{{ $gallery->title }}" 
                             style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                        
                        <div class="card-footer bg-white text-center border-0">
                            <small class="fw-bold text-dark">{{ $gallery->title ?? 'Dokumentasi Sekolah' }}</small>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted">
                <p>Belum ada foto galeri.</p>
            </div>
        @endif
    </div>
</div>

@endsection