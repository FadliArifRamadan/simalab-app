<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>SIMALAB | Register Pengunjung</title>

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
</head>

<body>
    <div id="app">
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
                                        <div class="form-group col-6">
                                            <label for="name">Nama Pengunjung</label>
                                            <div class="invalid-feedback">Tolong isi nama Anda </div>
                                            <input id="name" type="name" class="form-control" name="name" tabindex="1"
                                                required autofocus placeholder="Masukan Nama Mahasiswa/Umum">
                                        </div>
                                        <div class="form-group col-6">
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
                                        <div class="form-group col-6">
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
                                        <div class="form-group col-6">
                                            <label for="identities">No. KTP</label>
                                            <input id="identities" type="number" class="form-control" name="identities"
                                                tabindex="1" required autofocus placeholder="Masukan No. KTP Anda">
                                            <div class="invalid-feedback">
                                                Tolong isi No. KTP Anda
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                tabindex="1" required autofocus placeholder="Masukan Email">
                                            <div class="invalid-feedback">
                                                Tolong isi email Anda
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
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
                            Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                                href="https://nauval.in/">Muhamad
                                Nauval Azhar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
</body>

</html>