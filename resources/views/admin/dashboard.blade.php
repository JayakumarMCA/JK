@extends('admin.layouts.master')

@php
    $page_title = 'Techdata || Dashboard';
    $page_name = 'Techdata || Dashboard';
@endphp

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                        <li class="breadcrumb-item active">Topbar Light</li>
                                    </ol>
                                </div> -->
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h4 class="card-title text-muted">Total Users</h4>
                            <h2 class="mt-3 mb-2"><i class="mdi mdi-account-group-outline text-success me-2"></i><b>8952</b></h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body p-t-10">
                            <h4 class="card-title text-muted mb-0">Total Assets in portal</h4>
                            <h2 class="mt-3 mb-2"><i class="mdi mdi-database-edit-outline text-success me-2"></i><b>6521</b></h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body p-t-10">
                            <h4 class="card-title text-muted mb-0">Country Wise usage</h4>
                            <h2 class="mt-3 mb-2"><i class="mdi mdi-chart-bell-curve text-success me-2"></i><b>2515</b></h2>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">

            <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 card-title">Utilization</h4>

                            <div class="morris-charts" id="morris-donut-example" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 card-title">Industry</h4>

                            <div id="morris-bar-example" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 card-title">Product</h4>

                           

                            <div id="morris-area-example" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- end row -->
        </div>
    </div>
    <!-- End Page-content -->
@endsection
