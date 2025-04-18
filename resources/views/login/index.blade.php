@extends('layouts.main')

@section('container')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: #cfe2ff;
    min-height: 100vh;
    overflow-x: hidden;
  }
  .card-custom {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 2rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(8px);
  }
  .form-control {
    border-radius: 1rem;
    box-shadow: none;
    transition: none !important;
  }
  .form-control:focus {
    box-shadow: none;
    outline: none;
    border-color: #86b7fe;
  }
  .btn-primary {
    background: linear-gradient(to right, #00c6ff, #0072ff);
    border: none;
    border-radius: 2rem;
    padding: 12px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  .btn-primary:hover {
    background: linear-gradient(to right, #0072ff, #00c6ff);
    transform: scale(1.05);
  }
  .glass-title {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    padding: 0.75rem 1.5rem;
    backdrop-filter: blur(5px);
    color: #333;
  }
  .toggle-password {
    position: absolute;
    right: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 2;
    color: #6c757d;
  }
</style>

<section class="vh-100 d-flex align-items-center">
  <div class="container py-5">
    <div class="row justify-content-center">

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('sukses') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="col-md-6 col-lg-5">
        <div class="card card-custom p-5">
          <div class="text-center mb-4">
            <h3 class="fw-bold glass-title">Selamat Datang di <span class="text-primary">SuaraDesa</span></h3>
            <p class="text-muted mt-2">Laporkan masalah, pantau perkembangan, dan ikut bangun desa!</p>
          </div>
          <form action="/login" method="post">
            @csrf

            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
              <label for="email">Email</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating mb-4 position-relative">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              <label for="password">Kata Sandi</label>
              <i class="bi bi-eye toggle-password" id="togglePassword"></i>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
            <p class="small text-center">Belum punya akun? <a href="/register" class="text-decoration-none fw-semibold">Registrasi Sekarang!</a></p>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
  });
</script>

@endsection
