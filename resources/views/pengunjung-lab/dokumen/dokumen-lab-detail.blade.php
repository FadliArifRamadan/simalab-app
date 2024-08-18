@extends('pengunjung-lab.layout.template')

@section('title', 'Detail Dokumen')

@section('content')

<div class="section-header">
    <h1>Detail Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="/pengunjung-lab/dokumen-lab">Dokumen</a></div>
        <div class="breadcrumb-item">Detail Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Detail Dokumen</h2>
    <p class="section-lead">
        Anda dapat melihat Detail Dokumen yang Koordinator Lab tambahkan disini!
    </p>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Dokumen</h5>
                    <p class="card-text"><strong>Nama Koordinator Lab:</strong> {{ $doc->coordinators->name }}</p>
                    <p class="card-text"><strong>Nama Pengunjung:</strong> {{ $doc->visitors->name }}</p>
                    <p class="card-text"><strong>Nama Usaha/Univ/Sekolah:</strong> {{ $doc->visitors->business_name }}
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
@endsection