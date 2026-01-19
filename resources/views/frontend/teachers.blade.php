@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Daftar Guru & Staf Pengajar</h2>
        <p class="text-muted">SD Negeri Bringin 01</p>
    </div>

    <div class="row justify-content-center">
        @forelse($teachers as $teacher)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card border-0 text-center shadow-sm h-100 hover-shadow transition">
                <div class="card-body">
                    <div class="mb-3 mx-auto" style="width: 120px; height: 120px; overflow: hidden; border-radius: 50%; border: 3px solid #f8f9fa;">
                        @if($teacher->image)
                            <img src="{{ asset('storage/' . $teacher->image) }}" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="{{ $teacher->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=random" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="{{ $teacher->name }}">
                        @endif
                    </div>
                    
                    <h5 class="fw-bold mb-1">{{ $teacher->name }}</h5>
                    <p class="text-primary small mb-0">{{ $teacher->subject }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
            <div class="alert alert-info d-inline-block">Belum ada data guru yang diinput.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection