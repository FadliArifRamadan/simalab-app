@extends('kepala-lab.layout.template')

@section('title', 'Jenis Kegiatan')

@section('content')

<div class="section-header">
    <h1>Jenis Kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item">Jenis Kegiatan</div>
    </div>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Jenis Kegiatan</h2>
    <p class="section-lead">
        Anda dapat melihat Jenis Kegiatan yang Anda tambahkan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Jenis Kegiatan</h4>
                    <a href="jenis-kegiatan-lab-add" class="btn btn-success btn-action">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Nama Koordinator lab</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activityList as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->activity_type }}</td>
                                    <td>{{ $activity->coordinators->name }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="jenis-kegiatan-lab-edit/{{ $activity->id }}"
                                                class="btn btn-primary btn-action" title="Ubah"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Kamu yakin ingin menghapus data?"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $activity->id }}').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete-form-{{ $activity->id }}"
                                                action="/kepala-lab/jenis-kegiatan-lab-delete/{{ $activity->id }}"
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