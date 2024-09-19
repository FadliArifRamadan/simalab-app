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

        <form action="{{ route('docs.tempSave') }}" method="post" enctype="multipart/form-data" id="docForm">
            @csrf
            <div class="card shadow">
                <div class="card-body">
                    <div id="formContainer">
                        <div class="row">
                            <div class="form-group col-12 col-md-4">
                                <label for="users_id">Nama Koor Lab</label>
                                <input type="text" class="form-control" id="users_id" name="users_id[]"
                                    value="{{ $coordinators->name }}" readonly required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="visitors_id">Nama Pengunjung</label>
                                <input type="text" class="form-control" id="" name=""
                                    value="{{ $records->visitors->name }}" readonly required>

                                <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                                    value="{{ $records->visitors->id }}" readonly required>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="activities_id">Jenis Kegiatan</label>
                                <input type="text" class="form-control" id="" name=""
                                    value="{{ $records->activities->activity_type }}" readonly required>

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
                            <div class="form-group col-12 col-md-6">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control" name="description[]">
                            </div>
                            <div class="form-group col-12 col-md-6">
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
                    <div class="form-group col-12 col-md-4">
                        <label for="users_id">Nama Koor Lab</label>
                        <input type="text" class="form-control" id="users_id" name="users_id[]"
                            value="{{ $coordinators->name }}" readonly required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="visitors_id">Nama Pengunjung</label>
                        <input type="text" class="form-control" id="" name="" value="{{ $records->visitors->name }}"
                            readonly required>

                        <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                            value="{{ $records->visitors->id }}" readonly required>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="activities_id">Jenis Kegiatan</label>
                        <input type="text" class="form-control" id="" name=""
                            value="{{ $records->activities->activity_type }}" readonly required>

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
            <div class="form-group col-12 col-md-6">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" name="description[]">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="file_path">Upload</label>
                <input type="file" class="form-control" name="file_path[]">
            </div>
        </div>
        
    `;
    formContainer.appendChild(newForm);
});
</script>
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Tambah Dokumen')

@section('content')
<div class="container-fluid p-0 sm_padding_15px">
    <div class="row justify-content-center">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                @if(Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="white_box_tittle list_header">
                    <h4>Tambah Dokumen</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/koordinator-lab/dashboard">Dashboard</a>
                                <i class="fas fa-caret-right"></i>
                                Dokumen Upload
                                <i class="fas fa-caret-right"></i>
                                Tambah Dokumen
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="{{ route('docs.tempSave') }}" method="post" enctype="multipart/form-data" id="docForm">
                    @csrf
                    <div class="card-shadow">
                        <div id="formContainer">
                            <div class="row">
                                <div class="form-group col-12 col-md-4">
                                    <h6 class="card-subtitle mt-3 mb-2">
                                        Nama Koordinator:
                                    </h6>
                                    <input type="text" class="form-control" id="users_id" name="users_id[]"
                                        value="{{ $coordinators->name }}" readonly required>
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <h6 class="card-subtitle mt-3 mb-2">
                                        Nama Pengunjung:
                                    </h6>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ $records->visitors->name }}" readonly required>

                                    <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                                        value="{{ $records->visitors->id }}" readonly required>
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <h6 class="card-subtitle mt-3 mb-2">
                                        Jenis Kegiatan:
                                    </h6>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ $records->activities->activity_type }}" readonly required>

                                    <input type="hidden" class="form-control" id="activities_id" name="activities_id[]"
                                        value="{{ $records->activities->id }}" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <h6 class="card-subtitle mt-3 mb-2">
                                    Jenis Dokumen:
                                </h6>
                                <select name="documents_id[]" class="form-select">
                                    <option value="">Pilih Satu</option>
                                    @foreach ($documents as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <h6 class="card-subtitle mt-3 mb-2">
                                        Deskripsi:
                                    </h6>
                                    <input type="text" class="form-control" name="description[]">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <h6 class="card-subtitle mt-3 mb-2">
                                        Upload:
                                    </h6>
                                    <input type="file" class="form-control" name="file_path[]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="button" class="btn btn-primary" id="addForm">Tambah</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addForm').addEventListener('click', function() {
    const formContainer = document.getElementById('formContainer');
    const newForm = document.createElement('div');
    newForm.innerHTML = `
    <div class="mt-5" style="height:2px;background:darkgrey; margin:10px 0"></div>
        <div class="row">
            <div class="form-group col-12 col-md-4">
                <h6 class="card-subtitle mt-3 mb-2">
                    Nama Koordinator:
                </h6>
                <input type="text" class="form-control" id="users_id" name="users_id[]"
                    value="{{ $coordinators->name }}" readonly required>
            </div>

            <div class="form-group col-12 col-md-4">
                <h6 class="card-subtitle mt-3 mb-2">
                    Nama Pengunjung:
                </h6>
                <input type="text" class="form-control" id="" name="" value="{{ $records->visitors->name }}"
                    readonly required>

                <input type="hidden" class="form-control" id="visitors_id" name="visitors_id[]"
                    value="{{ $records->visitors->id }}" readonly required>
            </div>

            <div class="form-group col-12 col-md-4">
                <h6 class="card-subtitle mt-3 mb-2">
                    Jenis Kegiatan:
                </h6>
                <input type="text" class="form-control" id="" name=""
                    value="{{ $records->activities->activity_type }}" readonly required>

                <input type="hidden" class="form-control" id="activities_id" name="activities_id[]"
                    value="{{ $records->activities->id }}" readonly required>
            </div>
        </div>

        <div class="form-group">
            <h6 class="card-subtitle mt-3 mb-2">
                Jenis Dokumen:
            </h6>
            <select name="documents_id[]" class="form-select">
                <option value="">Pilih Satu</option>
                @foreach ($documents as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
            </select>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <h6 class="card-subtitle mt-3 mb-2">
                    Deskripsi:
                </h6>
                <input type="text" class="form-control" name="description[]">
            </div>
            <div class="form-group col-12 col-md-6">
                <h6 class="card-subtitle mt-3 mb-2">
                    Upload:
                </h6>
                <input type="file" class="form-control" name="file_path[]">
            </div>
        </div>
        
    `;
    formContainer.appendChild(newForm);
});
</script>
@endsection