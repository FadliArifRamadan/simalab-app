{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Data Simpan Dokumen Lab')

@section('content')

<div class="section-header">
    <h1>Dokumen Simpan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item">Dokumen Simpan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen Simpan</h2>
    <p class="section-lead">
        Anda dapat melihat dokumen yang disimpan sebelum diupload disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Dokumen Simpan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session('tempDocs'))
                        <form action="{{ route('docs.tempUpload') }}" method="POST">
                            @csrf
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Koor Lab</th>
                                        <th>Pengunjung</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tempDocs as $tempDoc)
                                    @if ($tempDoc['users_id'] == Auth::user()->id)
                                    <tr>
                                        <td>{{ $coordinators[$tempDoc['users_id']]->name }}</td>
                                        <td>{{ $visitors[$tempDoc['visitors_id']]->name }}</td>
                                        <td>{{ $activities[$tempDoc['activities_id']]->activity_type }}</td>
                                        <td>{{ $documents[$tempDoc['documents_id']]->name }}</td>
                                        <td>{{ $tempDoc['description'] }}</td>
                                        <td>{{ $tempDoc['file_path'] ? basename($tempDoc['file_path']) : 'Tidak ada
                                            file' }}
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success mt-2 mb-2">Kirim</button>
                        </form>
                        @else
                        <p>Tidak ada data sementara yang ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Data Simpan Dokumen Lab')

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    @if(Session::has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="white_box_tittle list_header">
                        <h4>Dokumen Simpan</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/koordinator-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    Dokumen Upload
                                    <i class="fas fa-caret-right"></i>
                                    Dokumen Simpan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Dokumen Simpan</h4>
                            <div class="box_right d-flex lms_block">
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            @if(session('tempDocs'))
                            <form action="{{ route('docs.tempUpload') }}" method="POST">
                                @csrf
                                <table class="table lms_table_active" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Koor Lab</th>
                                            <th>Pengunjung</th>
                                            <th>Jenis Kegiatan</th>
                                            <th>Jenis Dokumen</th>
                                            <th>Deskripsi</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tempDocs as $tempDoc)
                                        @if ($tempDoc['users_id'] == Auth::user()->id)
                                        <tr>
                                            <td>{{ $coordinators[$tempDoc['users_id']]->name }}</td>
                                            <td>{{ $visitors[$tempDoc['visitors_id']]->name }}</td>
                                            <td>{{ $activities[$tempDoc['activities_id']]->activity_type }}</td>
                                            <td>{{ $documents[$tempDoc['documents_id']]->name }}</td>
                                            <td>{{ $tempDoc['description'] }}</td>
                                            <td>{{ $tempDoc['file_path'] ? basename($tempDoc['file_path']) : 'Tidak ada
                                                file' }}
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success mt-2 mb-2">Kirim</button>
                            </form>
                            @else
                            <p>Tidak ada data sementara yang ditemukan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12"></div>
    </div>
</div>
@endsection

{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Data Simpan Dokumen Lab')

@section('content')

<div class="section-header">
    <h1>Dokumen Simpan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item">Dokumen Simpan</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Dokumen Simpan</h2>
    <p class="section-lead">
        Anda dapat melihat dokumen yang disimpan sebelum diupload disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Dokumen Simpan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session('tempDocs'))
                        <form action="{{ route('docs.tempUpload') }}" method="POST">
                            @csrf
                            <table class="table table-striped" id="table-1" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Koor Lab</th>
                                        <th>Pengunjung</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tempDocs as $tempDoc)
                                    @if ($tempDoc['users_id'] == Auth::user()->id)
                                    <tr>
                                        <td>{{ $users[$tempDoc['users_id']]->name ?? 'N/A' }}</td>
                                        <td>{{ $visitors[$tempDoc['visitors_id']]->name ?? 'N/A' }}</td>
                                        <td>{{ $activities[$tempDoc['activities_id']]->activity_type ?? 'N/A' }}</td>
                                        <td>{{ $documents[$tempDoc['documents_id']]->name ?? 'N/A' }}</td>
                                        <td>{{ $tempDoc['description'] }}</td>
                                        <td>{{ $tempDoc['file_path'] ? basename($tempDoc['file_path']) : 'Tidak ada
                                            file' }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success mt-2 mb-2">Kirim</button>
                        </form>
                        @else
                        <p>Tidak ada data sementara yang ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}