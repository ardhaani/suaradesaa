@extends ('layouts.main')

@include('partials.navbar')

@section('container')

<h1 class="text-center">{{ $title }}</h1>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@can('petugas')
<div class="row justify-content-center mt-5">
  <div class="col-9">
    <form action="/cari" method="GET">  
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari judul aduan..." name="cari">
        <button class="btn btn-primary border border-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@foreach ($allpost as $pos)

<div class="row-flex my-4">
  {{-- Divider --}}
  <div class="card my-3 py-2">
    <div class="d-flex justify-content-between card-header">
      <div class="justify-content-start">
        <h3 class="card-title"><a class="text-decoration-none" style="color: black" href="/author/{{ $pos->user->username }}">{{ $pos->user->name }}</a></h3>
        <p><a href="/status/{{ $pos->status->slug }}" class="text-decoration-none text-muted"><i>{{ $pos->status->name }}</i></a></p>
      </div>
      <div class="justify-content-end">
        <i class="text-muted">{{ $pos->created_at }}</i>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $pos->judul }}</h5>
      <p class="card-text">{{ $pos->excerpt }}</p>
      <a href="/history/{{ $pos->slug }}" class="text-decoration-none badge bg-primary text-wrap">
        Lihat Selengkapnya <i class="mx-2 bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
  {{-- Divider --}}
</div>

@endforeach
@endcan

@can('user')
@foreach ($posts as $post)

<div class="row-flex my-4">
  {{-- Divider --}}
  <div class="card my-3 py-2">
    <div class="d-flex justify-content-between card-header">
      <div class="justify-content-start">
        <h3 class="card-title"><a class="text-decoration-none" style="color: black" href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a></h3>
        <p>
          @if ($post->status)
          <a href="/status/{{ $post->status->slug }}" class="text-decoration-none text-muted"><i>{{ $post->status->name }}</i></a>
          @else
          Status Tidak Tersedia
          @endif
        </p>

      </div>
      <div class="justify-content-end">
        <i class="text-muted">{{ $post->created_at }}</i>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $post->judul }}</h5>
      <p class="card-text">{{ $post->excerpt }}</p>
      <a href="/history/{{ $post->slug }}" class="text-decoration-none badge bg-primary text-wrap">
        Lihat selengkapnya <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
  {{-- Divider --}}
</div>

@endforeach
@endcan

{{-- <div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div> --}}

@endsection

@section('footer')
<div class="footer"></div>
@include('partials.footer')

@endsection
