{{-- @extends('kepala-lab.layout.template')

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
@endsection --}}

@extends('kepala-lab.layout.dashboard')

@section('title', 'Ubah Jenis Kegiatan')

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
                    <h4>Ubah Jenis Kegiatan</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/kepala-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                Data Master
                                <i class="fas fa-caret-right"></i>
                                <a href="/kepala-lab/jenis-kegiatan-lab">Jenis Kegiatan</a>
                                <i class="fas fa-caret-right"></i>
                                Ubah Jenis Kegiatan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="/kepala-lab/jenis-kegiatan-lab-update/{{ $activity->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Jenis Kegiatan:
                            </h6>
                            <input type="text" class="form-control" name="activity_type" id="activity_type"
                                value="{{ $activity->activity_type }}" required>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Deskripsi:
                            </h6>
                            <input type="text" class="form-control" name="description" id="description"
                                value="{{ $activity->description }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <h6 class="card-subtitle mb-2 mt-3">
                            Nama Koordinator:
                        </h6>
                        <input type="text" class="form-control" name="coordinator_id" id="coordinator_id"
                            value="{{ $activity->coordinators->name }}" readonly>
                        <input type="hidden" name="coordinators_id" value="{{ $activity->coordinators->id }}">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Ubah</button>
                        <a href="/kepala-lab/jenis-kegiatan-lab" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection