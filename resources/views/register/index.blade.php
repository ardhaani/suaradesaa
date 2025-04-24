@extends('layouts.main')
@section('container')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tgl_lahir").datepicker({
      onSelect: function(value, ui) {
        var today = new Date(),
            age = today.getFullYear() - ui.selectedYear;
        $('#umur').val(age);
      },
      dateFormat: 'dd-mm-yy', 
      changeMonth: true, 
      changeYear: true, 
      yearRange: "c-100:c+0"
    });
  });
</script>

<style>
  body {
    background-color: #e6f0ff;
    font-family: 'Segoe UI', sans-serif;
  }

  .card-box {
    background: white;
    border-radius: 30px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    max-width: 420px;
    padding: 40px;
    margin: 60px auto;
    text-align: center;
  }

  .form-control {
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 1rem;
    margin-bottom: 16px;
    border: 1px solid #ccc;
  }

  .btn-gradient {
    background: linear-gradient(to right, #00c6ff, #0072ff);
    color: white;
    border: none;
    padding: 14px;
    width: 100%;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1rem;
    transition: opacity 0.3s;
  }

  .btn-gradient:hover {
    opacity: 0.9;
  }

  .text-blue {
    color: #0072ff;
    font-weight: 600;
    text-decoration: none;
  }

  .text-blue:hover {
    text-decoration: underline;
  }
</style>

<div class="card-box">
  <h2><strong>Selamat Datang di <span class="text-blue">SuaraDesa</span></strong></h2>
  <p>Buat akun untuk mulai laporkan dan pantau pembangunan desa!</p>

  <form action="/register" method="POST" class="text-start mt-4">
    @csrf

    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ old('nik') }}" required>
    @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" required>
    @error('tgl_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="text" name="umur" id="umur" class="form-control @error('umur') is-invalid @enderror" placeholder="Umur" readonly required>
    @error('umur')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>
    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <button type="submit" class="btn-gradient mt-2">Daftar</button>
  </form>

  <div class="mt-4">
    Sudah punya akun? <a href="/login" class="text-blue">Login Sekarang!</a>
  </div>
</div>

@endsection
