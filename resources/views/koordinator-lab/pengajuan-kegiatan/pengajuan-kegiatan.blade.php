@extends('Koordinator-lab.layout.template')

@section('title', 'Pengajuan')

@section('content')

<div class="section-header">
    <h1>Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
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
        Anda dapat melihat pengajuan Pengunjung disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Pengajuan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
                                    <th>Nama Koordinator lab</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Waktu Kegiatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ route('koorlab.approve', $submission->id) }}"
                                                class="btn btn-primary btn-action" title="Approve"><i
                                                    class="fas fa-check"></i></a>
                                            <a href="{{ route('koorlab.progress', $submission->id) }}"
                                                class="btn btn-warning btn-action" title="On Progress"><i
                                                    class="fas fa-spinner"></i></a>
                                            <a href="{{ route('koorlab.reject', $submission->id) }}"
                                                class="btn btn-danger btn-action" title="Reject"><i
                                                    class="fas fa-times"></i></a>
                                        </div>
                                        <div style="display: flex; gap: 5px; margin-top: 5px">
                                            <a href="{{ route('koorlab.done', $submission->id) }}"
                                                class="btn btn-success btn-action" title="Done"><i
                                                    class="fas fa-check-double"></i></a>
                                            <a href="/koordinator-lab/dokumen-lab-add?submission_id={{$submission->id }}"
                                                class="btn btn-primary btn-action {{ ($submission->status == 'Approved'
                                                || $submission->status == 'Progress' || $submission->status == 'Pending'
                                                || $submission->status == 'Rejected') ? 'disabled' : '' }}"
                                                title="Tambah">
                                                <i class="fas fa-book"></i>
                                            </a>
                                            <a href="pengajuan-kegiatan-edit/{{ $submission->id }}" class="btn btn-secondary btn-action <?php if ($submission->status == 'Progress' || $submission->status == 'Done' || $submission->status == 'Rejected') {
                                                        echo 'disabled';
                                                    } ?>" title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                                        </div>
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
@endsection