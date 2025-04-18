@extends('admin.layouts.main')

@include('admin.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    
    @include('admin.layouts.link')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Masyarakat</h1>
      </div>

      <br>

      <h3 class="mb-3">Daftar Masyarakat</h3>
      <p>Jumlah masyarakat : {{ $users->count() }}</p>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Umur</th>
              <th scope="col">Role</th>
              {{-- <th scope="col">Password</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $data)
                
            <tr>
              <td>{{ $data->name }}</td>
              <td>{{ $data->username }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->tgl_lahir }}</td>
              <td>{{ $data->umur }} Tahun</td>
              <td>{{ $data->level }}</td>
              {{-- <td>{{ $data->password }}</td>  --}}
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
