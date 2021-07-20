<!-- navigasi -->
      <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
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
            <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('jadwal-index') }}">Jadwal</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('lapangan-pages') }}">Lapangan</a>
            </li>
                    @if (Route::has('login'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                    <a class="nav-link btn btn-success px-4 text-white" href="{{ route('register') }}"
                        >Sign Up</a
                    >
                    </li>
                    @endif
            
            
            @else
                  <!-- dekstop navbar menu -->
          <ul class="navbar-nav d-none d-lg-flex">
             <li class="nav-item">
              <a class="nav-link" href="{{ route('history-sewa', Auth::user()->id) }}">Penyewaan</a>
            </li>
             
            <li class="nav-item dropdown">
              <a
                href=""
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
              
                Hi, {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu">
                @if (Auth::user()->roles === 'ADMIN' || Auth::user()->roles === 'KARYAWAN')
                <a href="{{ route('admin-pelanggan') }}" class="dropdown-item">Dashboard</a>                    
                @endif
                <a href="{{ route('profile-account', Auth::user()->name) }}" class="dropdown-item">Profile Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </div>
            </li>
           
                
            {{-- <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
            @php
                 $carts = \App\Cart::where('users_id', Auth::user()->id)->count()
            @endphp
            @if ($carts > 0)
                <img src="/images/icon-cart-filled.svg" alt="cart" />
                <div class="card-badge">{{ $carts }}</div>
                
              @else 
              <img src="/images/icon-cart-empty.svg" alt="cart" />
                @endif

              </a>

            </li> --}}
            
          </ul>

          <!-- navbar mobile -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
            @endguest 
        </div>
      </div>
    </nav>