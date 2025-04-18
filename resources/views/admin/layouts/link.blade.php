<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 mt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Admin")?'active':'' }}" aria-current="page" href="/admin">
            <i class="bi bi-house-door"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Chart")?'active':'' }}" aria-current="page" href="/chart">
            <i class="bi bi-house-door"></i> Chart
          </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Daftar Laporan</span>
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Laporan")?'active':'' }}" href="/laporan">
            <i class="bi bi-file-richtext"></i> Semua Laporan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Diterima")?'active':'' }}" href="/terima">
            <i class="bi bi-box-arrow-in-down-right"></i> Laporan Masuk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Diproses")?'active':'' }}" href="/proses">
            <i class="bi bi-arrow-left-right"></i> Sedang Diproses
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Selesai")?'active':'' }}" href="/selesai">
            <i class="bi bi-patch-check"></i> Selesai
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Tolak")?'active':'' }}" href="/tolak">
            <i class="bi bi-x-circle"></i> Ditolak
          </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Daftar User</span>
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Petugas")?'active':'' }}" href="/petugas">
            <i class="bi bi-person-badge"></i> Petugas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Masyarakat")?'active':'' }}" href="/masyarakat">
            <i class="bi bi-person-circle"></i> Masyarakat
          </a>
        </li>
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Tambah Admin dan Petugas</span>
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ ($title==="Tambah Petugas")?'active':'' }}" href="/tambah">
            <i class="bi bi-plus-square"></i> Tambah Petugas
          </a>
        </li>
        @endcan
      </ul>
    </div>
  </nav>