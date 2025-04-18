@extends('layouts.main')
@section('container')

<link rel="stylesheet" href="css/login.css">

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
       
    dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
    });
      
  });
  </script>
 

<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrasi</p>

                <form action="/register" method="POST" class="ms-1">
                  @csrf
                  
                    <div class="form-floating mb-4">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                      <label for="name">Nama</label>
                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" required value="{{ old('nik') }}">
                      <label for="nik">NIK</label>
                      @error('nik')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="text" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir" required>
                      <label for="">Tanggal lahir</label>
                      @error('tgl_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="text" name="umur" class="form-control @error('umur') is-invalid @enderror" id="umur" placeholder="Umur" required readonly >
                      <label for="">Umur</label>
                      @error('umur')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                      <label for="name">Username</label>
                      @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                      <label for="email">Email</label>
                      @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                      <label for="password">Password</label>
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                  <div class="d-flex justify mb-4-content-start mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                  <p class="small">Sudah punya akun? <a href="/login">Login Sekarang!</a></p>

                </form>

              </div>

              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="img/regist.jpg" class="img-fluid" alt="">   
              </div>     
              
            </div>
          </div>
        
    </div>
  </div>
</section>

@endsection