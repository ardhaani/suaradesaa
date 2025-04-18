@extends ('layouts.main')

@include('partials.navbar')

@section('container')

<h1 class="text-center">Status Laporan</h1>
<hr class="m-5">

<div class="d-flex align-items-center justify-content-center fs-4">
  <div class="row">
    @foreach ($statuses as $status)
    <div class="col-3">
      <a class="text-decoration-none p-2" href="/status/{{ $status->slug }}"><button class="btn btn-primary">{{ $status->name }}</button></a>
    </div>
    @endforeach
  </div>
</div>

@endsection
    
@section('footer')

@include('partials.footer')
    
@endsection