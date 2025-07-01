<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predict | @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- CSS Custom -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">


</head>

<body>

    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">

            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item">
                        <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark"
                            href="javascript:void(0)">
                            <i class="ti-menu" style="color: blue;"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                            href="javascript:void(0)">
                            <i class="icon-menu" style="color: blue;"></i>
                        </a>
                    </li>

                    <!-- Search -->
                    <!-- ============================================================== -->
                    {{-- <li class="nav-item">
                        <form class="app-search d-none d-md-block d-lg-block">
                            <input type="text" class="form-control" placeholder="Search & enter">
                        </form>
                    </li> --}}
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar bg-info">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro">
                        <a class=" waves-effect waves-dark style-none" href="{{ url('admin/dashboard') }}"
                            aria-expanded="false">
                            <h4 class="mb-4 text-center text-black hide-menu">Administrator</h4>
                        </a>

                    </li>
                    <li>
                        <a href="{{ url('admin/dashboard') }}"
                            class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/dashboard (2).png') }}" alt="dashboard" width="30px"
                                class="me-2">
                            <span class="hide-menu">Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('data-mahasiswa') }}"
                            class="nav-link {{ Request::is('data-mahasiswa') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/datamhs.png') }}" alt="data" width="30px" class="me-2">
                            <span class="hide-menu">Data Mahasiswa </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('data-user') }}"
                            class="nav-link {{ Request::is('data-user') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/user.png') }}" alt="data" width="30px" class="me-2">
                            <span class="hide-menu">Data User </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/catatan') }}"
                            class="nav-link {{ Request::is('admin/catatan') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/solusi.png') }}" alt="prediksi" width="30px" class="me-2">
                            <span class="hide-menu">Data Kelulusan Terlambat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('solusi') }}"
                            class="nav-link {{ Request::is('solusi') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/catatan.png') }}" alt="dashboard" width="30px" class="me-2">
                            <span class="hide-menu">Solusi Kelulusan </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/login') }}"
                            class="nav-link {{ Request::is('/login') ? 'active' : '' }} waves-effect waves-dark"
                            href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/logout.png') }}" alt="logout" width="30px"
                                class="me-2"><span class="hide-menu">Logout</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">

                <!-- Main Content -->
                <div class="content col-md-10 p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    {{-- <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script> --}}
    <!--Wave Effects -->
    {{-- <script src="{{ asset('dist/js/waves.js')}}"></script> --}}
    <!--Menu sidebar -->
    {{-- <script src="{{asset('dist/js/sidebarmenu.js')}}"></script> --}}
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}

</body>

</html>
