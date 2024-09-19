<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title') &mdash; Simalab</title>
    <link rel="icon" href="{{ asset('assets/marketing/img/logo-hub.png') }}" type="image/png" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/scroll/scrollable.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/font_awesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/marketing/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/css/metisMenu.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/marketing/css/style1.css') }}" />

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="crm_body_bg">
    <nav class="sidebar vertical-scroll ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="/kepala-lab/dashboard"><img src="{{ asset('assets/marketing/img/logo-hub.png') }}" alt /></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('kepala-lab/dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="/kepala-lab/dashboard">
                    <div class="icon_menu">
                        <i class="fas fa-fire"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Kelola Data</li>
            <li class="{{ Request::is('kepala-lab/pengajuan-kegiatan*') ? 'active' : '' }}">
                <a class="nav-link" href="/kepala-lab/pengajuan-kegiatan">
                    <div class="icon_menu">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <span>Pengajuan</span>
                </a>
            </li>
            <li
                class="{{ Request::is('kepala-lab/jenis-kegiatan-lab*') || Request::is('kepala-lab/koor-lab*') || Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fas fa-database"></i>
                    </div>
                    <span>Data Master</span>
                </a>
                <ul>
                    <li class="{{ Request::is('kepala-lab/jenis-kegiatan-lab*') ? 'active' : '' }}"><a class="nav-links"
                            href="/kepala-lab/jenis-kegiatan-lab">Jenis Kegiatan</a>
                    </li>
                    <li class="{{ Request::is('kepala-lab/koor-lab*') ? 'active' : '' }}"><a class="nav-links"
                            href="/kepala-lab/koor-lab">Koor Lab</a></li>
                    <li class="{{ Request::is('kepala-lab/jenis-dokumen-lab*') ? 'active' : '' }}"><a class="nav-links"
                            href="/kepala-lab/jenis-dokumen-lab">Jenis Dokumen</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('kepala-lab/dokumen-lab*') ? 'active' : '' }}"><a class="nav-link"
                    href="/kepala-lab/dokumen-lab">
                    <div class="icon_menu">
                        <i class="fas fa-book"></i>
                    </div>
                    <span>Dokumen</span>
                </a>
            </li>
            <li class="{{ Request::is('kepala-lab/profile') ? 'active' : '' }}">
                <a class="nav-link" href="/kepala-lab/profile">
                    <div class="icon_menu">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>Profile</span>
                </a>
            </li>
            <li class="menu-header">Logout</li>
            <li>
                <a class="nav-link" href="/kepala-lab/logout">
                    <div class="icon_menu">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                {{-- <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here..." />
                                    </div>
                                    <button type="submit">
                                        <img src="{{ asset('assets/marketing/img/icon/icon_search.svg') }}" alt />
                                    </button>
                                </form> --}}
                                <h4 style="color: rgb(243, 240, 240);" class="text">Sistem Manajemen Laboratorium</h4>
                            </div>
                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="profile_info">
                                <img alt="image" src="{{ asset('assets/assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle mr-1">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Selamat Datang</p>
                                        <h5>{{ Auth::user()->name }}</h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="/kepala-lab/profile">Profile </a>
                                        <a href="/kepala-lab/logout">Logout </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            @yield('content')
        </div>

        <div class="footer_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>
                                2024 © Fadli Arif Ramadan
                                <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="back-top" style="display: none">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <script src="{{ asset('assets/marketing/js/jquery1-3.4.1.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/js/popper1.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/js/bootstrap1.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/js/metisMenu.js') }}"></script>

    <script src="{{ asset('assets/marketing/vendors/count_up/jquery.waypoints.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/datatable/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/marketing/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/marketing/vendors/scroll/scrollable-custom.js') }}"></script>

    <script src="{{ asset('assets/marketing/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>