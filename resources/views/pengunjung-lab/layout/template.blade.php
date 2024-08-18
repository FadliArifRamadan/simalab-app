<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{-- <title>Modules &rsaquo; DataTables &mdash; Stisla</title> --}}
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
                            <a href="/pengunjung-lab/profile" class="dropdown-item has-icon">
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
                        <a href="/pengunjung-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebar-image"></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/pengunjung-lab/dashboard"><img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}"
                                alt="" class="sidebars-image"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('pengunjung-lab/dashboard*') ? 'active' : '' }}"><a class="nav-link"
                                href="/pengunjung-lab/dashboard"><i class="fas fa-fire"></i>
                                <span>Dashboard</span></a></li>
                        <li class="menu-header">Kelola Data</li>
                        <li class="{{ Request::is('pengunjung-lab/pengajuan-kegiatan*') ? 'active' : '' }}"><a
                                class="nav-link" href="/pengunjung-lab/pengajuan-kegiatan"><i
                                    class="fas fa-book-open"></i>
                                <span>Pengajuan</span></a>
                        </li>
                        <li class="{{ Request::is('pengunjung-lab/dokumen-lab*') ? 'active' : '' }}"><a class="nav-link"
                                href="/pengunjung-lab/dokumen-lab"><i class="fas fa-book"></i>
                                <span>Dokumen</span></a>
                        </li>
                        <li class="{{ Request::is('pengunjung-lab/profile') ? 'active' : '' }}"><a class="nav-link"
                                href="/pengunjung-lab/profile"><i class="fas fa-user"></i>
                                <span>Profile</span></a>
                        </li>
                        <li class="menu-header">Logout</li>
                        <li><a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt"></i>
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
                    Created by <a href="">Fadli Arif Ramadan</a>. | &copy; 2024.</a>
                </div>
                <div class="footer-right">
                    <div class="socials">
                        <a href="https://www.instagram.com/ramadanfadliarif/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/FadliArifRamadan"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/fadli-arif-ramadan-249487246/"><i
                                class="fab fa-linkedin"></i></a>
                    </div>
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