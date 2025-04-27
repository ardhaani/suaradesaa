@extends('admin.layouts.main')

<style>
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.5s;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  #myImg:hover {opacity: 0.7;}
  
  .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.9);
  }
  
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    animation-name: zoom;
    animation-duration: 0.6s;
  }
  
  @keyframes zoom {
    from {transform: scale(0.4)}
    to {transform: scale(1)}
  }
  
  .out {
    animation-name: zoom-out;
    animation-duration: 0.6s;
  }
  
  @keyframes zoom-out {
    from {transform: scale(1)}
    to {transform: scale(0)}
  }
  
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
  }
</style>

@include('admin.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    @include('admin.layouts.link')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          @can('admin')
            @include('admin.partials.pdf')
          @endcan
        </div>
      </div>

      <br>

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <h3 class="mb-3">Daftar Laporan</h3>
      <p>Jumlah total laporan : {{ $posts->count() }}</p>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Gambar</th>
              <th>Isi</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->judul }}</td>
                <td>
                  @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Laporan" class="myImg" style="max-width: 100px; height: auto;">
                  @else
                    <small><i>Tidak ada gambar</i></small>
                  @endif
                </td>
                <td>{{ $post->isi }}</td>
                <td>{{ $post->created_at->format('d-m-Y') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- Modal Box untuk Zoom Gambar -->
<div id="myModal" class="modal">
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
  var modal = document.getElementById('myModal');
  var modalImg = document.getElementById("img01");
  var images = document.querySelectorAll('.myImg');

  images.forEach(function(img) {
    img.addEventListener('click', function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      modalImg.alt = this.alt;
    });
  });

  modal.onclick = function() {
    modalImg.className += " out";
    setTimeout(function() {
      modal.style.display = "none";
      modalImg.className = "modal-content";
    }, 400);
  }
</script>
