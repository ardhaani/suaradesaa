@extends('admin.layouts.main')
<link rel="stylesheet" href="css/admin.css">
@include('admin.layouts.navbar')

<div class="container-fluid mb-5">
    <div class="row">
      @include('admin.layouts.link')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row justify-content-center">
          <div class="col">      
            <h2 class="text-center my-3">{{ $post->judul }}</h2>
            
            <a href="/laporan" class="btn btn-sm btn-success"><i class="bi bi-arrow-left"></i> Kembali</a>

            @if ($post->image)
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}" class="img-fluid my-3" width="auto">
            </div>
            @else

            @endif
            
            <article class="my-4 fs-5">
            {!! $post->isi !!}
            </article>
            
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
          @if ($comment)
          
          <div class="bg-dark-subtle p-3 rounded">
            <div class="container">
            <div class="mt-3">
              <label for="comments" class="form-label">Tambah Komentar</label>
              <hr class="mt-0 border-dark border-3">
              <form action="/posts/komen" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea class="form-control" id="comments" name="comments" rows="5"></textarea>
                <button type="submit" class="btn btn-sm btn-dark btn-primary mt-3">Submit</button> 
              </form>
            </div>

            @foreach ($comment as $komen)
            <br>
            <div class="card border-light mb-0">
              <div class="card-body">

                <div class="d-flex justify-content-between">
                  <h5 class="card-title">{{ $komen->user->name }}</h5> 
                  <form action="{{route('comment.destroy',$komen->id  )}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm p-2" onclick="return confirm('Apakah anda ingin menghapus komentar?')"><i class="bi bi-trash"></i></button>
                  </form>
                </div>
                <hr class="mt-0">
                <p class="card-text">{{ $komen->comments }}</p>
                
              </div>
            </div>
            @endforeach
            
            </div>
          </div>

          @else

          @endif
        
          </div>
        </div>
      </main>
    </div>
  </div>