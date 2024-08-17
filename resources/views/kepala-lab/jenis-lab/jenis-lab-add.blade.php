@extends('kepala-lab.layout.template')

@section('title', 'Tambah Jenis Lab')

@section('content')

<div class="section-header">
    <h1>Tambah Jenis Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item"><a href="/kepala-lab/jenis-lab">Jenis Lab</a></div>
        <div class="breadcrumb-item">Tambah Jenis Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Jenis lab</h2>
    <p class="section-lead">
        Anda dapat Tambah Jenis Lab disini!
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

        <form action="jenis-lab-add" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="lab_name">Nama lab</label>
                    <input type="text" class="form-control" name="lab_name" id="lab_name">
                </div>
                <div class="form-group col-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="jenis-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection