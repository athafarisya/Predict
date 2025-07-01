<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predict | @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- CSS Custom -->
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
                        <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-menu" style="color: blue;"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)">
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
                        <a class=" waves-effect waves-dark style-none" href="{{ url('/prediksi') }}" aria-expanded="false">
                            <h4 class="mb-4 text-center text-black hide-menu">MAHASISWA</h4>
                        </a>

                    </li>
                    {{-- <li>
                        <a href="{{ url('/profile') }}" class="nav-link {{ Request::is('/profile') ? 'active' : '' }} waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('image/profil.png') }}" alt="profil" width="30px" class="me-2"><span class="hide-menu">Profil </span></a>
                    </li> --}}
                    <li>
                        <a href="{{ url('/prediksi') }}" class="nav-link {{ Request::is('/prediksi') ? 'active' : '' }} waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('image/prediksi.png') }}" alt="prediksi" width="30px" class="me-2"><span class="hide-menu">Prediksi</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/login') }}" class="nav-link {{ Request::is('/login') ? 'active' : '' }} waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <img src="{{ asset('image/logout.png') }}" alt="logout" width="30px" class="me-2"><span class="hide-menu">Logout</span></a>
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

                <div class="content p-5 col-10">
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
    <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>

    <!-- ✅ Tambahan ini agar modal Bootstrap 5 bisa berjalan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A2z02tPqdjYtF3U+Pf3ibfK4e2w7Fqf4m3roGkP7p5EXdG+iZ1Gc1D4Q2Ug3z" crossorigin="anonymous"></script>
</body>
</html>
