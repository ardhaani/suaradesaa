<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
  </head>

  <body>
    @include('admin.layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.link')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row flex-lg-row align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <div id="hari"></div>
                    </div>
                    <div class="col-10 col-sm-8 col-lg-6">
                        <div id="kategori"></div>
                    </div>
                    <div class="col-10 col-sm-8 col-lg-6">
                        <div id="umur"></div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
      AOS.init();
      
      //Aduan harian
      Highcharts.chart('hari', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Pengaduan Harian'
    },
    xAxis: {
        categories:{!! json_encode($p) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Aduan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">Tanggal{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total',
        data: [{{ $p }}]
    },{
        name: 'Terima',
        data: [{{ $p_terima }}]
    },{
        name: 'Proses',
        data: [{{ $p_proses }}]
    },{
        name: 'Selesai',
        data: [{{ $p_selesai }}]
    },{
        name: 'Tolak',
        data: [{{ $p_tolak }}]
    },],
    });
      
      //Aduan kategori
      Highcharts.chart('kategori', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Pengaduan Berdasarkan Kategori'
    },
    xAxis: {
        categories:{!! json_encode($p) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Aduan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">Tanggal{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total',
        data: [{{ $p }}]
    },{
        name: 'Pelayanan',
        data: [{{ $kat_satu }}]
    },{
        name: 'Infrastruktur',
        data: [{{ $kat_dua }}]
    },{
        name: 'Lainnya',
        data: [{{ $kat_tiga }}]
    },],
    });

      //Umur user
      Highcharts.chart('umur', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Range user berdasarkan Umur'
    },
    xAxis: {
        categories:{!! json_encode($u) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Aduan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">Tanggal{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total user',
        data: [{{ $u }}]
    },{
        name: 'Kurang dari 10 tahun',
        data: [{{ $u_nol }}]
    },{
        name: '10-19 tahun',
        data: [{{ $u_satu }}]
    },{
        name: '20-29 tahun',
        data: [{{ $u_dua }}]
    },{
        name: '30-39 tahun',
        data: [{{ $u_tiga }}]
    },{
        name: '40-49 tahun',
        data: [{{ $u_empat }}]
    },{
        name: 'Lebih dari tahun',
        data: [{{ $u_lima }}]
    },],
    });
    </script>
</body>
</html>