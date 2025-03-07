@extends('admin.layouts.master')

@php
    $page_title = 'Techdata || Page';
    $page_name = 'Techdata || Page';
@endphp
@section('content')
<div class="page-content mainpage-content">
    <img class="img-fluid w-100" style="margin-top: 10px;" src="{{ asset('assets/images/techbanner.png')}}" />

    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Filter Bar -->
            <div class="col-12 col-lg-3">
                <!-- Filter Wrapper (One Set for Desktop & Mobile) -->
                <div class="filter-container">
                    <!-- Mobile Button to Open Filter Drawer -->
                    <!-- <button class="btn btn-dark d-md-none topcustombtn" data-bs-toggle="offcanvas" data-bs-target="#filterDrawer">
        Open Filters
    </button> -->
                    <button class="topcustombtn btn btn-primary d-md-none waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#filterDrawer">Open Filters <i class="ri-filter-2-line align-middle ms-1"></i></button>

                    <!-- The Only Set of Filters (With Titles) -->
                    <div class="filters" id="filters">
                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Industry</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Architecture, Engineering, Construction</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Product Design & Manufacturing</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Media & Entertainment</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Others</label>
                            </div>
                        </div>

                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Product</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">AutoCAD IST</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">AutoCAD LT</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Revit LT Suite</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">3ds MAX</label>
                            </div>
                        </div>

                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Asset Type</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Video</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Audio</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">PPT</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Docs/PDF</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Images</label>
                            </div>
                        </div>

                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Ultilization</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Partner Centric</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Customer Centric</label>
                            </div>
                        </div>

                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Language</label>
                            <select class="form-select">
                                <option selected>Choose Language</option>
                                <option value="English">English</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Cantonese">Cantonese</option>
                                <option value="Bahasa">Bahasa</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">Country</label>
                            <select class="form-select">
                                <option selected>Select Country</option>
                                <option value="India">India</option>
                                <option value="HongKong">HongKong</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Mobile Offcanvas Drawer -->
                <div class="offcanvas offcanvas-start" id="filterDrawer">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Filters</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Move the same filters inside offcanvas -->
                        <div id="filterPlaceholder"></div>
                    </div>
                </div>
            </div>
            <!-- Filter Bar -->

            <div class="col-12 col-lg-9">
                <!-- start page title -->
                <div class="row mt-lg-0 mt-4">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-sm-0">Exclusive Assets for Partners</h3>

                            <div class="page-title-right">
                                <div class="d-flex gap-3">
                                    <button class="topcustombtn btn btn-primary waves-effect waves-light">Download <i class="ri-download-line align-middle ms-1"></i></button>
                                    <button class="topcustombtn btn btn-primary waves-effect waves-light">Email <i class="ri-mail-line align-middle ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row mb-4">
                    <div class="card-group gap-4">
                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-1-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 02 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-3-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Technical Support</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 02 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-8-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Social Post</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-12-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Marketing Capabilities</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-13-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Managed Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-14-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Managed Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-12-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">ISV Solutions Factory</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-1-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Professional Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="card-group gap-4">
                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-1-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 02 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-3-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Technical Support</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 02 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-8-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Social Post</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-12-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Marketing Capabilities</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-13-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Managed Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-14-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Managed Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-12-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">ISV Solutions Factory</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->

                        <!-- 03 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset('assets/images/products/course-1-img.jpg')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Professional Services</h5>
                            </div>
                            <div class="card-footer">
                                <div class="form-check d-flex gap-2 align-items-center justify-content-between">
                                    <input class="form-check-input" type="checkbox" id="m-category1" />
                                    <button type="button" class="custombtn">Download <i class="ri-download-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 03 -->
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>
</div>


@endsection
