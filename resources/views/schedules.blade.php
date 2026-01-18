@extends('layouts.frontend')

@section('content')

<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Jadwal Kegiatan Belajar Mengajar</h1>
        <p class="lead">Profil &rarr; Jadwal KBM</p>
    </div>
</header>

<div class="container py-5">

@foreach ($curriculums as $index => $year)
    <!-- Kurikulum -->
    <div class="card mb-2 mt-4">
        <div class="card-body d-flex justify-content-between align-items-center fw-bold"
             data-bs-toggle="collapse"
             data-bs-target="#collapse{{ $index }}"
             style="cursor: pointer;">
            <span>{{ $year }}</span>
            <span class="dropdown-toggle"></span>
        </div>
    </div>

    <!-- Kelas -->
    <div id="collapse{{ $index }}" class="collapse">
        <div>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($classes as $class)
                    <a class="btn btn-primary btn-sm flex-fill text-center"
                       href="/schedule?class={{ $class }}">
                        Kelas {{ $class }}
                    </a>
                @endforeach

                <a class="btn btn-primary btn-sm flex-fill text-center disabled">UTS</a>
                <a class="btn btn-primary btn-sm flex-fill text-center disabled">UAS</a>
            </div>
        </div>
    </div>
@endforeach

</div>

    {{-- @if($posts->count() > 0)
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
    @endif --}}
</div>

@endsection