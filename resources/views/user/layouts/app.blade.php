<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('user') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('user/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .link-active {
            border-bottom: 3px solid #4e73df;
            color: #4e73df !important;
            font-weight: bold;
        }
    </style>

</head>

<body id="page-top" class="{{ Route::is('register', 'login', 'register.final.show') ? 'bg-gradient-primary' : '' }}">

<!-- Page Wrapper -->
<div id="wrapper">

@yield('auth')
<!-- Sidebar -->
    @auth
        @if(!Route::is('register.final.show'))
            <ul class=" navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                   href="{{ route('dashboard', auth()->user()->username) }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard', auth()->user()->username) }}">
                        <i class="far fa-user"></i>
                        <span>My Profile</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item  {{ Route::is('track.show') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="{{ route('track.show') }}">
                        <i class="far fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item {{ Route::is('settings.show') ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="{{ route('settings.show', auth()->user()->username) }}">
                        <i class="fas fa-cog"></i>
                        <span>My Account</span>
                    </a>

                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->

            @auth

                <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('logout', auth()->user()->username) }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
            @endauth





            <!-- Sidebar Toggler (Sidebar) -->
                <!-- <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div> -->

                <!-- Sidebar Message -->
                <!-- <div class="sidebar-card">
                    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                        and more!</p>
                    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                        Pro!</a>
                </div> -->

            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle">
                            <i class="fa fa-bars"></i>
                        </button>


                    @if(!Route::is('settings.show', 'track.show'))
                        <!-- Dropdown - Messages -->
                            <div style="display:none;" class="row ml-auto d-md-block">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('dashboard') ? 'link-active' : '' }}"
                                           href="{{ route('dashboard', auth()->user()->username) }}"
                                           style="color:#7373aa">Preview <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link {{ Route::is('edit') ? 'link-active' : '' }}"
                                           href="{{ route('edit', auth()->user()->username) }}" style="color:#7373aa">Edit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Route::is('customize') ? 'link-active' : '' }}"
                                           href="{{ route('customize', auth()->user()->username) }}"
                                           style="color:#7373aa">Customize</a>
                                    </li>
                                </ul>
                            </div>


                            <h4 class="w-100 text-center d-md-none" style="margin: 0;">
                                @if(Route::is('dashboard'))
                                    Preview
                                @elseif (Route::is('edit'))
                                    Edit
                                @elseif (Route::is('customize'))
                                    Customize
                                @endif
                            </h4>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - menu Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-md-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu w-100"
                                         style="border-radius: 0; padding: 0; margin: 0; box-shadow: 0 7px 10px rgb(50 50 93 / 10%), 0 3px 4px rgb(0 0 0 / 6%);"
                                         aria-labelledby="searchDropdown">
                                        @if (!Route::is('dashboard'))
                                            <a class="d-block p-3 text-center" style="border-top: 1px solid #e3e6f0"
                                               href="{{ route('dashboard', auth()->user()->username) }}">
                                                Preview
                                            </a>
                                        @endif
                                        @if (!Route::is('edit'))
                                            <a class="d-block p-3 text-center" style="border-top: 1px solid #e3e6f0"
                                               href="{{ route('edit', auth()->user()->username) }}">
                                                Edit
                                            </a>
                                        @endif
                                        @if (!Route::is('customize'))
                                            <a class="d-block p-3 text-center" style="border-top: 1px solid #e3e6f0"
                                               href="{{ route('customize', auth()->user()->username) }}">
                                                Customize
                                            </a>
                                        @endif
                                    </div>

                                </li>
                            </ul>
                        @endif
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid" id="content-fluid">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                @auth

                @endauth
                @endif
                @endauth

            </div>
            <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


@auth
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout', auth()->user()->username) }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endauth
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('user') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('user') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('user') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('user') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('user') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('user') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('user') }}/js/demo/chart-pie-demo.js"></script>

<script>
    $('#accordionSidebar').addClass('toggled');
</script>
</body>

</html>
