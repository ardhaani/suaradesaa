@extends('admin.layouts.main')
<link rel="stylesheet" href="css/login.css">

@include('admin.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    
    @include('admin.layouts.link')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftarkan Petugas</h1>
      </div>

      <br>

      <div class="row d-flex align-items-center justify-content-center">
        <div class="col">
          <main class="form-registration">
              <form action="/tambah" method="POST">
              @csrf
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top rounded-bottom-0 @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                  <label for="name">Name</label>
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" name="username" class="form-control rounded-0 @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                  <label for="name">Username</label>
                  @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-bottom rounded-top-0 @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <h6 class="mx-2 mt-3">Pilih Role</h6>
                <select class="form-select" name="level" id="level" required>
                  <label for="level">Pilih Role</label>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                  </select>  
                <button class="w-100 btn btn-lg btn-outline-dark mt-4" type="submit">Daftar</button>
              </form>
            </main>
        </div>
      </div>

    </main>
  </div>
</div>
