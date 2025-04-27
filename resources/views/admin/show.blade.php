@extends('admin.layouts.main')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@include('admin.layouts.navbar')

<div class="container-fluid mb-5">
    <div class="row">
        @include('admin.layouts.link')
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row justify-content-center">
                <div class="col">
                    <h2 class="text-center my-3">{{ $post->judul }}</h2>

                    <a href="/laporan" class="btn btn-sm btn-success mb-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>

                    <div class="d-flex justify-content-center">
                        @if ($post->gambar)
                            <img src="{{ asset('storage/' . $post->gambar) }}" 
                                 alt="{{ $post->slug }}" 
                                 class="img-fluid my-3 rounded" 
                                 style="max-width:400px;">
                        @else
                            <img src="{{ asset('img/placeholder.png') }}" 
                                 alt="Gambar tidak tersedia" 
                                 class="img-fluid my-3 rounded" 
                                 style="max-width:400px;">
                        @endif
                    </div>

                    <article class="my-4 fs-5">
                        {!! $post->isi !!}
                    </article>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Komentar Section --}}
                    <div class="bg-light p-4 mt-5 rounded shadow-sm">
                        <h5 class="mb-3">Tambah Komentar</h5>
                        <form action="/posts/komen" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea class="form-control mb-3" id="comments" name="comments" rows="4" placeholder="Tulis komentar Anda..."></textarea>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>

                    {{-- Daftar Komentar --}}
                    @if ($comment && $comment->count() > 0)
                        <div class="mt-4">
                            <h5>Komentar</h5>
                            @foreach ($comment as $komen)
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="card-title mb-0">{{ $komen->user->name }}</h6>
                                            <form action="{{ route('comment.destroy', $komen->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <hr class="my-2">
                                        <p class="card-text">{{ $komen->comments }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="mt-4 text-muted">
                            <em>Belum ada komentar.</em>
                        </div>
                    @endif

                </div>
            </div>
        </main>
    </div>
</div>
