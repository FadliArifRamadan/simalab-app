@extends('kepala-lab.layout.template')

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
@endsection