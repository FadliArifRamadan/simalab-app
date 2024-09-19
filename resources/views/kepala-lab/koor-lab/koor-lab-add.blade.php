{{-- @extends('kepala-lab.layout.template')

@section('title', 'Tambah Koorlab')

@section('content')

<div class="section-header">
    <h1>Tambah Koor Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item active"><a href="/kepala-lab/koor-lab">Koor Lab</a></div>
        <div class="breadcrumb-item">Tambah Koor Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tamabah Koor Lab</h2>
    <p class="section-lead">
        Anda dapat Tamabah Koor Lab disini!
    </p>

    <div class="mt-5 col-12 m-auto">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="koor-lab-add" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="roles_id">Role</label>
                    <select name="roles_id" id="roles_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="koor-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection --}}

@extends('kepala-lab.layout.dashboard')

@section('title', 'Tambah Koorlab')

@section('content')
<div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="white_box_tittle list_header">
                    <h4>Tambah Koor Lab</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/kepala-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                Data Master
                                <i class="fas fa-caret-right"></i>
                                <a href="/kepala-lab/koor-lab">Koor Lab</a>
                                <i class="fas fa-caret-right"></i>
                                Tamabah Koor Lab
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="koor-lab-add" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Nama Koordinator:
                            </h6>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Email:
                            </h6>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Password:
                            </h6>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="input-group-text" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Role:
                            </h6>
                            <select name="roles_id" id="roles_id" class="form-select">
                                <option value="">Select</option>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Simpan</button>
                        <a href="koor-lab" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }
</script>
@endsection