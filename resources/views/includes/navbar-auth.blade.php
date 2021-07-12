<!-- navigasi -->
      <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            GOLF COURSE
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jadwal-index') }}">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            
                  <!-- dekstop navbar menu -->
          {{-- <ul class="navbar-nav d-none d-lg-flex">
             <li class="nav-item">
              <a class="nav-link" href="">Penyewaan</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="">Lapangan</a>
            </li> --}}
          
          </ul>

          <!-- navbar mobile -->
          {{-- <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
            @endguest  --}}
        </div>
      </div>
    </nav>