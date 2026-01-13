@extends('layouts.app')

@section('content')

<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di SDN Bringin 01</h1>
        <p class="lead">Mewujudkan Generasi Cerdas, Berkarakter, dan Berakhlak Mulia</p>
    </div>
</header>

<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Berita Terbaru</h2>
    
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="https://via.placeholder.com/400x200?text=Foto+Berita" class="card-img-top" alt="Gambar Berita">
                
                <div class="card-body">
                    <span class="badge bg-primary mb-2">{{ $post->category->title }}</span>
                    <h5 class="card-title fw-bold">{{ Str::limit($post->title, 40) }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($post->excerpt, 80) }}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm stretched-link">Baca Selengkapnya</a>
                </div>
                <div class="card-footer bg-white border-0 text-muted small">
                    <i class="bi bi-calendar"></i> {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection