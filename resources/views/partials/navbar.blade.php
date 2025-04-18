   <!-- Nav -->
   <nav class="navbar navbar-expand-lg bg-primary-subtle">
    <div class="container">
      <a class="navbar-brand text-black fw-bold" href="/" style="font-family: 'Poppins', sans-serif;">
        SuaraDesa
      </a>      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex flex-wrap align-items-center justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title==="About")?'active':'' }}" href="/about">About</a>
          </li>
          @auth
          @cannot('admin')
          @can('user')

          <li class="nav-item">
            <a class="nav-link {{ ($title==="Lapor")?'active':'' }}" href="/dashboard">Lapor</a>
          </li>
          @endcan
          <li class="nav-item">
            <a class="nav-link {{ ($title==="All History")?'active':'' }}" href="/history">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title==="Status Laporan")?'active':'' }}" href="/status">Status</a>
          </li>

          @endcannot
          @endauth
        </ul>
      </div>

      @auth

      <div>
        <ul class="navbar-nav">
          <li class="nav-item dropdown dropstart" style="cursor: pointer;">
            <a class="nav-link" data-bs-toggle="dropdown"><i class="bi bi-person-circle me-2"></i>{{ auth()->user()->username }}</a>
            <ul class="dropdown-menu">
              @can('petugas')
              <li>

                <a href="/admin" class="text-decoration-none"><button type="button" class="btn btn-sm dropdown-item"><i class="bi bi-person-bounding-box"></i> Admin</button></a>
                
              </li>
              @endcan
              <form action="/logout" method="post">
                @csrf
                <li><button type="submit" class="btn btn-sm dropdown-item"><i class="bi bi-box-arrow-left"></i> Log Out</button></li>
              </form>
            </ul>
          </li>
        </ul>
      </div>

      @else

      <div class="d-flex">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="btn btn-sm mx-2" href="/login">Log In</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-sm btn-outline-primary mx-2" href="/register">Daftar</a>
          </li>
        </ul>
      </div>
      
      @endauth
    </div>
  </nav>
  <!-- Nav -->