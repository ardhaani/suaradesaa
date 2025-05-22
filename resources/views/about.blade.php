@extends('layouts.main')

@include('partials.navbar')

@section('container')
    <h1 class="text-center mt-5 fw-bold">Get to Know SuaraDesa?</h1>
    <div class="d-flex align-items-center justify-content-center">
        <hr class="border-primary w-50">
    </div>

@include('partials.carousel')

<article class="mb-5">
    <p> Kita semua ingin hidup dalam lingkungan yang aman, nyaman, dan berkeadilan. Namun, kadang-kadang kita menghadapi situasi yang tidak ideal, yang bisa mempengaruhi kenyamanan dan keamanan kita. Terkadang masalah ini bisa berdampak pada masyarakat secara keseluruhan, dan membutuhkan upaya bersama untuk menyelesaikannya.</p>

    <p> Di sinilah SuaraDesa hadir sebagai solusi. Kami menyediakan platform yang aman dan mudah digunakan bagi masyarakat untuk melaporkan masalah atau situasi yang tidak ideal. Kami memahami bahwa melaporkan masalah bisa menjadi proses yang rumit dan tidak menyenangkan. Oleh karena itu, kami berkomitmen untuk membuat proses pelaporan semudah mungkin.</p>

    <p> Kami menyediakan beberapa cara untuk melaporkan masalah, agar masyarakat bisa memilih cara yang paling nyaman bagi mereka. Kamu bisa mengirimkan pengaduan melalui aplikasi seluler kami, situs web, atau telepon. Kami juga menyediakan pilihan untuk melaporkan masalah secara anonim, untuk meminimalkan risiko intimidasi atau ancaman.</p>

    <p> Setelah kamu melaporkan masalah, kami akan segera menindaklanjutinya dan mencari solusi yang tepat. Kami bekerja sama dengan berbagai pihak terkait, seperti kepolisian, instansi pemerintah, atau organisasi masyarakat sipil, untuk menyelesaikan masalah secara efektif dan efisien. Kami juga memastikan bahwa pelapor selalu mendapatkan informasi terbaru mengenai status pengaduan mereka, sehingga mereka bisa selalu up-to-date mengenai perkembangan kasus.</p>

    <p> Kami percaya bahwa pengaduan masyarakat adalah langkah penting dalam membangun masyarakat yang lebih baik. Dengan suara masyarakat yang terdengar, kita dapat memperbaiki situasi yang tidak ideal dan memberikan dampak positif bagi masyarakat secara keseluruhan. Oleh karena itu, kami mengajak seluruh masyarakat untuk ikut berpartisipasi dalam membangun masyarakat yang lebih baik, dengan melaporkan masalah yang terjadi di sekitar mereka.</p>

    <p> Tentu saja, kami memahami bahwa pengaduan masyarakat bukanlah solusi satu-satunya dalam menyelesaikan masalah. Namun, pengaduan masyarakat adalah langkah awal yang penting, yang bisa membantu kita membangun masyarakat yang lebih adil, aman, dan nyaman. Bersama-sama, mari kita berkomitmen untuk memperbaiki situasi yang tidak ideal dan memberikan dampak positif bagi masyarakat kita.</p>    
</article>

<section class="mb-5">
    <h2 class="text-center fw-bold mt-5">Get to Know Developers K7 </h2>
    <div class="d-flex align-items-center justify-content-center">
        <hr class="border-secondary w-25">
    </div>
    <div class="row justify-content-center text-center mt-4">
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/emy.jpg') }}" class="card-img-top" alt="Anggota 1">
                <div class="card-body">
                    <h5 class="card-title">Amaliya Izzah Ramadhani</h5>
                    <p class="card-text">23050974079</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/alin.jpg') }}" class="card-img-top" alt="Anggota 2">
                <div class="card-body">
                    <h5 class="card-title">Aisyah Lintang Zakiyya Arby</h5>
                    <p class="card-text">23050974095</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/PP SSO.jpg') }}" class="card-img-top" alt="Anggota 3">
                <div class="card-body">
                    <h5 class="card-title">Nandana Ardhani</h5>
                    <p class="card-text">23050974113</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/cintya.jpg') }}" class="card-img-top" alt="Anggota 4">
                <div class="card-body">
                    <h5 class="card-title">Cintya Ratna Ayuni</h5>
                    <p class="card-text">23050974115</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('footer')

@include('partials.footer')
    
@endsection
    
