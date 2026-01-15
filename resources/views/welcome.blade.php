@extends('layouts.frontend')

@section('content')

<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di SDN Bringin 01</h1>
        <p class="lead">Mewujudkan Generasi Cerdas, Berkarakter, dan Berakhlak Mulia</p>
    </div>
</header>

<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Berita Terbaru</h2>
    
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
                        <span class="badge bg-primary mb-2">{{ $post->category->title }}</span>
                        
                        <h5 class="card-title fw-bold">{{ Str::limit($post->title, 40) }}</h5>
                        
                        <p class="card-text text-muted">{{ Str::limit($post->excerpt, 80) }}</p>
                        
                        <a href="#" class="btn btn-outline-primary btn-sm stretched-link">Baca Selengkapnya</a>
                    </div>
                    
                    <div class="card-footer bg-white border-0 text-muted small">
                        <i class="bi bi-calendar"></i> {{ $post->created_at->diffForHumans() }} | 
                        <i class="bi bi-person"></i> {{ $post->user->name }}
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

@endsection