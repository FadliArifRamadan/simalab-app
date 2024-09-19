{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Ubah Pengajuan Kegiatan')

@section('content')
<div class="section-header">
    <h1>Ubah Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/koordinator-lab/pengajuan-kegiatan">Pengajuan</a></div>
        <div class="breadcrumb-item">Ubah Pengajuan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Ubah Pengajuan</h2>
    <p class="section-lead">
        Anda dapat Ubah Pengajuan disini!
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
        <form action="/koordinator-lab/pengajuan-kegiatan-update/{{ $activitySubmission->id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class=" form-group">
                <label for="coordinators_id">Nama Koordinator Lab</label>
                <input type="text" class="form-control" id="coordinators_id" name="coordinators_id"
                    value="{{ $coordinators->name }}" readonly required>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="submission_date">Tanggal pengajuan</label>
                    <input type="date" class="form-control" name="submission_date" id="submission_date"
                        value="{{ $activitySubmission->submission_date }}" min="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="submission_time">Waktu Pengajuan</label>
                    <select name="submission_time" id="submission_time" class="form-control" required>
                        <option value="">Pilih Waktu</option>
                        @foreach ($availability[$coordinators->name]['times'] as $time)
                        @if(!in_array($time, $usedTimes) || $activitySubmission->submission_time == $time)
                        <option value="{{ $time }}" {{ $activitySubmission->submission_time == $time ? 'selected' : ''
                            }}>
                            {{ $time }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit">Ubah</button>
                <a href="/koordinator-lab/pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const availabilityDates = @json($availabilityDates);
        const coordinatorName = "{{ $coordinators->name }}";

        const dateInput = document.getElementById('submission_date');
        const timeSelect = document.getElementById('submission_time');

        function filterDates(dates) {
            const dateSet = new Set(dates);
            dateInput.addEventListener('input', function () {
                const selectedDate = dateInput.value;
                if (!dateSet.has(selectedDate)) {
                    alert('Tanggal yang dipilih tidak tersedia.');
                    dateInput.value = '';
                }
            });
        }

        function updateOptions(selectElement, options) {
            selectElement.innerHTML = '';
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.text = option;
                selectElement.appendChild(opt);
            });
        }

        if (availabilityDates[coordinatorName]) {
            filterDates(availabilityDates[coordinatorName]);
        }

        if (availability[coordinatorName]) {
            updateOptions(timeSelect, availability[coordinatorName]['times']);
        }
    });
</script>


@endsection --}}

@extends('koordinator-lab.layout.dashboard')

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
                                <a href="/koordinator-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                <a href="/koordinator-lab/pengajuan-kegiatan">Pengajuan</a>
                                <i class="fas fa-caret-right"></i>
                                Ubah Pengajuan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="/koordinator-lab/pengajuan-kegiatan-update/{{ $activitySubmission->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Nama Koordinator:
                            </h6>
                            <input type="text" class="form-control" id="coordinators_id" name="coordinators_id"
                                value="{{ $coordinators->name }}" readonly required>
                        </div>

                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Tanggal:
                            </h6>
                            <input type="date" class="form-control" name="submission_date" id="submission_date"
                                value="{{ $activitySubmission->submission_date }}" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group col-12 col-md-4 mb-4">
                            <h6 class="card-subtitle mb-2">
                                Waktu:
                            </h6>
                            <select name="submission_time" id="submission_time" class="form-select" required>
                                <option value="">Pilih Waktu</option>
                                @foreach ($availability[$coordinators->name]['times'] as $time)
                                @if(!in_array($time, $usedTimes) || $activitySubmission->submission_time == $time)
                                <option value="{{ $time }}" {{ $activitySubmission->submission_time == $time ?
                                    'selected' : ''
                                    }}>
                                    {{ $time }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit">Ubah</button>
                        <a href="/koordinator-lab/pengajuan-kegiatan" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const availabilityDates = @json($availabilityDates);
        const coordinatorName = "{{ $coordinators->name }}";

        const dateInput = document.getElementById('submission_date');
        const timeSelect = document.getElementById('submission_time');

        function filterDates(dates) {
            const dateSet = new Set(dates);
            dateInput.addEventListener('input', function () {
                const selectedDate = dateInput.value;
                if (!dateSet.has(selectedDate)) {
                    alert('Tanggal yang dipilih tidak tersedia.');
                    dateInput.value = '';
                }
            });
        }

        function updateOptions(selectElement, options) {
            selectElement.innerHTML = '';
            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.text = option;
                selectElement.appendChild(opt);
            });
        }

        if (availabilityDates[coordinatorName]) {
            filterDates(availabilityDates[coordinatorName]);
        }

        if (availability[coordinatorName]) {
            updateOptions(timeSelect, availability[coordinatorName]['times']);
        }
    });
</script>
@endsection