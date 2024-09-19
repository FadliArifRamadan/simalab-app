{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Daftar Pengunjung')

@section('content')

<div class="section-header">
    <h1>Daftar Pengunjung</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Daftar pengunjung</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Daftar Pengunjung</h2>
    <p class="section-lead">
        Anda dapat melihat Daftar Pengunjung disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Daftar Pengunjung</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Nama Usaha/Univ/Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $users)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->business_name }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="/koordinator-lab/lihat-dokumen/{{ $users->id }}"
                                                class="btn btn-success btn-action" title="lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
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

@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Daftar Pengunjung')

@section('content')
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="white_box_tittle list_header">
                        <h4>Daftar Pengunjung</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/koordinator-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    Daftar Pengunjung
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Pengajuan</h4>
                            <div class="box_right d-flex lms_block">

                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pengunjung</th>
                                        <th scope="col">Nama Usaha/Pendidikan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $users)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->business_name }}</td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="/koordinator-lab/lihat-dokumen/{{ $users->id }}"
                                                    class="btn btn-success btn-action" title="lihat">
                                                    <i class="fas fa-eye"></i>
                                                </a>
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
        <div class="col-12"></div>
    </div>
</div>
@endsection