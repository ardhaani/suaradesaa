@component('mail::message')


@foreach ($komen as $komentar)
Pengaduan Anda ditanggapi 
<b>{{ $komentar->user->name }}</b>
@component('mail::panel')
"{{ $komentar->comments }}"
@endcomponent

@component('mail::subcopy')
{{ $komentar->created_at }}
@endcomponent

@endforeach

Terima kasih,<br>
Admin | Pengaduan Masyarakat
@endcomponent
