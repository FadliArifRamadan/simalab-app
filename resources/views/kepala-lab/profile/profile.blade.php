@extends('kepala-lab.layout.template')

@section('title', 'Profile')

@section('content')

<div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/kepala-lab/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
</div>

@if(Session::has('status'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<div class="section-body">
    <h2 class="section-title">Profile</h2>
    <p class="section-lead">
        Anda dapat melihat Profile milik Anda disini!
    </p>

    <form method="POST" action="/kepala-lab/profile/{{ $user->id }}">
        @csrf
        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePasswordVisibilityConfirm()">
                            <i class="fas fa-eye" id="togglePasswordConfirmIcon"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }

    function togglePasswordVisibilityConfirm() {
        const passwordField = document.getElementById('password_confirmation');
        const togglePasswordConfirmIcon = document.getElementById('togglePasswordConfirmIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePasswordConfirmIcon.classList.remove('fa-eye');
            togglePasswordConfirmIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            togglePasswordConfirmIcon.classList.remove('fa-eye-slash');
            togglePasswordConfirmIcon.classList.add('fa-eye');
        }
    }
</script>

@endsection