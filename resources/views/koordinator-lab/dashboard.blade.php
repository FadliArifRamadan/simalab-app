{{-- @extends('koordinator-lab.layout.template')

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
@endsection --}}

@extends('koordinator-lab.layout.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="white_card_header">
                <div class="white_box_tittle list_header">
                    <h4>Dashboard Koordinator Lab</h4>
                    <div class="box_right d-flex lms_block">
                        <div class="dashboard_breadcam text-end">
                            <p>
                                <a href="/koordinator-lab/dashboard">Dashboard</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap">
                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>
                                            Pengunjung
                                        </p>
                                        <h3>
                                            <span class="counter">{{ $statusCounts['Pending'] }}</span>
                                        </h3>
                                    </div>
                                    <a href="#" class="notification_btn gray_btn">Pending</a>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Pengunjung</p>
                                        <h3>
                                            <span class="counter">{{ $statusCounts['Approved'] }}</span>
                                        </h3>
                                    </div>
                                    <a href="#" class="notification_btn">Approved</a>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Pengunjung</p>
                                        <h3>
                                            <span class="counter">{{ $statusCounts['Progress'] }}</span>
                                        </h3>
                                    </div>
                                    <a href="#" class="notification_btn yellow_btn">Progress</a>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>Pengunjung</p>
                                        <h3>
                                            <span class="counter">{{ $statusCounts['Rejected'] }}</span>
                                        </h3>
                                    </div>
                                    <a href="#" class="notification_btn danger_btn">Rejected</a>
                                </div>

                                <div class="single_quick_activity">
                                    <div class="count_content">
                                        <p>
                                            Pengunjung
                                        </p>
                                        <h3>
                                            <span class="counter">{{ $statusCounts['Done'] }}</span>
                                        </h3>
                                    </div>
                                    <a href="#" class="notification_btn green_btn">Done</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection