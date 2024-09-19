{{-- @extends('pengunjung-lab.layout.template')

@section('title', 'Ubah Pengajuan')

@section('subtitle', 'Ubah Pengajuan')

@section('content')
<div class="section-header">
    <h1>Ubah Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/pengunjung-lab/pengajuan-kegiatan">Pengajuan</a></div>
        <div class="breadcrumb-item">Ubah pengajuan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Pengajuan</h2>
    <p class="section-lead">
        Anda dapat Ubah pengajuan disini!
    </p>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mt-5 col-12 m-auto">
        <form action="/pengunjung-lab/pengajuan-kegiatan-update/{{ $activitySubmission->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <label for="users_id">Nama Pengunjung</label>
                    <input type="text" class="form-control" id="users_id" name="users_id" value="{{ $visitors->name }}"
                        readonly required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="coordinators_id">Nama Koordinator lab</label>
                    <select name="coordinators_id" id="coordinators_id" class="form-control" required>
                        <option value="{{ $activitySubmission->coordinators->id }}">{{
                            $activitySubmission->coordinators->name }}</option>
                        @foreach ($coordinators as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="activities_id">Jenis Kegiatan Lab</label>
                    <select name="activities_id" id="activities_id" class="form-control" required>
                        <option value="{{ $activitySubmission->activities->id }}">{{
                            $activitySubmission->activities->activity_type }}</option>
                        @foreach ($activities as $item)
                        <option value="{{ $item->id }}">{{ $item->activity_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/pengunjung-lab/pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection --}}

@extends('pengunjung-lab.layout.dashboard')

@section('title', 'Ubah Pengajuan')

@section('content')
<div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="white_box_tittle list_header">
                    <h4>Ubah Pengajuan</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/pengunjung-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                <a href="/pengunjung-lab/pengajuan-kegiatan">Pengajuan</a>
                                <i class="fas fa-caret-right"></i>
                                Ubah Pengajuan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="/pengunjung-lab/pengajuan-kegiatan-update/{{ $activitySubmission->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Nama Pengunjung:
                            </h6>
                            <input type="text" class="form-control" id="users_id" name="users_id"
                                value="{{ $visitors->name }}" readonly required>
                        </div>

                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Nama Koordinator:
                            </h6>
                            <select name="coordinators_id" class="form-select" id="coordinators_id" required>
                                <option value="{{ $activitySubmission->coordinators->id }}">{{
                                    $activitySubmission->coordinators->name }}</option>
                                @foreach ($coordinators as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Jenis Kegiatan:
                            </h6>
                            <select name="activities_id" class="form-select" id="activities_id">
                                <option value="{{ $activitySubmission->activities->id }}">{{
                                    $activitySubmission->activities->activity_type }}</option>
                                @foreach ($activities as $item)
                                <option value="{{ $item->id }}">{{ $item->activity_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit">Ubah</button>
                        <a href="/pengunjung-lab/pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document
    .getElementById("coordinators_id")
    .addEventListener("change", function () {
        var coordinatorId = this.value;
        var activitiesSelect = document.getElementById("activities_id");
        activitiesSelect.innerHTML = '<option value="">Loading...</option>';

        if (coordinatorId) {
            fetch(
                `/get-activities-by-coordinator?coordinator_id=${coordinatorId}`
            )
                .then((response) => response.json())
                .then((data) => {
                    activitiesSelect.innerHTML =
                        '<option value="">Pilih Satu</option>';
                    data.forEach((activity) => {
                        activitiesSelect.innerHTML += `<option value="${activity.id}">${activity.activity_type}</option>`;
                    });
                });
        } else {
            activitiesSelect.innerHTML = '<option value="">Pilih Satu</option>';
        }
    });

</script>
@endsection