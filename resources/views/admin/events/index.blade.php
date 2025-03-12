@extends('admin.layouts.master')
@section('css')
    <!-- Responsive Table css -->
    <link href="{{asset ('assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content mainpage-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Events List</h4>
                            </div>
                            @can('event-edit')
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('events.create') }}" class="btn btn-primary text-end">Add New Event</a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Title</th>
                                            <th data-priority="1">Image</th>
                                            <th data-priority="1">Date</th>
                                            <th data-priority="1">Time</th>
                                            <th data-priority="1">Location</th>
                                            <th data-priority="1">Country</th>
                                            <th data-priority="1">Language</th>
                                            <th data-priority="1">Status</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $key => $event)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>
                                                    @if($event->image)
                                                        <img src="{{ asset('storage/' . $event->image) }}" width="50" height="50" alt="Event Image">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>

                                                <td>{{ $event->date }}</td>
                                                <td>{{ $event->time }}</td>
                                                <td>{{ $event->location }}</td>
                                                <td>{{ $event->country->name }}</td>
                                                <td>{{ $event->language->name }}</td>
                                                <td>{{ $event->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    @can('event-edit')
                                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    @endcan
                                                    <!-- <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form> -->
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
    </div>
</div>
@endsection
@section('js')
 <!-- Responsive Table js -->
 <script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/table-responsive.init.js"></script>
@endsection