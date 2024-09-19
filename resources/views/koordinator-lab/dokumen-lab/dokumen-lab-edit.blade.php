{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Ubah Dokumen Lab')

@section('content')

<div class="section-header">
    <h1>Ubah Dokumen Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item"><a href="/koordinator-lab/dokumen-lab">Dokumen Lab</a></div>
        <div class="breadcrumb-item">Ubah Dokumen Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Dokumen Lab</h2>
    <p class="section-lead">
        Anda dapat Ubah Dokumen Lab disini!
    </p>

    @if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="mt-5 col-12 m-auto">
        <form action="/koordinator-lab/dokumen-lab-update/{{ $doc->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <label for="users_id">Nama Koor lab</label>
                    <input type="text" class="form-control" id="users_id" name="users_id"
                        value="{{ $coordinators->name }}" readonly required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="visitors_id">Nama Pengunjung</label>
                    <input type="text" class="form-control" id="visitors_id" name="visitors_id"
                        value="{{ $doc->visitors->name }}" readonly required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="activities_id">Jenis Kegiatan</label>
                    <select name="activities_id" id="activities_id" class="form-control" readonly required>
                        <option value="{{ $doc->activities->id }}">{{ $doc->activities->activity_type }}</option>
                        @foreach($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->activity_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="documents_id">Jenis Dokumen</label>
                <select name="documents_id" id="documents_id" class="form-control" required>
                    <option value="{{ $doc->documents->id }}">{{ $doc->documents->name }}</option>
                    @foreach ($documents as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="description">Deskripsi</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $doc->description }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="file_path">Upload</label>
                    <input type="file" class="form-control" name="file_path" id="file_path">
                    @if($doc->file_path)
                    <p>File saat ini: <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">{{
                            basename($doc->file_path) }}</a></p>
                    @endif
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/koordinator-lab/dokumen-lab" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Ubah Dokumen Lab')

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
                    <h4>Ubah Dokumen Lab</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/koordinator-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                <a href="/koordinator-lab/dokumen-lab">Dokumen Lab</a>
                                <i class="fas fa-caret-right"></i>
                                Ubah Dokumen Lab
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="/koordinator-lab/dokumen-lab-update/{{ $doc->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Nama Koordinator:
                            </h6>
                            <input type="text" class="form-control" id="users_id" name="users_id"
                                value="{{ $coordinators->name }}" readonly required>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Nama Pengunjung:
                            </h6>
                            <input type="text" class="form-control" id="visitors_id" name="visitors_id"
                                value="{{ $doc->visitors->name }}" readonly required>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Jenis Kegiatan:
                            </h6>
                            <select name="activities_id" id="activities_id" class="form-control" readonly required>
                                <option value="{{ $doc->activities->id }}">{{ $doc->activities->activity_type }}
                                </option>
                                @foreach($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->activity_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h6 class="card-subtitle mb-2 mt-3">
                            Jenis Dokumen:
                        </h6>
                        <select name="documents_id" id="documents_id" class="form-select" required>
                            <option value="{{ $doc->documents->id }}">{{ $doc->documents->name }}</option>
                            @foreach ($documents as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Deskripsi:
                            </h6>
                            <input type="text" class="form-control" name="description" id="description"
                                value="{{ $doc->description }}" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <h6 class="card-subtitle mb-2 mt-3">
                                Upload:
                            </h6>
                            <input type="file" class="form-control" name="file_path" id="file_path">
                            @if($doc->file_path)
                            <p>File saat ini: <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">{{
                                    basename($doc->file_path) }}</a></p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Ubah</button>
                        <a href="/koordinator-lab/dokumen-lab" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection