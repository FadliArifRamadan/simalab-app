@extends('koordinator-lab.layout.template')

@section('title', 'Tambah Dokumen')

@section('content')

<div class="section-header">
    <h1>Tambah Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item">Tambah Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Dokumen</h2>
    <p class="section-lead">
        Anda dapat Tambah Dokumen disini!
    </p>

    <div class="mt-5 col-12 m-auto">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('docs.tempSave') }}" method="post" enctype="multipart/form-data" id="docForm">
            @csrf
            <div class="card shadow">
                <div class="card-body">
                    <div id="formContainer">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="users_id">Nama Koor Lab</label>
                                <input type="text" class="form-control" id="users_id" name="users_id[]"
                                    value="{{ $coordinators->name }}" readonly required>
                            </div>
                            <div class="form-group col-4">
                                <label for="visitors_id">Nama Pengunjung</label>
                                <input type="text" class="form-control" id="" name=""
                                    value="{{ $records->visitors->name }}" readonly required>

                                {{-- id visitor --}}
                                <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                                    value="{{ $records->visitors->id }}" readonly required>
                            </div>
                            <div class="form-group col-4">
                                <label for="activities_id">Jenis Kegiatan</label>
                                <input type="text" class="form-control" id="" name=""
                                    value="{{ $records->activities->activity_type }}" readonly required>

                                {{-- id activity --}}
                                <input type="hidden" class="form-control" id="activities_id" name="activities_id[]"
                                    value="{{ $records->activities->id }}" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="documents_id">Jenis Dokumen</label>
                            <select name="documents_id[]" class="form-control">
                                <option value="">Pilih Satu</option>
                                @foreach ($documents as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" name="description[]">
                            </div>
                            <div class="form-group col-6">
                                <label for="file_path">Upload</label>
                                <input type="file" class="form-control" name="file_path[]">
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" id="addForm">Tambah</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('addForm').addEventListener('click', function() {
    const formContainer = document.getElementById('formContainer');
    const newForm = document.createElement('div');
    newForm.innerHTML = `
    <div style="height:2px;background:darkgrey; margin:10px 0"></div>
        <div class="row">
                    <div class="form-group col-4">
                        <label for="users_id">Nama Koor Lab</label>
                        <input type="text" class="form-control" id="users_id" name="users_id[]"
                            value="{{ $coordinators->name }}" readonly required>
                    </div>
                    <div class="form-group col-4">
                        <label for="visitors_id">Nama Pengunjung</label>
                        <input type="text" class="form-control" id="" name="" value="{{ $records->visitors->name }}"
                            readonly required>

                        {{-- id visitor --}}
                        <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                            value="{{ $records->visitors->id }}" readonly required>
                    </div>
                    <div class="form-group col-4">
                        <label for="activities_id">Jenis Kegiatan</label>
                        <input type="text" class="form-control" id="" name=""
                            value="{{ $records->activities->activity_type }}" readonly required>

                        {{-- id activity --}}
                        <input type="hidden" class="form-control" id="activities_id" name="activities_id[]"
                            value="{{ $records->activities->id }}" readonly required>
                    </div>
                </div>
        <div class="form-group">
            <label for="documents_id">Jenis Dokumen</label>
            <select name="documents_id[]" class="form-control">
                <option value="">Pilih Satu</option>
                @foreach ($documents as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" name="description[]">
            </div>
            <div class="form-group col-6">
                <label for="file_path">Upload</label>
                <input type="file" class="form-control" name="file_path[]">
            </div>
        </div>
        
    `;
    formContainer.appendChild(newForm);
});
</script>
@endsection

{{-- @extends('koordinator-lab.layout.template')

@section('title', 'Tambah Dokumen')

@section('content')

<div class="section-header">
    <h1>Tambah Dokumen</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/koordinator-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Dokumen Upload</div>
        <div class="breadcrumb-item">Tambah Dokumen</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambah Dokumen</h2>
    <p class="section-lead">
        Anda dapat Tambah Dokumen disini!
    </p>

    <div class="mt-5 col-12 m-auto">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/koordinator-lab/dokumen-lab-add/{{ $submission->id }}" method="post"
            enctype="multipart/form-data" id="docForm">
            @csrf
            <div id="formContainer">
                <div class="row">
                    <div class="form-group col-4">
                        <label for="users_id">Nama Koor Lab</label>
                        <input type="text" class="form-control" value="{{ $coordinators->name }}" readonly>
                        <input type="hidden" name="users_id[]" value="{{ $coordinators->id }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="visitors_id">Nama Pengunjung</label>
                        <input type="text" class="form-control" value="{{ $submission->visitors->name }}" readonly>
                        <input type="hidden" name="visitors_id[]" value="{{ $submission->visitors->id }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="activities_id">Jenis Kegiatan</label>
                        <input type="text" class="form-control" value="{{ $submission->activities->activity_type }}"
                            readonly>
                        <input type="hidden" name="activities_id[]" value="{{ $submission->activities->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="documents_id">Jenis Dokumen</label>
                    <select name="documents_id[]" class="form-control">
                        <option value="">Pilih Satu</option>
                        @foreach ($documents as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" name="description[]">
                    </div>
                    <div class="form-group col-6">
                        <label for="file_path">Upload</label>
                        <input type="file" class="form-control" name="file_path[]">
                    </div>
                    <hr>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" id="addForm">Tambah</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- <script>
    document.getElementById('addForm').addEventListener('click', function() {
    const formContainer = document.getElementById('formContainer');
    const newForm = document.createElement('div');
    newForm.innerHTML = `
        <div class="row">
            <div class="form-group col-4">
                <label for="users_id">Nama Koor Lab</label>
                <input type="text" class="form-control" id="users_id" name="users_id[]" value="{{ $users->name }}"
                        readonly required>
            </div>
            <div class="form-group col-4">
                <label for="visitors_id">Nama Pengunjung</label>
                <input type="text" class="form-control" id="visitors_id" name="visitors_id[]" value="{{ $submission->users->name }}" readonly required>
            </div>
            <div class="form-group col-4">
                <label for="activities_id">Jenis Kegiatan</label>
                <input type="text" class="form-control" id="activities_id" name="activities_id[]" value="{{ $submission->activities->activity_type }}" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label for="documents_id">Jenis Dokumen</label>
            <select name="documents_id[]" class="form-control">
                <option value="">Pilih Satu</option>
                @foreach ($documents as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" name="description[]">
            </div>
            <div class="form-group col-6">
                <label for="file_path">Upload</label>
                <input type="file" class="form-control" name="file_path[]">
            </div>
        </div>
        <hr>
    `;
    formContainer.appendChild(newForm);
});
</script>
@endsection --}}