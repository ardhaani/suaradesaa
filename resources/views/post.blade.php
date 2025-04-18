@extends('layouts.main')

@include('partials.navbar')

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-9">      
      
      <h2 class="text-center my-4">{{ $post->judul }}</h2>
      
      <p class="text-muted">Dibuat oleh <a class="text-decoration-none text-muted me-3" href="/author/{{ $post->user->username }}"><i><b>{{ $post->user->name }}</b></i></a>
        @if ($post->status)
        @if ($post->status->id == 1 )
        <a class="text-decoration-none badge bg-primary-subtle text-wrap text-primary" href="/status/{{ $post->status->slug }}">{{ $post->status->name }}</a>
        @elseif ($post->status->id == 2 )
        <a class="text-decoration-none badge bg-warning-subtle text-wrap text-warning" href="/status/{{ $post->status->slug }}">{{ $post->status->name }}</a>
        @elseif ($post->status->id == 3 )
        <a class="text-decoration-none badge bg-success-subtle text-wrap text-success" href="/status/{{ $post->status->slug }}">{{ $post->status->name }}</a>
        @elseif ($post->status->id == 4 )
        <a class="text-decoration-none badge bg-danger-subtle text-wrap text-danger" href="/status/{{ $post->status->slug }}">{{ $post->status->name }}</a>
        @endif
        @endif
        <i class="text-muted ms-3">{{ $post->created_at }}</i>
      </p>
      
      @if ($post->image)
      <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}" class="img-fluid mb-3" width="auto">
      </div>
      @endif
      
      <article class="my-2 fs-5">
        {!! $post->isi !!}
      </article>
      
      <br>
      
      <a href="/history" class="text-decoration-none"><button class="btn btn-primary btn-sm"> Kembali</button></a>
      
      <br>

      @if ($comment)
      
      <div class="mt-4 bg-primary-subtle p-3 rounded">
        <div class="container">
          
          <div class="mt-3 mb-4">
            <label>Komentar</label>
            <hr class="mt-0 border-dark border-3">
          </div>
          
          <div class="card border-light my-3">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                @foreach ($comment as $komen)
                <h5 class="card-title">{{ $komen->user->name }}</h5>
                <p class="card-text text-muted">{{ $komen->created_at }}</p>
              </div>
              <hr class="mt-0 mb-3">
              <p class="card-text">{{ $komen->comments }}</p>
              @endforeach            
            </div>
          </div>
          @endif

        </div>
      </div>
    </div>
    
    @section('footer')  

    @include('partials.footer')
    
    @endsection
