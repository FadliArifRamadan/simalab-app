@extends('pengunjung-lab.layout.template')

@section('title', 'Pengajuan')

@section('content')
<div class="section-header">
    <h1>Pengajuan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dashboard">Dashboard</a></div>
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
        Anda dapat melihat Pengajuan yang Anda ajukan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Pengajuan</h4>
                    @php
                    $hasPendingSubmission = $activitySubmission->whereIn('status', ['Pending', 'Approved',
                    'Progress'])->count() > 0;
                    @endphp
                    @if (!$hasPendingSubmission)
                    <a href="pengajuan-kegiatan-add" class="btn btn-success btn-action">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                    @else
                    <a href="pengajuan-kegiatan-add" class="btn btn-success btn-action disabled">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nam Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
                                    <th>Nama Koordinator Lab</th>
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
                                            <a href="pengajuan-kegiatan-edit/{{ $submission->id }}" class="btn btn-primary btn-action <?php if ($submission->status == 'Approved' || $submission->status == 'Progress' || $submission->status == 'Done' || $submission->status == 'Rejected') {
                                                    echo 'disabled';
                                                } ?>" title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action <?php if ($submission->status == 'Approved' || $submission->status == 'Progress' || $submission->status == 'Done' || $submission->status == 'Rejected') {
                                                    echo 'disabled';
                                                } ?>" data-toggle="tooltip" title="Delete"
                                                data-confirm="Kamu yakin ingin menghapus data?"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $submission->id }}').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete-form-{{ $submission->id }}"
                                                action="/pengunjung-lab/pengajuan-kegiatan-delete/{{ $submission->id }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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