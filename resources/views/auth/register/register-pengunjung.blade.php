<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SIMALAB | Register Pengunjung</title>

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
        .register-container {
            height: 100vh;
        }

        .register-form {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(248, 250, 250) !important;
        }

        .register-form .form-container {
            max-width: 400px;
            width: 100%;
        }

        .register-image {
            text-align: center;
            background-size: contain;
            /* Menyesuaikan gambar tanpa memotong */
            background-color: rgb(226,
                    224,
                    224) !important;
            /* Warna latar belakang jika ada ruang kosong */
        }

        .register-image img {
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

        .register-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    {{-- <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset('assets/assets/img/logo/cichub.jpg') }}" alt="logo" width="200">
                        </div>

                        @if(Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register Pengunjung</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="register-pengunjung" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="name">Nama Pengunjung</label>
                                            <div class="invalid-feedback">Tolong isi nama Anda </div>
                                            <input id="name" type="name" class="form-control" name="name" tabindex="1"
                                                required autofocus placeholder="Masukan Nama Mahasiswa/Umum">
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="business_name">Nama Usaha</label>
                                            <input id="business_name" type="business_name" class="form-control"
                                                name="business_name" tabindex="1" required autofocus
                                                placeholder="Bisa Masukan Nama Univ/Sekolah">
                                            <div class="invalid-feedback">
                                                Tolong isi nama usaha Anda
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="roles_id">Role</label>
                                            <select name="roles_id" id="roles_id" class="form-control" tabindex="1"
                                                required autofocus>
                                                <option value="">Select</option>
                                                @foreach ($roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Tolong isi peran Anda
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <label for="identities">No. KTP</label>
                                            <input id="identities" type="number" class="form-control" name="identities"
                                                tabindex="1" required autofocus placeholder="Masukan No. KTP Anda">
                                            <div class="invalid-feedback">
                                                Tolong isi No. KTP Anda
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                tabindex="1" required autofocus placeholder="Masukan Email">
                                            <div class="invalid-feedback">
                                                Tolong isi email Anda
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password"
                                                tabindex="2" required placeholder="Masukan Password">
                                            <div class="invalid-feedback">
                                                Tolong isi password Anda
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Sudah Punya akun? <a href="/">Login Segera</a>
                        </div>
                        <div class="simple-footer">
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
    <div class="container-fluid register-container">
        <div class="row h-100">
            <!-- Register Form Side -->
            <div class="col-md-6 register-form bg-light d-flex justify-content-center align-items-center">
                <div class="form-container">
                    @if(Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <h2 class="text-center mb-4">Register</h2>
                    <form method="POST" action="register-pengunjung" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Pengunjung</label>
                            <input id="name" type="name" class="form-control" name="name" tabindex="1" required
                                autofocus placeholder="Masukan Nama Anda">
                            <div class="invalid-feedback">
                                Tolong isi nama Anda
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="business_name">Nama Usaha</label>
                            <input id="business_name" type="business_name" class="form-control" name="business_name"
                                tabindex="1" required autofocus placeholder="Bisa Masukan Nama Univ/Sekolah">
                            <div class="invalid-feedback">
                                Tolong isi nama usaha Anda
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roles_id">Role</label>
                            <select name="roles_id" id="roles_id" class="form-control" tabindex="1" required autofocus>
                                <option value="">Select</option>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Tolong isi peran Anda
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="identities">No. KTP</label>
                            <input id="identities" type="number" class="form-control" name="identities" tabindex="1"
                                required autofocus placeholder="Masukan No. KTP Anda">
                            <div class="invalid-feedback">
                                Tolong isi No. KTP Anda
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                autofocus placeholder="Masukan Email">
                            <div class="invalid-feedback">
                                Tolong isi email Anda
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
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    required placeholder="Masukkan Password">
                                <div class="invalid-feedback">
                                    Tolong isi Password Anda
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Register
                            </button>
                        </div>
                    </form>
                    <!-- Login Link -->
                    <div class="register-link">
                        <p>
                            Sudah Punya akun? <a href="/">Login Segera</a>
                        </p>
                    </div>
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
            <div class="col-md-6 register-image d-none d-md-block">
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