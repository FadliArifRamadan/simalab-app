{{-- @extends('kepala-lab.layout.template')

@section('title', 'Ubah Koorlab')

@section('content')

<div class="section-header">
    <h1>Ubah Koor Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item active"><a href="/kepala-lab/koor-lab">Koor Lab</a></div>
        <div class="breadcrumb-item">Ubah Koor Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Koor Lab</h2>
    <p class="section-lead">
        Anda dapat Ubah Koor Lab disini!
    </p>
    <div class="mt-5 col-12 m-auto">
        <form action="/kepala-lab/koor-lab-update/{{ $user->id }}" method="POSt">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        value="{{ $user->password }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="roles_id">Role</label>
                    <select name="roles_id" id="roles_id" class="form-control" required>
                        <option value="{{ $user->roles->id }}">{{ $user->roles->name }}</option>
                    </select>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="/kepala-lab/koor-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection --}}

@extends('kepala-lab.layout.dashboard')

@section('title', 'Ubah Koorlab')

@section('content')
<div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                @if(Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="white_box_tittle list_header">
                    <h4>Ubah Koor Lab</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/kepala-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                Data Master
                                <i class="fas fa-caret-right"></i>
                                <a href="/kepala-lab/koor-lab">Koor Lab</a>
                                <i class="fas fa-caret-right"></i>
                                Ubah Koor Lab
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="/kepala-lab/koor-lab-update/{{ $user->id }}" method="POSt">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Nama Koordinator:
                            </h6>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                                required>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Email:
                            </h6>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Password:
                            </h6>
                            <input type="password" class="form-control" name="password" id="password"
                                value="{{ $user->password }}" required>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Role:
                            </h6>
                            <select name="roles_id" id="roles_id" class="form-select" required>
                                <option value="{{ $user->roles->id }}">{{ $user->roles->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Ubah</button>
                        <a href="/kepala-lab/koor-lab" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection