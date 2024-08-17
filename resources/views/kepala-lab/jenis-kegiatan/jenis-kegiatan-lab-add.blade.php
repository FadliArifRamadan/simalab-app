@extends('kepala-lab.layout.template')

@section('title', 'Tambah Jenis Kegiatan')

@section('content')

<div class="section-header">
    <h1>Tambah Jenis kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item active"><a href="/kepala-lab/jenis-kegiatan-lab">Jenis kegiatan</a></div>
        <div class="breadcrumb-item">Tambah Jenis kegiatan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Jenis Kegiatan</h2>
    <p class="section-lead">
        Anda dapat Tambah Jenis Kegiatan disini!
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

        <form action="jenis-kegiatan-lab-add" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="activity_type">Nama Jenis Kegiatan</label>
                    <input type="text" class="form-control" name="activity_type" id="activity_type">
                </div>
                <div class="form-group col-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>
            </div>
            <div class="form-group">
                <label for="coordinators_id">Nama Koordinator Lab</label>
                <select name="coordinators_id" class="form-control">
                    <option value="">Pilih Satu</option>
                    @foreach ($coordinators as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="jenis-kegiatan-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection