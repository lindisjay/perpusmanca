<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpusline SMANCA</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset/modernise/images/logos/Smanca_logo.png') }}" />

     <!--Data Table css-->
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <!-- End Data Table css-->

    <link rel="stylesheet" href="{{ asset('asset/modernise/css/styles.min.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="{{ asset('asset/sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <img src="{{ asset('asset/modernise/images/logos/perpus.png') }}" width="220" alt="">
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                @role('admin')
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">MASTER DATA</span>
                            </li>

                            <li class="sidebar-item">

                                <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">User</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-item">
                                <a class="sidebar-link" href="#" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">anggota</span>
                                </a>
                            </li> --}}
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('buku.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-books"></i>
                                    </span>
                                    <span class="hide-menu">Buku</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('transaksi.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-checklist"></i>
                                    </span>
                                    <span class="hide-menu">Transaksi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('laporan.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Laporan</span>
                                </a>
                            </li>
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">AUTH</span>
                            </li>

                            <!--<li class="sidebar-item">
                                    <a class="sidebar-link" href="" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user-plus"></i>
                                        </span>
                                        <span class="hide-menu">Register</span>
                                    </a>
                                </li> -->

                        <li class="sidebar-item">
                            <a class="sidebar-link" href=""
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                data-toggle="modal" data-target="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li> -->

                        <!-- Logout Modal-->

                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!-- <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div> -->
                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </nav>
                @endrole

                <nav class="sidebar-nav scroll-sidebar" data-simplebar="" @role('admin') style="display: none;"@endrole>
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">MASTER DATA</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('katalog.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-books"></i>
                                    </span>
                                    <span class="hide-menu">Katalog Buku</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('transaksi.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-checklist"></i>
                                    </span>
                                    <span class="hide-menu">Riwayat Transaksi</span>
                                </a>
                            </li>

                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">AUTH</span>
                            </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href=""
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                data-toggle="modal" data-target="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li> -->

                        <!-- Logout Modal-->

                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!-- <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div> -->
                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->

            </header>
            <!--  Header End -->

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>

            <script src="{{ asset('asset/modernise/libs/jquery/dist/jquery.min.js') }}"></script>
            <script src="{{ asset('asset/modernise/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('asset/modernise/js/sidebarmenu.js') }}"></script>
            <script src="{{ asset('asset/modernise/js/app.min.js') }}"></script>
            <script src="{{ asset('asset/modernise/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
            <script src="{{ asset('asset/modernise/libs/simplebar/dist/simplebar.js') }}"></script>
            <script src="{{ asset('asset/modernise/js/dashboard.js') }}"></script>

            <!-- Bootstrap core JavaScript (from layout template)-->
            <script src="asset/vendor/jquery/jquery.min.js"></script>
            <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Bootstrap core JavaScript-->

            <!--Data Table JS-->
            <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myDataTable').DataTable();
                });
            </script>
            <!-- End Data Table JS-->

</body>

</html>
