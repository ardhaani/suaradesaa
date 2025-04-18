<form action="/search" method="GET">  
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="bg-dark navbar-brand col-md-3 col-lg-2 me-0 p-3 fs-6" href="/admin">SuaraDesa Suara Kita!</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="input-group border rounded border-dark">
        <input type="text" class="form-control form-control-dark rounded-0" placeholder="Search.." name="search">
        <button class="btn btn-dark border border-secondary" type="submit">Search</button>
      </div>
    </form>

    <div class="dropdown dropstart">
      <button class="btn btn-sm btn-dark border-light mx-3" type="button" data-bs-toggle="dropdown">
        <i class="bi bi-person fs-3"></i>
      </button>
      <ul class="dropdown-menu">
        <li>
          @can('petugas')
              
          <a href="/" class="text-decoration-none"><button type="button" class="btn btn-sm dropdown-item"><i class="bi bi-person-bounding-box"></i> User</button></a>

          @endcan
        </li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <li><button type="submit" class="btn btn-sm dropdown-item"><i class="bi bi-box-arrow-left"></i> Log Out</button></li>
          </form>
        </li>
      </ul>
    </div>
    
</header>

  