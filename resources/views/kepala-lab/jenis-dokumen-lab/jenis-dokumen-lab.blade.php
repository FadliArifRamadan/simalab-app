@extends('kepala-lab.layout.template')

@section('title', 'Jenis Dokumen')

@section('content')

<div class="section-header">
    <h1>Jenis Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item">jenis Dokumen</div>
    </div>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Jenis Dokumen</h2>
    <p class="section-lead">
        Anda dapat melihat Jenis Dokumen yang Anda tambahkan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Jenis Dokumen</h4>
                    <a href="jenis-dokumen-lab-add" class="btn btn-success btn-action">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentList as $document)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $document->name }}</td>
                                    <td>{{ $document->description }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="jenis-dokumen-lab-edit/{{ $document->id }}"
                                                class="btn btn-primary btn-action" title="Ubah"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Kamu yakin ingin menghapus data?"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $document->id }}').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete-form-{{ $document->id }}"
                                                action="/kepala-lab/jenis-dokumen-lab-delete/{{ $document->id }}"
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