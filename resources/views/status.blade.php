@extends ('layouts.main')

@include('partials.navbar')

@section('container')

<h1 class="text-center">Status : {{ $status }}</h1>

@foreach ($posts as $post)

<div class="row-flex my-4">
  {{-- Divider --}}
  <div class="card my-3">
    <div class="card-body">
      <h5 class="card-title">{{ $post->judul }}</h5>
        <p class="card-text">{{ $post->isi }}</p>
        <a href="/history/{{ $post->slug }}">
          Lihat Selengkapnya <i class="mx-2 bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
    {{-- Divider --}}
  </div>
  
  @endforeach
@endsection
    
{{-- <div class="d-flex justify-content-center">
  {{ $posts->links() }}
  </div>
   --}}
@section('footer')

@include('partials.footer')
    
@endsection