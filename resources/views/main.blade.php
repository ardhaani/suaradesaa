@extends ('layouts.main')

@include('partials.navbar')
<main>
  <div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6" data-aos="fade-down-left" data-aos-duration="800">
        <img src="img/index.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6" data-aos="fade-up-right" data-aos-duration="800">
        <h1 class="fw-bold lh-1 mb-3">Layanan Pengaduan dan Aspirasi Masyarakat Desa</h1>
        <p>Berikan suaramu dan kita akan mendengarkan. Layanan pengaduan masyarakat kami hadir untuk memastikan masalahmu terdengar dan diselesaikan dengan cepat. Laporkan masalahmu sekarang dan bersama kita perbaiki situasi untuk kebaikan bersama.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        @auth
        <a type="button" class="btn btn-primary px-4" href="/dashboard">Lapor</a>
        @else
        <a type="button" class="btn btn-primary px-4" href="/login">Lapor</a>
        @endauth
        </div>
      </div>
    </div>
  </div>
</main>

@auth

<div class="cta bg-primary-subtle">
  <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center my-4 p-4">
        <div class="col-md-4 d-flex align-items-center">
          <h3 class="mb-3 mb-md-0 fw-bold">Kebijakan Tanpa Pintu Yang Salah!</h3>
        </div>
        <a class="btn btn-outline-primary" href="/dashboard">Lapor</a>
      </footer>
  </div>
</div>

@else

<div class="cta bg-primary-subtle">
  <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center my-4 p-4">
        <div class="col-md-4 d-flex align-items-center">
          <h3 class="mb-3 mb-md-0 fw-bold">Kebijakan Tanpa Pintu Yang Salah!</h3>
        </div>
        <a class="btn btn-outline-primary" href="/login">Login</a>
      </footer>
  </div>
</div>

@endauth

@section('guide')

@include('partials.guide')

@endsection
    
@section('footer')

@include('partials.footer')
    
@endsection