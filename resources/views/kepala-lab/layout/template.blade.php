{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SIMALAB | @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                    <div class="mt-2" style="color: white;">
                        <h5>Sistem Manajemen Laboratorium</h5>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Selamat Datang {{ Auth::user()->name }}, Anda
                                adalah {{ Auth::user()->roles->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ asset('assets/features-profile.html') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/kepala-lab/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/kepala-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebar-image"></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/kepala-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebars-image"></a>
                    </div>
                    <div class="sidebar-brand">
                        <a href="/kepala-lab/dashboard">SIMALAB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/kepala-lab/dashboard">SL</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('kepala-lab/dashboard*') ? 'active' : '' }}"><a class="nav-link"
                                href="/kepala-lab/dashboard"><i class="fas fa-fire"></i>
                                <span>Dashboard</span></a></li>
                        <li class="menu-header">Kelola Data</li>
                        <li class="{{ Request::is('kepala-lab/pengajuan-kegiatan*') ? 'active' : '' }}"><a
                                class="nav-link" href="/kepala-lab/pengajuan-kegiatan"><i class="fas fa-book-open"></i>
                                <span>Pengajuan</span></a>
                        </li>
                        <li
                            class="dropdown {{ Request::is('kepala-lab/jenis-lab*') || Request::is('kepala-lab/jenis-kegiatan-lab*') || Request::is('kepala-lab/koor-lab*') || Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-database"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('kepala-lab/jenis-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-lab">Jenis Lab</a></li>
                                <li class="{{ Request::is('kepala-lab/jenis-kegiatan-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-kegiatan-lab">Jenis Kegiatan Lab</a>
                                </li>
                                <li class="{{ Request::is('kepala-lab/koor-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/koor-lab">Koor Lab</a></li>
                                <li class="{{ Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-dokumen-lab">Jenis Dokumen Lab</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('kepala-lab/dokumen-lab') ? 'active' : '' }}"><a class="nav-link"
                                href="/kepala-lab/dokumen-lab"><i class="fas fa-book"></i>
                                <span>Dokumen</span></a>
                        </li>
                        <li><a class="nav-link" href="{{ asset('assets/features-profile.html') }}"><i
                                    class="fas fa-user"></i>
                                <span>Profile</span></a>
                        </li>
                        <li class="menu-header">Logout</li>
                        <li><a class="nav-link" href="/kepala-lab/logout"><i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('subtitle')</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> <a href="/">SIMALAB CIC
                        HUB</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom.js') }}"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Simalab</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li>
                            <h5 style="color: rgb(243, 240, 240); margin-top: 6px">Sistem Manajemen Laboratorium</h5>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Selamat Datang, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ asset('assets/assets/features-profile.html') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/kepala-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebar-image"></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/kepala-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebars-image"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('kepala-lab/dashboard*') ? 'active' : '' }}"><a class="nav-link"
                                href="/kepala-lab/dashboard"><i class="fas fa-fire"></i>
                                <span>Dashboard</span></a></li>
                        <li class="menu-header">Kelola Data</li>
                        <li class="{{ Request::is('kepala-lab/pengajuan-kegiatan*') ? 'active' : '' }}"><a
                                class="nav-link" href="/kepala-lab/pengajuan-kegiatan"><i class="fas fa-book-open"></i>
                                <span>Pengajuan</span></a>
                        </li>
                        <li
                            class="dropdown {{ Request::is('kepala-lab/jenis-kegiatan-lab*') || Request::is('kepala-lab/koor-lab*') || Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-database"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                {{-- <li class="{{ Request::is('kepala-lab/jenis-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-lab">Jenis Lab</a></li> --}}
                                <li class="{{ Request::is('kepala-lab/jenis-kegiatan-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-kegiatan-lab">Jenis Kegiatan</a>
                                </li>
                                <li class="{{ Request::is('kepala-lab/koor-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/koor-lab">Koor Lab</a></li>
                                <li class="{{ Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}"><a
                                        class="nav-link" href="/kepala-lab/jenis-dokumen-lab">Jenis Dokumen</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('kepala-lab/dokumen-lab*') ? 'active' : '' }}"><a class="nav-link"
                                href="/kepala-lab/dokumen-lab"><i class="fas fa-book"></i>
                                <span>Dokumen</span></a>
                        </li>
                        <li class="{{ Request::is('kepala-lab/profile') ? 'active' : '' }}"><a class="nav-link"
                                href="/kepala-lab/profile"><i class="fas fa-user"></i>
                                <span>Profile</span></a>
                        </li>
                        <li class="menu-header">Logout</li>
                        <li><a class="nav-link" href="/kepala-lab/logout"><i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/assets/js/page/modules-datatables.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom.js') }}"></script>
</body>

</html>