{{-- @extends('kepala-lab.layout.template')

@section('title', 'Jenis Kegiatan')

@section('content')

<div class="section-header">
    <h1>Jenis Kegiatan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item">Jenis Kegiatan</div>
    </div>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Jenis Kegiatan</h2>
    <p class="section-lead">
        Anda dapat melihat Jenis Kegiatan yang Anda tambahkan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Jenis Kegiatan</h4>
                    <a href="jenis-kegiatan-lab-add" class="btn btn-success btn-action">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Nama Koordinator lab</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activityList as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->activity_type }}</td>
                                    <td>{{ $activity->coordinators->name }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="jenis-kegiatan-lab-edit/{{ $activity->id }}"
                                                class="btn btn-primary btn-action" title="Ubah"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Kamu yakin ingin menghapus data?"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $activity->id }}').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete-form-{{ $activity->id }}"
                                                action="/kepala-lab/jenis-kegiatan-lab-delete/{{ $activity->id }}"
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

@section('title', 'Jenis Kegiatan')

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
                        <h4>Jenis Kegiatan</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="/kepala-lab/dashboard">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
                                    Data Master
                                    <i class="fas fa-caret-right"></i>
                                    Jenis Kegiatan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Tabel Jenis Kegiatan</h4>
                            <div class="box_right d-flex lms_block">
                                <a href="jenis-kegiatan-lab-add" class="btn btn-success btn-action">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Kegiatan</th>
                                        <th scope="col">Nama Koordinator</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityList as $activity)
                                    <tr>
                                        <th scope="row">
                                            <a href="#" class="question_content">
                                                {{ $loop->iteration }}</a>
                                        </th>
                                        <td>{{ $activity->activity_type }}</td>
                                        <td class="nowrap">{{ $activity->coordinators->name }}</td>
                                        <td class="nowrap">{{ $activity->description }}</td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="jenis-kegiatan-lab-edit/{{ $activity->id }}"
                                                    class="btn btn-primary btn-action" title="Ubah"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <form action="/kepala-lab/jenis-kegiatan-lab-delete/{{ $activity->id }}"
                                                    method="post" id="delete-form-{{ $activity->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="confirmDelete(event, 'delete-form-{{ $activity->id }}')"
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