<tr>
	<td class="header">
		<a href="{{ $url }}" style="display: inline-block;">
			@if (trim($slot) === 'Laravel')
			<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjSkfsZk_bvobcGql64Q_fGsqeqxy3W2iwL6D6-CYeSRxEcWAp9SalXsPYF2ohFqhSvvFnwST0ZHE6MEgLsUd5bBmWpi8oGVOZ7HCkAy7v007S-eH0lX8f2w7J55s_eSDt2EI7xzKzcfJIJUK99ytt-yZskfyVuQDlW0jPjXoot643XZuTblf3Y0FkQsL2N/s1600/logo.png" class="logo" alt="Aplikasi Pengaduan Masyarakat">
			@else
			{{ $slot }}
			@endif
		</a>
	</td>
</tr>
