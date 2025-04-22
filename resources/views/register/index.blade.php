@extends('layouts.main')
@section('container')

<link rel="stylesheet" href="/css/register.css">
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
      dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "c-100:c+0"
    });
  });
</script>

<section class="vh-100 d-flex align-items-center justify-content-center" style="background-color: #e6f0ff;">
  <div class="auth-card">
    <h2 class="text-center auth-title">Selamat Datang di <span style="color:#0072ff;">SuaraDesa</span></h2>
    <p class="auth-subtitle">Buat akun untuk mulai laporkan dan pantau pembangunan desa!</p>

    <form action="/register" method="POST">
      @csrf

      <div class="mb-3">
        <input type="text" name="name" class="form-control auth-input @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <input type="number" name="nik" class="form-control auth-input @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ old('nik') }}" required>
        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control auth-input @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" required>
        @error('tgl_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <input type="text" name="umur" id="umur" class="form-control auth-input @error('umur') is-invalid @enderror" placeholder="Umur" readonly required>
        @error('umur')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <input type="text" name="username" class="form-control auth-input @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>
        @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <input type="email" name="email" class="form-control auth-input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-4">
        <input type="password" name="password" class="form-control auth-input @error('password') is-invalid @enderror" placeholder="Password" required>
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-gradient">Daftar</button>
      </div>
      
      <button type="submit" class="btn btn-gradient">Daftar</button>
    </form>

    <div class="auth-footer mt-3">
      Sudah punya akun? <a href="/login">Login Sekarang!</a>
    </div>
  </div>
</section>

@endsection
