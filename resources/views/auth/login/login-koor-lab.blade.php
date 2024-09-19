<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SIMALAB | Login Koor Lab</title>

    <link rel="icon" href="{{ asset('assets/marketing/img/logo-hub.png') }}" type="image/png" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/assets/modules/bootstrap-social/bootstrap-social.css') }}">

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
    <style>
        .login-container {
            height: 100vh;
        }

        .login-form {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(248, 250, 250) !important;
        }

        .login-form .form-container {
            max-width: 400px;
            width: 100%;
        }

        .login-image {
            text-align: center;
            background-size: contain;
            /* Menyesuaikan gambar tanpa memotong */
            background-color: rgb(238, 236, 236) !important;
            /* Warna latar belakang jika ada ruang kosong */
        }

        .login-image img {
            padding-top: 250px
        }

        .social-icons {
            margin-top: 20px;
            text-align: center;
        }

        .social-icons i {
            font-size: 24px;
            margin: 0 10px;
            color: #6c757d;
            cursor: pointer;
        }

        .social-icons i:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    {{-- <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}" alt="logo" width="200">
                        </div>

                        @if(Session::has('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Koordinator Lab</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="#" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </span>
                                            <input id="email" type="email" class="form-control" name="email"
                                                tabindex="1" required autofocus placeholder="Masukan Email">
                                            <div class="invalid-feedback">
                                                Harap isi email Anda
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                                                    </span>
                                                </span>
                                                <input id="password" type="password" class="form-control"
                                                    name="password" tabindex="2" required
                                                    placeholder="Masukkan Kata Sandi">
                                                <div class="invalid-feedback">
                                                    Harap isi kata sandi Anda
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer" style="margin-top: -1rem">
                            Created by <a href="">Fadli Arif Ramadan</a>. | &copy; 2024.
                        </div>
                        <div class="socials">
                            <a href="https://www.instagram.com/ramadanfadliarif/"><i class="fab fa-instagram"></i></a>
                            <a href="https://github.com/FadliArifRamadan"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/fadli-arif-ramadan-249487246/"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}

    <div class="container-fluid login-container">
        <div class="row h-100">
            <!-- Login Form Side -->
            <div class="col-md-6 login-form bg-light d-flex justify-content-center align-items-center">
                <div class="form-container">
                    @if(Session::has('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <h2 class="text-center mb-4">Login Koordinator Lab</h2>
                    <form method="POST" action="#" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </span>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                    autofocus placeholder="Masukan Email">
                                <div class="invalid-feedback">
                                    Harap isi email Anda
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye-slash" id="togglePassword"></i>
                                        </span>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required placeholder="Masukkan Kata Sandi">
                                    <div class="invalid-feedback">
                                        Harap isi kata sandi Anda
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="simple-footer">
                        Created by <a href="">Fadli Arif Ramadan</a>. | &copy; 2024.
                    </div>
                    <!-- Social Media Icons -->
                    <div class="social-icons">
                        <p>Or follow us on:</p>
                        <a href="https://www.instagram.com/ramadanfadliarif/"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/FadliArifRamadan"><i class="fab fa-github"></i></a>
                        <a href="https://www.linkedin.com/in/fadliariframadan/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Image Side -->
            <div class="col-md-6 login-image d-none d-md-block">
                <img src="{{ asset('assets/marketing/img/logo-hub.png') }}" alt="logo" width="90%">
            </div>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/assets/js/custom.js') }}"></script>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.classList.remove('fas fa-eye-slash');
                togglePassword.classList.add('fas fa-eye'); // Tampilkan ikon kata sandi
            } else {
                passwordInput.type = 'password';
                togglePassword.classList.remove('fas fa-eye');
                togglePassword.classList.add('fas fa-eye-slash'); // Sembunyikan ikon kata sandi
            }
        });
    </script>
</body>

</html>