{{-- @extends('kepala-lab.layout.template')

@section('title', 'Pengajuan')

@section('content')

<div class="section-header">
    <h1>Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Pengajuan</div>
    </div>
</div>


@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Pengajuan</h2>
    <p class="section-lead">
        Anda dapat melihat Pengajuan Pengunjung disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Pengajuan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
                                    <th>Nama Koordinator Lab</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Waktu Kegiatan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activitySubmission as $submission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $submission->visitors->name }}</td>
                                    <td>{{ $submission->visitors->business_name }}</td>
                                    <td>{{ $submission->coordinators->name }}</td>
                                    <td>{{ $submission->activities->activity_type }}</td>
                                    <td>{{ $submission->submission_date ?? '-' }}</td>
                                    <td>{{ $submission->submission_time ?? '-' }}</td>
                                    <td>
                                        <span class="status-text 
                                        <?php if ($submission->status == 'Approved') {
                                            echo 'approved';
                                        } elseif ($submission->status == 'Rejected') {
                                            echo 'rejected';
                                        } elseif ($submission->status == 'Progress') {
                                            echo 'on-progress';
                                        } elseif ($submission->status == 'Done') {
                                            echo 'done';
                                        } else {
                                            echo 'pending';
                                        } ?>
                                            ">
                                            {{ $submission->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('kepala-lab.layout.dashboard')

@section('title', 'Pengajuan')

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="white_box_tittle list_header">
                        <h4>Pengajuan Pengunjung</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/kepala-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    Pengajuan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Pengajuan</h4>
                            <div class="box_right d-flex lms_block">
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pengunjung</th>
                                        <th scope="col">Nama Usaha/Pedidikan</th>
                                        <th scope="col">Nama Koordinator</th>
                                        <th scope="col">Jenis Kegiatan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activitySubmission as $submission)
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="question_content">
                                                {{ $loop->iteration }}</a>
                                        </th>
                                        <td>{{ $submission->visitors->name }}</td>
                                        <td class="nowrap">
                                            {{ $submission->visitors->business_name }}
                                        </td>
                                        <td class="nowrap">
                                            {{ $submission->coordinators->name }}
                                        </td>
                                        <td>{{ $submission->activities->activity_type }}</td>
                                        <td>{{ $submission->submission_date ?? '-' }}</td>
                                        <td>{{ $submission->submission_time ?? '-' }}</td>
                                        <td>
                                            <span class="status_btn 
                                        <?php if ($submission->status == 'Approved') {
                                            echo 'approved';
                                        } elseif ($submission->status == 'Rejected') {
                                            echo 'rejected';
                                        } elseif ($submission->status == 'Progress') {
                                            echo 'on-progress';
                                        } elseif ($submission->status == 'Done') {
                                            echo 'done';
                                        } else {
                                            echo 'pending';
                                        } ?>
                                            ">
                                                {{ $submission->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12"></div>
    </div>
</div>
@endsection