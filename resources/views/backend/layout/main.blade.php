<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Repository STTII Yogyakarta</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Repository STTII</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('dashboard.profile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('dashboard.resetPassword')}}">Reset Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); confirmLogout();">Logout</a></li>
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="GET" style="display: none;"></form>
                            <script>
                                function confirmLogout() {
                                    if (confirm("Apakah Anda yakin ingin logout?")) {
                                        document.getElementById('logout-form').submit();
                                    }
                                }
                            </script>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="{{ route('kategori.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Daftar Kategori
                            </a>

                            <a class="nav-link" href="{{ route('periode.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-days"></i></div>
                                Daftar Periode
                            </a>

                            <a class="nav-link" href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-server"></i></div>
                                Daftar Akun
                            </a>

                            <a class="nav-link" href="{{ route('dosen.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Daftar Dosen
                            </a>

                            <a class="nav-link" href="{{ route('berita.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Daftar Surat Keputusan
                            </a>

                            <a class="nav-link" href="{{ route('repositorimahasiswa.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Repository Mahasiswa
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @yield('content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Repository STTII Yogyakarta | 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
