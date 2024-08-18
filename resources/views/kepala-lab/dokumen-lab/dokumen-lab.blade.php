@extends('kepala-lab.layout.template')

@section('title', 'Dokumen')

@section('content')

<div class="section-header">
    <h1>Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/Kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen</h2>
    <p class="section-lead">
        Anda dapat melihat Dokumen yang Koordinator Lab tambahkan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Dokumen</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Koordinator Lab</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Jenis Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($docList as $doc)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doc->coordinators->name }}</td>
                                    <td>{{ $doc->visitors->name }}</td>
                                    <td>{{ $doc->visitors->business_name }}</td>
                                    <td>{{ $doc->activities->activity_type }}</td>
                                    <td>{{ $doc->documents->name }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            @if($doc->file_path)
                                            <a href="{{ route('docs.downloadKalab', $doc->id) }}"
                                                class="btn btn-success btn-action" title="Download"><i
                                                    class="fas fa-download"></i></a>
                                            @endif
                                            <a href="{{ route('docs.detail', $doc->id) }}"
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