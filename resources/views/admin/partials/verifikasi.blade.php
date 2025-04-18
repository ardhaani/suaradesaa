<form action="/admin/posts/{{ $post->slug }}" method="get" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-warning btn-sm p-2"><i class="bi bi-arrow-repeat"></i></button>
</form>
<form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
    @method('patch')
    @csrf
    <button type="submit" class="btn btn-success btn-sm p-2"><i class="bi bi-patch-check"></i></button>
</form>
<form action="/admin/posts/{{ $post->slug }}/edit" method="get" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm p-2"><i class="bi bi-x-circle"></i></button>
</form>