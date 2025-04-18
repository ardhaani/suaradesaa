@extends('admin.layouts.main')
<style>
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.5s;
    display: block;
    margin-left: auto;
    margin-right: auto
}
#myImg:hover {opacity: 0.7;}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding: 100px; /* Location of the box */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
@-webkit-keyframes zoom {
    from {-webkit-transform:scale(1)}
    to {-webkit-transform:scale(2)}
}
 
@keyframes zoom {
    from {transform:scale(0.4)}
    to {transform:scale(1)}
}
@-webkit-keyframes zoom-out {
    from {transform:scale(1)}
    to {transform:scale(0)}
}
@keyframes zoom-out {
    from {transform:scale(1)}
    to {transform:scale(0)}
}
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 1s;
    animation-name: zoom;
    animation-duration: 1s;
}
.out {
  animation-name: zoom-out;
  animation-duration: 0.6s;
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
        @include('admin.partials.table')
      </div>
    </main>
  </div>
</div>
<script>
  // Get the modal
  var modal = document.getElementById('myModal');
   
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg');
  var modalImg = document.getElementById("img01");
  img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      modalImg.alt = this.alt;
  }
   
   
  // When the user clicks on <span> (x), close the modal
  modal.onclick = function() {
      img01.className += " out";
      setTimeout(function() {
         modal.style.display = "none";
         img01.className = "modal-content";
       }, 400);
      
   }    
      
  </script>