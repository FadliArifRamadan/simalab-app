@extends('kepala-lab.layout.template')

@section('title', 'Ubah Jenis Dokumen')

@section('content')

<div class="section-header">
    <h1>Ubah Jenis Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item"><a href="/kepala-lab/jenis-dokumen-lab">Jenis Dokumen</a></div>
        <div class="breadcrumb-item">Ubah jenis Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Jenis Dokumen</h2>
    <p class="section-lead">
        Anda dapat Ubah Jenis Dokumen disini!
    </p>

    <div class="mt-5 col-12 m-auto">
        <form action="/kepala-lab/jenis-dokumen-lab-update/{{ $document->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Nama Dokumen</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $document->name }}"
                        required>
                </div>
                <div class="form-group col-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $document->description }}" required>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/kepala-lab/jenis-dokumen-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection