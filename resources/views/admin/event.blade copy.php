@extends('admin.layouts.master')

@php
    $page_title = 'Techdata || Event';
    $page_name = 'Techdata || Event';
@endphp
@section('content')
<div class="page-content mainpage-content">
    <img class="img-fluid w-100" style="margin-top: 10px;" src="{{ asset ('assets/images/event-banner.png')}}" />

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
                            <label class="fw-bold">Language</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">English</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Vietnam</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Cantonese</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Bahasa</label>
                            </div>
                        </div>

                        <div class="mb-2 pb-4">
                            <label class="fw-bold">Country</label>
                            <div class="form-check d-flex gap-2 align-items-center">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">India</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">HongKong</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Singapore</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Malaysia</label>
                            </div>
                            <div class="form-check d-flex gap-2 align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="m-category1" />
                                <label class="form-check-label ratinglabel" for="m-category1">Vietnam</label>
                            </div>
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
                            <h3 class="mb-sm-0 d-flex align-items-center gap-2">Events - <small>1-15 (965)</small></h3>

                            <!-- App Search-->
                            <!-- <form class="app-search d-none d-lg-block w-50">
                                    <div class="position-relative">
                                        <input type="text" class="form-control border" placeholder="Search...">
                                        <span class="ri-search-line"></span>
                                    </div>
                                </form> -->

                            <div class="page-title-right">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="fs-5 fw-medium">Sort By:</div>
                                    <div class="">
                                        <select class="form-select">
                                            <option selected>Date</option>
                                            <option>Event Name (A-Z)</option>
                                            <option>Event Name (Z-A)</option>
                                        </select>
                                    </div>
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
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->

                        <!-- 01 -->
                        <div class="card">
                            <img class="w-100" src="{{ asset ('assets/images/events/01.png')}}" />
                            <div class="card-body">
                                <h5 class="card-title">Advanced Solutions Services</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="px-3 py-1">
                                <div class="d-flex gap-1 justify-content-between px-1">
                                    <div>
                                        <div><i class="ri-calendar-2-line align-middle tealcolor"></i> May 31, 2023</div>
                                        <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> 1:00 PM</div>
                                    </div>
                                    <div>
                                        <div><i class="ri-earth-line align-middle tealcolor"></i> India</div>
                                        <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> English</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- 01 -->
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
