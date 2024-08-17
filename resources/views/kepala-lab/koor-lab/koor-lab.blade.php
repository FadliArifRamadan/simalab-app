@extends('kepala-lab.layout.template')

@section('title', 'Koor Lab')

@section('content')

<div class="section-header">
    <h1>Koor Lab</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Master</div>
        <div class="breadcrumb-item">Koor Lab</div>
    </div>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Koor Lab</h2>
    <p class="section-lead">
        Anda dapat melihat Koor Lab yang Anda tambahkan disini!
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Koor Lab</h4>
                    <a href="koor-lab-add" class="btn btn-success btn-action">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Koor Lab</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userList as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->name }}</td>
                                    <td>
                                        <div style="display: flex; gap: 5px;">
                                            <a href="koor-lab-edit/{{ $user->id }}" class="btn btn-primary btn-action"
                                                title="Ubah"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Kamu yakin ingin menghapus data?"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $user->id }}').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="/kepala-lab/koor-lab-delete/{{ $user->id }}" method="POST"
                                                style="display: none;">
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