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
                                <h4 class="card-title">Enquiry List</h4>
                            </div>
                            @can('enquiry-create')
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('enquiries.create') }}" class="btn btn-primary text-end">Add New Enquiry</a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Name</th>
                                            <th data-priority="1">Email</th>
                                            <th data-priority="1">Mobile</th>
                                            <th data-priority="1">User</th>
                                            <th data-priority="1">Query</th>
                                            <th data-priority="1">Created At</th>
                                            <!-- <th data-priority="1">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $key => $enquiry)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $enquiry->name }}</td>
                                                <td>{{ $enquiry->email ?? '' }}</td>
                                                <td>{{ $enquiry->mobile ?? '' }}</td>
                                                <td>{{ $enquiry->user->name ?? '' }}</td>
                                                <td>{{ $enquiry->query ?? '' }}</td>
                                                <td>{{ $enquiry->created_at ? date('d M-y',strtotime($enquiry->created_at)) : '' }}</td>
                                                <!-- <td>
                                                    <a href="{{ route('enquiries.edit', $enquiry->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td> -->
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
 <script src="{{asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

<!-- Init js -->
<script src="{{asset('assets/js/pages/table-responsive.init.js')}}"></script>
@endsection