{{-- @extends('koordinator-lab.layout.template')

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
                                    <th>Nama Koordinator Lab</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
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
                                    <td>{{ $doc->visitors->business_name }}</td>
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
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Lihat Dokumen')

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="white_box_tittle list_header">
                        <h4>Dokumen Lab Pengunjung: {{ $visitor->name }}</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/koordinator-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    <a href="/koordinator-lab/daftar-pengunjung">Daftar Pengunjung</a>
                                    <i class="fas fa-caret-right"></i>
                                    Lihat Dokumen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Dokumen Lab</h4>
                            <div class="box_right d-flex lms_block">

                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Koordinator Lab</th>
                                        <th scope="col">Nama Pengunjung</th>
                                        <th scope="col">Nama Usaha/Pendidikan</th>
                                        <th scope="col">Jenis Kegiatan</th>
                                        <th scope="col">Jenis Dokumen</th>
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