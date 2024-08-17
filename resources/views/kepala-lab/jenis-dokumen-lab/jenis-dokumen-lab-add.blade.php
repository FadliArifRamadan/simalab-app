@extends('kepala-lab.layout.template')

@section('title', 'Tambah Dokumen')

@section('content')

<div class="section-header">
    <h1>Tambah Jenis Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item"><a href="/kepala-lab/jenis-dokumen-lab">Jenis Dokumen</a></div>
        <div class="breadcrumb-item">Tambah jenis Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Jenis Dokumen</h2>
    <p class="section-lead">
        Anda dapat Tambah Jenis Dokumen disini!
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

        <form action="dokumen-cetak-add" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Nama Dokumen</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group col-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="jenis-dokumen-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection