@extends('admin.layouts.main')

<style>
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.5s;
    display: block;
    margin-left: auto;
    margin-right: auto
}
#myImg:hover {opacity: 0.7;}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding: 100px; /* Location of the box */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
@-webkit-keyframes zoom {
    from {-webkit-transform:scale(1)}
    to {-webkit-transform:scale(2)}
}
 
@keyframes zoom {
    from {transform:scale(0.4)}
    to {transform:scale(1)}
}
@-webkit-keyframes zoom-out {
    from {transform:scale(1)}
    to {transform:scale(0)}
}
@keyframes zoom-out {
    from {transform:scale(1)}
    to {transform:scale(0)}
}
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 1s;
    animation-name: zoom;
    animation-duration: 1s;
}
.out {
  animation-name: zoom-out;
  animation-duration: 0.6s;
}
</style>
@include('admin.layouts.navbar')

<div class="container-fluid">
  <div class="row">
    
    @include('admin.layouts.link')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

    @if (session()->has('admin'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('admin') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    @if (session()->has('petugas'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('petugas') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <br>

      <div class="mb-3">
        <h4>Daftar Laporan</h4>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-6 col-lg-6 mb-3">
                <a class="text-decoration-none text-dark" href="/laporan">
                  <div class="card p-3 bg-primary-subtle border-secondary-subtle">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="bg-primary p-3 align-items-center rounded border border-secondary-subtle">
                            <i class="bi bi-person-circle fs-5"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Jumlah Aduan</h6>
                          <h6 class="font-extrabold mb-0">{{ $postcount }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>  
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-6 col-lg-3 col-md-6">
                  <a class="text-decoration-none text-dark" href="/terima">
                    <div class="card bg-info-subtle border-secondary-subtle">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="bg-info p-3 align-items-center rounded border border-secondary-subtle">
                              <i class="bi bi-box-arrow-in-down-right fs-5"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">
                            Diterima
                          </h6>
                          <h6 class="font-extrabold mb-0">{{ $status1->count() }}</h6>
                        </div>
                        </div>
                      </div>
                    </div>
                 </a>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <a class="text-decoration-none text-dark" href="/proses">
                  <div class="card bg-warning-subtle border-secondary-subtle">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="bg-warning p-3 align-items-center rounded border border-secondary-subtle">
                            <i class="bi bi-arrow-left-right fs-5"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Diproses</h6>
                          <h6 class="font-extrabold mb-0">{{ $status2->count() }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <a class="text-decoration-none text-dark" href="/selesai">
                  <div class="card bg-success-subtle border-secondary-subtle">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="bg-success p-3 align-items-center rounded border border-secondary-subtle">
                            <i class="bi bi-patch-check fs-5"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Selesai</h6>
                          <h6 class="font-extrabold mb-0">{{ $status3->count() }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a class="text-decoration-none text-dark" href="/tolak">
                  <div class="card bg-danger-subtle border-secondary-subtle">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="bg-danger p-3 align-items-center rounded border border-secondary-subtle">
                            <i class="bi bi-x-circle fs-5"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Ditolak</h6>
                          <h6 class="font-extrabold mb-0">{{ $status4->count() }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>

          <br>
          <div class="mb-3">
            <h4>Daftar User</h4>
          </div>
            <section class="row">
              
          <div class="col-12 col-lg-9">
            <div class="row">
                  <div class="col-6 col-lg-6">
                    <a class="text-decoration-none text-dark" href="/petugas">
                      <div class="card p-3 bg-dark-subtle border-secondary-subtle">
                        <div class="card-body px-4 py-4-5">
                          <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="bg-secondary p-3 align-items-center rounded border border-secondary-subtle">
                                <i class="bi bi-person-badge fs-5"></i>
                              </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">
                                Jumlah Petugas
                              </h6>
                              <h6 class="font-extrabold mb-0">{{ $petugas->count() }}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-6 col-lg-6">
                    <a class="text-decoration-none text-dark" href="/masyarakat">
                      <div class="card p-3 bg-dark-subtle border-secondary-subtle">
                        <div class="card-body px-4 py-4-5">
                          <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                              <div class="bg-dark text-secondary p-3 align-items-center rounded border border-secondary-subtle">
                                <i class="bi bi-person-circle fs-5"></i>
                              </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                              <h6 class="text-muted font-semibold">Jumlah Masyarakat</h6>
                              <h6 class="font-extrabold mb-0">{{ $masyarakat->count() }}</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              </div>
            </section>
          </div>    

    </main>
  </div>
</div>