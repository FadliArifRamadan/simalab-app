{{-- @extends('kepala-lab.layout.template')

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
@endsection --}}

@extends('kepala-lab.layout.dashboard')

@section('title', 'Jenis Dokumen')

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
                        <h4>Jenis Dokumen</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/kepala-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    Data Master
                                    <i class="fas fa-caret-right"></i>
                                    Jenis Dokumen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Jenis Dokumen</h4>
                            <div class="box_right d-flex lms_block">
                                <a href="jenis-dokumen-lab-add" class="btn btn-success btn-action">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Dokumen</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentList as $document)
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="question_content">
                                                {{ $loop->iteration }}</a>
                                        </th>
                                        <td class="nowrap">{{ $document->name }}</td>
                                        <td class="nowrap">{{ $document->description }}</td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="jenis-dokumen-lab-edit/{{ $document->id }}"
                                                    class="btn btn-primary btn-action" title="Ubah"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                {{-- <form
                                                    action="/kepala-lab/jenis-dokumen-lab-delete/{{ $document->id }}"
                                                    method="post" onsubmit="return confirmDelete();">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ">
                                                        <i class="fas fa-trash"></i></button>
                                                </form> --}}
                                                <form action="/kepala-lab/jenis-dokumen-lab-delete/{{ $document->id }}"
                                                    method="post" id="delete-form-{{ $document->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="confirmDelete(event, 'delete-form-{{ $document->id }}')"
                                                        class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
        <div class="col-12"></div>
    </div>
</div>

<script>
    function confirmDelete(event, formId) {
        event.preventDefault(); // Mencegah submit form langsung

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit(); // Submit form jika user konfirmasi
            }
        })
    }
</script>
@endsection