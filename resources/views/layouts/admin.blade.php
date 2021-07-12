<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{$title ?? 'GOLF' }}</title>
{{-- style --}}

@stack('before-style')
@include('includes.style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

@stack('after-style')    

  </head>

  <body>
    <!-- navigasi -->
     <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ Route('admin-pelanggan') }}"
              class="list-group-item-action list-group-item {{ (request()->is('dashboard/pelanggan*')) ? 'active' : ''}}"
              >Pelanggan</a
            >
            <a
              href="{{route('admin-penyewaan') }}"
              class="list-group-item-action list-group-item {{ (request()->is('dashboard/penyewaan*')) ? 'active' : ''}}"
              >Penyewaan</a
            >
            <a
              href="{{ route('admin-pembayaran') }}"
              class="list-group-item-action list-group-item {{ (request()->is('dashboard/pembayaran*')) ? 'active' : '' }} "
              >Pembayaran</a
            >
             <a
              href="{{ route('admin-jadwal') }}"
              class="list-group-item-action list-group-item {{ (request()->is('dashboard/jadwal*')) ? 'active' : ''}}"
              >Jadwal</a
            >
            <a
              href="{{ Route('admin-lapangan') }}"
              class="list-group-item-action list-group-item {{ (request()->is('dashboard/lapangan*')) ? 'active' : ''}}"
              >Lapangan</a
            >
            @if (Auth::user()->roles === 'ADMIN')
                
                
            <a
            href="{{ Route('admin-karyawan') }}"
            class="list-group-item-action list-group-item {{ request()->is('dashboard/karyawan*') ? 'active' : '' }}"
            >Karyawan</a
            >
            @endif
            <a
              href="{{ Route('admin-laporan') }}"
              class="list-group-item-action list-group-item {{ request()->is('dashboard/laporan*') ? 'active' : '' }}"
              >Laporan</a
            >
          </div>
        </div>

        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
            aria-labelledby="navbarDropdown"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; menu
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- dekstop navbar menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                  
                </ul>

                <!-- navbar mobile -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block ml-auto"> Logout </a>
                  </li>
                
                </ul>
              </div>
            </div>
          </nav>

          <!-- section Content -->
          @yield('content')
        
        </div>
      </div>
    @include('includes.footer')
  
    <!-- Bootstrap core JavaScript -->
    {{-- script --}}

    @stack('before-script')
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

  <script>
    AOS.init();
  </script>
    <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>  
    @stack('after-script')
  
  </body>
</html>
