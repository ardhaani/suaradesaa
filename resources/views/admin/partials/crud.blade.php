<a href="/posts/{{ $post->slug }}" class="btn btn-primary btn-sm p-2"><i class="bi bi-eye"></i></a>
<form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-danger btn-sm p-2" onclick="return confirm('Apakah anda ingin menghapus data?')"><i class="bi bi-trash"></i></button>
</form>