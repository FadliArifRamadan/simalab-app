@extends('kepala-lab.layout.template')

@section('title', 'Ubah Jenis Lab')

@section('content')

<div class="section-header">
    <h1>Ubah Jenis Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item"><a href="/kepala-lab/jenis-lab">Jenis Lab</a></div>
        <div class="breadcrumb-item">Ubah Jenis Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Jenis lab</h2>
    <p class="section-lead">
        Anda dapat Ubah Jenis Lab disini!
    </p>

    <div class="mt-5 col-12 m-auto">
        <form action="/kepala-lab/jenis-lab-update/{{ $lab->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="lab_name">Nama lab</label>
                    <input type="text" class="form-control" name="lab_name" id="lab_name" value="{{ $lab->lab_name }}"
                        required>
                </div>
                <div class="form-group col-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $lab->description }}" required>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/kepala-lab/jenis-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection