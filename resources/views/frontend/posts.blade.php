@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Berita & Pengumuman</h2>
        <p class="text-muted">Informasi terbaru seputar kegiatan sekolah.</p>
    </div>

    <div class="row">
        @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                <div style="height: 200px; overflow: hidden;">
                    <img src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset('storage/' . $post->image) }}" 
                         class="card-img-top h-100 w-100 object-fit-cover" 
                         alt="{{ $post->title }}">
                </div>

                <div class="card-body">
                    <span class="badge bg-primary mb-2">{{ $post->category->title ?? 'Umum' }}</span>
                    
                    <h5 class="card-title fw-bold">
                        <a href="#" class="text-decoration-none text-dark stretched-link">
                            {{ Str::limit($post->title, 50) }}
                        </a>
                    </h5>
                    
                    <p class="card-text text-muted small">
                        {{ Str::limit($post->content, 100) }}
                    </p>
                </div>
                
                <div class="card-footer bg-white border-0 text-muted small d-flex justify-content-between">
                    <span><i class="bi bi-calendar me-1"></i> {{ $post->created_at->format('d M Y') }}</span>
                    <span><i class="bi bi-person me-1"></i> Admin</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-info d-inline-block">Belum ada berita yang diterbitkan.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection