@extends('layouts.frontend')

@section('content')

<header class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Jadwal Kegiatan Belajar Mengajar</h1>
        <p class="lead">Profil &rarr; Jadwal KBM &rarr; Kelas 1</p>
    </div>
</header>

<div class="container py-5">
    <a href="/schedules">&laquo; Kembali ke semua jadwal</a>
    <h2 class="text-center">Jadwal Kelas 1</h2>
    
    <h4 class="me-4">Senin</h4>
    <hr>
    <table class="table table-striped table-hover table-bordered mt-4" style="table-layout: fixed; width: 100%;">
    <thead>
        <tr>
        <th scope="col">Jam</th>
        <th scope="col">Mata Pelajaran / Kegiatan</th>
        <th scope="col">Seragam Sekolah</th>
        {{-- <th scope="col">Kelas</th> --}}
        </tr>
    </thead>
    <tbody>

    @foreach ($schedules as $schedule)
        @if ($schedule->day === 'Senin')
            <tr>
                <td>{{ $schedule->hour }}</th>
                <td>{{ $schedule->subject }}</td>
                <td>{{ $schedule->uniform }}</td>
                {{-- <td>{{ $schedule->class }}</td> --}}
            </tr>
        @endif
    @endforeach

    </tbody>
    </table>
    <h4 class="me-4 mt-4">Selasa</h4>
    <hr>
    <table class="table table-striped table-hover table-bordered mt-4" style="table-layout: fixed; width: 100%;">
    <thead>
        <tr>
        <th scope="col">Jam</th>
        <th scope="col">Mata Pelajaran / Kegiatan</th>
        <th scope="col">Seragam Sekolah</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($schedules as $schedule)
        @if ($schedule->day === 'Selasa')
            <tr>
                <td>{{ $schedule->hour }}</th>
                <td>{{ $schedule->subject }}</td>
                <td>{{ $schedule->uniform }}</td>
            </tr>
        @endif
    @endforeach

    </tbody>
    </table>
    <h4 class="me-4 mt-4">Rabu</h4>
    <hr>
        <table class="table table-striped table-hover table-bordered mt-4" style="table-layout: fixed; width: 100%;">
    <thead>
        <tr>
        <th scope="col">Jam</th>
        <th scope="col">Mata Pelajaran / Kegiatan</th>
        <th scope="col">Seragam Sekolah</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($schedules as $schedule)
        @if ($schedule->day === 'Rabu')
            <tr>
                <td>{{ $schedule->hour }}</th>
                <td>{{ $schedule->subject }}</td>
                <td>{{ $schedule->uniform }}</td>
            </tr>
        @endif
    @endforeach

    </tbody>
    </table>
    <h4 class="me-4 mt-4">Kamis</h4>
    <hr>
        <table class="table table-striped table-hover table-bordered mt-4" style="table-layout: fixed; width: 100%;">
    <thead>
        <tr>
        <th scope="col">Jam</th>
        <th scope="col">Mata Pelajaran / Kegiatan</th>
        <th scope="col">Seragam Sekolah</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($schedules as $schedule)
        @if ($schedule->day === 'Kamis')
            <tr>
                <td>{{ $schedule->hour }}</th>
                <td>{{ $schedule->subject }}</td>
                <td>{{ $schedule->uniform }}</td>
            </tr>
        @endif
    @endforeach

    </tbody>
    </table>
    <h4 class="me-4 mt-4">Jumat</h4>
    <hr>
        <table class="table table-striped table-hover table-bordered mt-4" style="table-layout: fixed; width: 100%;">
    <thead>
        <tr>
        <th scope="col">Jam</th>
        <th scope="col">Mata Pelajaran / Kegiatan</th>
        <th scope="col">Seragam Sekolah</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($schedules as $schedule)
        @if ($schedule->day === 'Jumat')
            <tr>
                <td>{{ $schedule->hour }}</th>
                <td>{{ $schedule->subject }}</td>
                <td>{{ $schedule->uniform }}</td>
            </tr>
        @endif
    @endforeach

    </tbody>
    </table>
    

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