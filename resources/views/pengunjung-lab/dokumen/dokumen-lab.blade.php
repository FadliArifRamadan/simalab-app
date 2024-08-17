@extends('pengunjung-lab.layout.template')

@section('title', 'Dokumen Lab')

@section('content')

<div class="section-header">
    <h1>Dokumen Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen Lab</h2>
    <p class="section-lead">
        Anda dapat melihat Dokumen Lab disini!
    </p>

    @if(Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Dokumen Lab</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Koor Lab</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($docList as $doc)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doc->coordinators->name }}</td>
                                    <td>{{ $doc->visitors->name }}</td>
                                    <td>{{ $doc->activities->activity_type }}</td>
                                    <td>{{ $doc->documents->name }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            @if($doc->file_path)
                                            @if($doc->documents->name == 'Perjanjian Kerja Sama' ||
                                            $doc->documents->name == 'Dokumentasi Kegiatan')
                                            <a href="{{ route('docs.download', $doc->id) }}"
                                                class="btn btn-success btn-action" title="Download"><i
                                                    class="fas fa-download"></i></a>
                                            @else
                                            <button class="btn btn-secondary btn-action" title="Download Tidak Tersedia"
                                                disabled><i class="fas fa-download"></i></button>
                                            @endif
                                            @endif
                                            <a href="{{ route('docs.details', $doc->id) }}"
                                                class="btn btn-info btn-action" title="Detail"><i
                                                    class="fas fa-info-circle"></i></a>
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