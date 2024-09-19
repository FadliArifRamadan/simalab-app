{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Detail Dokumen Lab')

@section('content')

<div class="section-header">
    <h1>Detail Dokumen Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item"><a href="/koordinator-lab/dokumen-lab">Dokumen Lab</a></div>
        <div class="breadcrumb-item">Detail Dokumen Lab</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Detail Dokumen Lab</h2>
    <p class="section-lead">
        Anda dapat melihat Detail Dokumen Lab disini!
    </p>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Dokumen</h5>
                    <p class="card-text"><strong>Nama Koordinator Lab:</strong> {{ $doc->coordinators->name }}</p>
                    <p class="card-text"><strong>Nama pengunjung</strong> {{ $doc->visitors->name }}</p>
                    <p class="card-text"><strong>Nama Usaha/Univ/Sekolah</strong> {{ $doc->visitors->business_name }}
                    </p>
                    <p class="card-text"><strong>Jenis Dokumen:</strong> {{ $doc->documents->name }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $doc->description }}</p>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dokumen</h5>
                    @if(in_array(pathinfo($doc->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $doc->file_path) }}" alt="Dokumen Gambar"
                        style="max-width: 100%; height: auto;">
                    @elseif(pathinfo($doc->file_path, PATHINFO_EXTENSION) == 'pdf')
                    <embed src="{{ asset('storage/' . $doc->file_path) }}" type="application/pdf" width="100%"
                        height="500px">
                    @else
                    <p>File tidak dapat ditampilkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Detail Dokumen Lab')

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="white_box_tittle list_header">
                        <h4>Detail Dokumen Lab</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/koordinator-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    <a href="/koordinator-lab/dokumen-lab">Dokumen Lab</a>
                                    <i class="fas fa-caret-right"></i>
                                    Detail Dokumen Lab
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Dokumen</h5>
                                    <p class="card-text"><strong>Nama Koordinator:</strong> {{
                                        $doc->coordinators->name }}</p>
                                    <p class="card-text"><strong>Nama pengunjung:</strong> {{ $doc->visitors->name }}
                                    </p>
                                    <p class="card-text"><strong>Nama Usaha/Pendidikan:</strong> {{
                                        $doc->visitors->business_name }}
                                    </p>
                                    <p class="card-text"><strong>Jenis Dokumen:</strong> {{ $doc->documents->name }}</p>
                                    <p class="card-text"><strong>Deskripsi:</strong> {{ $doc->description }}</p>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Dokumen</h5>
                                    @if(in_array(pathinfo($doc->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset('storage/' . $doc->file_path) }}" alt="Dokumen Gambar"
                                        style="max-width: 100%; height: auto;">
                                    @elseif(pathinfo($doc->file_path, PATHINFO_EXTENSION) == 'pdf')
                                    <embed src="{{ asset('storage/' . $doc->file_path) }}" type="application/pdf"
                                        width="100%" height="500px">
                                    @else
                                    <p>File tidak dapat ditampilkan.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection