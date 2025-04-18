<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #212529;
      color: white;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .footer {
      text-align: right;
      margin-top: 20px;
    }

    .footer p {
      margin: 0;
      padding: 0;
    }

    @page {
      size: landscape;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Data Pengaduan</h1>

    <table id="customers">
      <thead>
        <tr>
          <th>Nama Pengguna</th>
          <th>Judul</th>
          <th>Isi</th>
          <th>Status</th>
          <th>Tanggal Aduan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $post)
        <tr>
          <td>{{ $post->user->name }}</td>
          <td>{{ $post->judul }}</td>
          <td>{{ $post->isi }}</td>
          <td>{{ $post->status->name }}</td>
          <td>{{ $post->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="footer">
      <p>Dicetak pada: {{ date('d M Y H:i') }}</p>
      <p>Oleh: {{ $user_login }}</p>
    </div>
  </div>

</body>
</html>
