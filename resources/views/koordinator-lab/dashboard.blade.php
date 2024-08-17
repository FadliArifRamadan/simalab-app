@extends('koordinator-lab.layout.template')

@section('title', 'Dashboard')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>

<div class="section-body">
    <h2 class="section-title">Dashboard</h2>
    <p class="section-lead">
        Anda dapat melihat Status pengajuan Pengunjung disini!
    </p>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Approved</h4>
                    </div>
                    <div class="card-body">
                        {{ $statusCounts['Approved'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Reject</h4>
                    </div>
                    <div class="card-body">
                        {{ $statusCounts['Rejected'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Progress</h4>
                    </div>
                    <div class="card-body">
                        {{ $statusCounts['Progress'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Done</h4>
                    </div>
                    <div class="card-body">
                        {{ $statusCounts['Done'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending</h4>
                    </div>
                    <div class="card-body">
                        {{ $statusCounts['Pending'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection