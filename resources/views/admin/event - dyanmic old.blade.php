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
                    <button class="topcustombtn btn btn-primary d-md-none waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#filterDrawer">Open Filters <i class="ri-filter-2-line align-middle ms-1"></i></button>

                    <div class="filters" id="filters">
                        <div class="mb-2 filterborder pb-4">
                            <label class="fw-bold">Language</label>
                            @foreach($languages as $id => $language)
                                <div class="form-check d-flex gap-2 align-items-center mt-2">
                                    <input class="form-check-input filter-option" type="checkbox" data-filter="languages" value="{{ $language }}" />
                                    <label class="form-check-label ratinglabel">{{ $language }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-2 pb-4">
                            <label class="fw-bold">Country</label>
                            @foreach($countries as $id => $country)
                                <div class="form-check d-flex gap-2 align-items-center mt-2">
                                    <input class="form-check-input filter-option" type="checkbox" data-filter="countries" value="{{ $country }}" />
                                    <label class="form-check-label ratinglabel">{{ $country }}</label>
                                </div>
                            @endforeach
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
                            <h3 class="mb-sm-0 d-flex align-items-center gap-2">Events - <small>{{ $events->firstItem() ?? '0' }}-{{ $events->lastItem() }} ({{ $events->total() }})</small></h3>

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
                                        <select class="form-select" id="sort_by">
                                            <option value="date">Date</option>
                                            <option value="name_asc">Event Name (A-Z)</option>
                                            <option value="name_desc">Event Name (Z-A)</option>
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
                        <div id="event-list">
                            @foreach($events as $event)
                                <div class="event-card">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $event->image) }}" class="w-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->title ?? '' }}</h5>
                                            <p>{{ $event->location ?? '' }}</p>
                                        </div>
                                        <div class="px-3 py-1">
                                            <div class="d-flex gap-1 justify-content-between px-1">
                                                <div>
                                                    <div><i class="ri-calendar-2-line align-middle tealcolor"></i> {{ $event->date ?? '' }}</div>
                                                    <div class="mt-1"><i class="ri-timer-line align-middle tealcolor"></i> {{$event->time ?? ''}}</div>
                                                </div>
                                                <div>
                                                    <div><i class="ri-earth-line align-middle tealcolor"></i> {{$event->country->name ?? ''}}</div>
                                                    <div class="mt-1"><i class="ri-mic-fill align-middle tealcolor"></i> {{$event->language->name ?? ''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button type="button" class="custombtn">Know More <i class="ri-arrow-right-line align-middle ms-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        function fetchEvents(page = 1) {
            let filters = {
                languages: [],
                countries: [],
                products: [],
                assetTypes: [],
                assetUtilizations: [],
                sort_by: $('#sort_by').val(),
                page: page, // Ensure pagination works dynamically
            };
    
            $('.filter-option:checked').each(function() {
                let filterName = $(this).data('filter');
                filters[filterName].push($(this).val());
            });
    
            $.ajax({
                url: "{{ route('fetch.events') }}",
                method: "GET",
                data: filters,
                success: function(response) {
                    $('#event-list').html('');
    
                    $.each(response.data, function(index, event) {
                        $('#event-list').append(`
                            <div class="event-card">
                                <h5>${event.name}</h5>
                                <p>${event.date}</p>
                            </div>
                        `);
                    });
    
                    // Update the event count dynamically
                    $('#event-count').text(`${response.from}-${response.to} (${response.total})`);
    
                    // Update pagination
                    $('.pagination-container').html(response.pagination);
                }
            });
        }
    
        // Pagination event listener
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchEvents(page);
        });
        // Filter & sort change events
        $('.filter-option').change(fetchEvents);
        $('#sort_by').change(fetchEvents);
    });
    </script>
@endsection