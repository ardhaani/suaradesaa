@extends ('layouts.main')

@include('partials.navbar')

@section('container')

<!-- Table -->
    <!-- Header -->
    <div class="container mt-5 mb-2">

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
        <div class="header">
          <h1 class="fs-2 text-center fw-bold mb-7">Laporan Aspirasi dan Pengaduan Online Masyarakat</h1>
          <h3 class="fs-5 text-center fw-semibold mb-5">Berani BerSUARA Untuk Pelayanan Publik yang Lebih Baik</h3>
          <hr>
        </div>
      </div>
      <!-- Header -->
  
      <!-- Form -->
    <div class="table">
      <div class="container-sm d-flex justify-content-center align-items-center mt-5">
        <div class="row border rounded p-3"  style="box-shadow: 0 10px 30px 0 rgb(0 0 0 / 20%);">
          <div class="col">
          <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-3">
              <input type="text" name="judul" id="judul" class="form-control rounded-top @error('judul') is-invalid @enderror" placeholder="Ketik Judul Laporan Anda*" required autofocus value="{{ old('judul') }}">
              <label for="judul"></label>
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="m-3">
              <textarea type="text" id="isi" name="isi" rows="5" class="form-control rounded-top @error('isi') is-invalid @enderror" placeholder="Ketik Isi Laporan Anda*" required></textarea>
              <label for="isi"></label>
              @error('isi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="m-3">
              <select id="category" name="category_id" class="form-control">
                <option class="text-muted">Pilih Kategori</option>
                @foreach ($categories as $category)
                    
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                
                @endforeach
                {{-- <option value="2">Infrastruktur</option>
                <option value="3">Lain-lain</option> --}}
              </select>
              <label for="category"></label>
              @error('category')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="m-3 d-flex">
              <input class="form-control me-3 @error('image') is-invalid @enderror" type="file" id="image" name="image"> 
              <label for="image"></label>
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
      <!-- Form -->
  <!-- Table -->
  
@endsection

@section('guide')
    
@include('partials.guide')

@endsection
    
@section('footer')

@include('partials.footer')

<script>
    // const judul = document.querySelector('#judul');
    // const slug = document.querySelector('#slug');

    // judul.addEventListener('change', function() {
    //   fetch('/dashboard/post/checkSlug?judul=' + judul.value)
    //   .then(response => response.json())
    //   .then(data => slug.value = data.slug)
    // });
</script>
    
@endsection