@extends('layouts.frontend')

@section('content')

<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Jadwal Kegiatan Belajar Mengajar</h1>
        <p class="lead">Profil &rarr; <a href="/schedules" class="text-white hover:text-gray-500 transition">Jadwal KBM</a> &rarr; Kelas {{ $class }}</p>
    </div>
</header>

<div class="container py-5">
    <a href="/schedules">&laquo; Kembali ke semua jadwal</a>
    <h2 class="text-center">
        Jadwal {{ 'Kelas ' . $class }}
    </h2>

    
@php
    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
@endphp

@foreach ($days as $day)
    <h4 class="me-4">{{ $day }}</h4>
    <hr>

    <table class="table table-striped table-hover table-bordered mt-4"
           style="table-layout: fixed; width: 100%;">
        <thead>
            <tr>
                <th>Jam</th>
                <th>Mata Pelajaran / Kegiatan</th>
                <th>Seragam Sekolah</th>
                <th>Kurikulum</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($schedules[$day] ?? [] as $schedule)
                <tr>
                    <td>{{ $schedule->hour }}</td>
                    <td>{{ $schedule->subject }}</td>
                    <td>{{ $schedule->uniform }}</td>
                    <td>{{ $schedule->curriculum }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Tidak ada jadwal
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endforeach
    

{{-- <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Jam</th>
      <th scope="col">Kegiatan</th>
        <th scope="col">Kelas</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($schedules as $schedule)
    
    <tr>
        <th scope="row">{{ $schedule->hour }}</th>
        <td>{{ $schedule->subject }}</td>
        <td>{{ $schedule->class }}</td>
    </tr>

    @endforeach

  </tbody>
</table> --}}

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