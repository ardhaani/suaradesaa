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
  }

  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding-top: 50px;
  }

  .form-control {
    border-radius: 10px;
    padding: 12px;
    font-size: 1rem;
    margin-bottom: 16px;
  }

  .btn-register {
    background-color: #0072ff;
    color: white;
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 10px;
    font-weight: bold;
    transition: background 0.3s;
  }

  .btn-register:hover {
    background-color: #005cd6;
  }

  .text-center a {
    color: #0072ff;
    font-weight: 500;
  }

  .text-center a:hover {
    text-decoration: underline;
  }
</style>

<div class="form-container text-center">
  <h2><strong>Selamat Datang di <span style="color:#0072ff;">SuaraDesa</span></strong></h2>
  <p>Buat akun untuk mulai laporkan dan pantau pembangunan desa!</p>

  <form action="/register" method="POST" class="text-start">
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

    <button type="submit" class="btn-register mt-2">Daftar</button>
  </form>

  <div class="text-center mt-3">
    Sudah punya akun? <a href="/login">Login Sekarang!</a>
  </div>
</div>

@endsection
