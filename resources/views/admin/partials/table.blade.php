<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Judul</th>
      <th scope="col">Nama</th>
      <th scope="col">Gambar</th>
      <th scope="col">Isi</th>
      <th scope="col">Tanggal Aduan</th>
      <th scope="col" class="pe-4">Status</th>
      <th scope="col" class="pe-5">Action 
        <button type="button" class="btn btn-sm btn-secondary border-0 ms-2" data-bs-toggle="modal" data-bs-target="#action">
          <i class="bi bi-question-circle fs-7"></i>
        </button>
      </th>
      <th scope="col" class="pe-5">Verifikasi 
        <button type="button" class="btn btn-sm btn-secondary border-0 ms-2" data-bs-toggle="modal" data-bs-target="#verifikasi">
          <i class="bi bi-question-circle fs-7"></i>
        </button>
      </th>
    </tr>
  </thead>

  <tbody>
    @foreach ($posts as $post)
    <tr>
      <td>{{ $post->judul }}</td>
      <td>{{ $post->user->name }}</td>
      <td>
        @if ($post->image)
          <img class="myImg" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->judul }}" width="150" height="auto" style="cursor:pointer;">
        @else
          Gambar tidak ada
        @endif
      </td>
      <td>{{ $post->excerpt }}</td>
      <td>{{ $post->created_at->format('d M Y') }}</td>

      @include('admin.partials.loop')

      <td>
        @include('admin.partials.crud')
      </td>  
      <td>
        @include('admin.partials.verifikasi')
      </td>  
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal untuk zoom gambar -->
<div id="myModal" class="modal" style="display:none;">
  <img class="modal-content" id="img01">
</div>

<!-- Modal Action -->
<div class="modal fade" id="action" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Action</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Klik <i class="bi bi-eye"></i> untuk melihat detail laporan
        <br>
        Klik <i class="bi bi-trash"></i> untuk menghapus laporan
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Verifikasi -->
<div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Verifikasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Klik <i class="bi bi-arrow-repeat"></i> untuk mengubah status laporan menjadi diproses
        <br>
        Klik <i class="bi bi-patch-check"></i> untuk mengubah status laporan menjadi selesai
        <br>
        Klik <i class="bi bi-x-circle"></i> untuk mengubah status laporan menjadi ditolak
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Script untuk modal zoom gambar -->
<script>
  var modal = document.getElementById('myModal');
  var modalImg = document.getElementById("img01");

  var images = document.querySelectorAll('.myImg');
  images.forEach(function(img) {
    img.addEventListener('click', function() {
      modal.style.display = "block";
      modalImg.src = this.src;
    });
  });

  modal.onclick = function() {
    modal.style.display = "none";
  }
</script>
