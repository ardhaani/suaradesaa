@if ($post->status)
@if ($post->status->id == 1 )
<td class="mt-2 ms-2 text-decoration-none badge bg-primary-subtle text-wrap text-primary"> {{ $post->status->name }}</td>
@elseif ($post->status->id == 2 )
<td class="mt-2 ms-2 text-decoration-none badge bg-warning-subtle text-wrap text-warning"> {{ $post->status->name }}</td>
@elseif ($post->status->id == 3 )
<td class="mt-2 ms-2 text-decoration-none badge bg-success-subtle text-wrap text-success"> {{ $post->status->name }}</td>
@elseif ($post->status->id == 4 )
<td class="mt-2 ms-2 text-decoration-none badge bg-danger-subtle text-wrap text-danger"> {{ $post->status->name }}</td>
@endif
@else
<td class="mt-2 ms-2 text-decoration-none badge bg-secondary-subtle text-wrap text-secondary">Status Tidak Tersedia</td>
@endif
