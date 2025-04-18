@extends('admin.layouts.main')

@include('admin.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    
    @include('admin.layouts.link')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Petugas</h1>
      </div>

      <br>

      <h3 class="mb-3">Daftar Petugas</h3>
      <p>Jumlah petugas dan admin : {{ $users->count() }}</p>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $data)
                
            <tr>
              <td>{{ $data->name }}</td>
              <td>{{ $data->username }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->level }}</td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
