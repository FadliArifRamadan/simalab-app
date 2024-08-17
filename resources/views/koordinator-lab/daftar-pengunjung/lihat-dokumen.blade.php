@extends('koordinator-lab.layout.template')

@section('title', 'Lihat Dokumen')

@section('content')

<div class="section-header">
    <h1>Lihat Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="/koordinator-lab/daftar-pengunjung">Daftar Pengunjung</a></div>
        <div class="breadcrumb-item">Lihat Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen Lab Pengunjung: {{ $visitor->name }}</h2>
    <p class="section-lead">
        Anda dapat melihat Dokumen Lab pengunjung dengan nama {{ $visitor->name }} disini!
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
                    <h4>Tabel Dokumen Lab Pengunjung</h4>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($docList as $doc)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doc->coordinators->name }}</td>
                                    <td>{{ $doc->visitors->name }}</td>
                                    <td>{{ $doc->activities->activity_type }}</td>
                                    <td>{{ $doc->documents->name }}</td>
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