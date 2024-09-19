{{-- @extends('pengunjung-lab.layout.template')

@section('title', 'Tambah Pengajuan')

@section('content')
<div class="section-header">
    <h1>Tambah Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/pengunjung-lab/pengajuan-kegiatan">Pengajuan</a></div>
        <div class="breadcrumb-item">Tambah pengajuan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Pengajuan</h2>
    <p class="section-lead">
        Anda dapat Tambah Pengajuan disini!
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

        <form action="pengajuan-kegiatan-add" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <label for="users_id">Nama Pengunjung</label>
                    <input type="text" class="form-control" id="users_id" name="users_id" value="{{ $visitors->name }}"
                        readonly required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="coordinators_id">Nama Koordinator Lab</label>
                    <select name="coordinators_id" class="form-control" id="coordinators_id">
                        <option value="">Pilih Satu</option>
                        @foreach ($coordinators as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="activities_id">Jenis Kegiatan Lab</label>
                    <select name="activities_id" class="form-control" id="activities_id">
                        <option value="">Pilih Satu</option>
                    </select>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Simpan</button>
                <a href="pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div> --}}

{{-- <script>
    document.getElementById('coordinators_id').addEventListener('change', function () {
    updateAvailableTimes();
    });

    document.getElementById('submission_date').addEventListener('change', function () {
        updateAvailableTimes();
    });

    function updateAvailableTimes() {
        var coordinatorId = document.getElementById('coordinators_id').value;
        var submissionDate = document.getElementById('submission_date').value;
        var timeSelect = document.getElementById('submission_time');
        timeSelect.innerHTML = '<option value="">Loading...</option>';

        if (coordinatorId && submissionDate) {
            fetch(`/get-available-times-by-coordinator?coordinator_id=${coordinatorId}&submission_date=${submissionDate}`)
                .then(response => response.json())
                .then(data => {
                    timeSelect.innerHTML = '<option value="">Pilih Waktu</option>';
                    data.forEach(time => {
                        timeSelect.innerHTML += `<option value="${time}">${time}</option>`;
                    });
                });
        } else {
            timeSelect.innerHTML = '<option value="">Pilih Waktu</option>';
        }
    }

</script> --}}
{{-- @endsection --}}

@extends('pengunjung-lab.layout.dashboard')

@section('title', 'Tambah Pengajuan')

@section('content')
<div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="white_box_tittle list_header">
                    <h4>Tambah Pengajuan</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/pengunjung-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                <a href="/pengunjung-lab/pengajuan-kegiatan">Pengajuan</a>
                                <i class="fas fa-caret-right"></i>
                                Tambah Pengajuan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="pengajuan-kegiatan-add" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2">
                                Nama Pengunjung:
                            </h6>
                            <input type="text" class="form-control" id="users_id" name="users_id"
                                value="{{ $visitors->name }}" readonly required>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2">
                                Nama Koordinator:
                            </h6>
                            <select name="coordinators_id" class="form-select" id="coordinators_id">
                                <option value="">Pilih Satu</option>
                                @foreach ($coordinators as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <h6 class="card-subtitle mb-2">
                                Jenis Kegiatan:
                            </h6>
                            <select name="activities_id" class="form-select" id="activities_id">
                                <option value="">Pilih Satu</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit">Simpan</button>
                        <a href="pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
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