@extends('kepala-lab.layout.template')

@section('title', 'Ubah Jenis Kegiatan')

@section('content')

<div class="section-header">
    <h1>Ubah Jenis kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item active"><a href="/kepala-lab/jenis-kegiatan-lab">Jenis kegiatan</a></div>
        <div class="breadcrumb-item">Ubah Jenis kegiatan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Jenis Kegiatan</h2>
    <p class="section-lead">
        Anda dapat Ubah Jenis Kegiatan disini!
    </p>

    <div class="mt-5 col-12 m-auto">
        <form action="/kepala-lab/jenis-kegiatan-lab-update/{{ $activity->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="activity_type">Nama Jenis Kegiatan</label>
                    <input type="text" class="form-control" name="activity_type" id="activity_type"
                        value="{{ $activity->activity_type }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $activity->description }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="coordinator_id">Nama Koordinator Lab</label>
                <input type="text" class="form-control" name="coordinator_id" id="coordinator_id"
                    value="{{ $activity->coordinators->name }}" readonly>
                <input type="hidden" name="coordinators_id" value="{{ $activity->coordinators->id }}">
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/kepala-lab/jenis-kegiatan-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection