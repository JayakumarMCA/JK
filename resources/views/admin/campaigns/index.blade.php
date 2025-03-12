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
                                <h4 class="card-title">Campaigns List</h4>
                            </div>
                            @can('campaign-create')
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('campaigns.create') }}" class="btn btn-primary text-end">Add New Campaign</a>
                                </div>
                            @endcan
                        </div>
                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Campaign Name</th>
                                            <th data-priority="1">Campaign For</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($campaigns as $key => $campaign)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $campaign->name }}</td>
                                                <td>{{ $campaign->s_for ?? '' }}</td>
                                                <td>
                                                    @can('campaign-edit')
                                                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    @endcan
                                                    @can('campaign-delete')
                                                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    @endcan
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
 <script src="{{ asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

<!-- Init js -->
<script src="{{ asset('assets/js/pages/table-responsive.init.js')}}"></script>
@endsection