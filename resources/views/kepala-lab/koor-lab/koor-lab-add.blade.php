@extends('kepala-lab.layout.template')

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
@endsection