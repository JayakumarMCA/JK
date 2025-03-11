@extends('admin.layouts.master')
@section('css')
    <!-- Responsive Table css -->
    <link href="{{asset ('assets/libs/admin-resources/rwd-table/rwd-table.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- Row Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">Roles</h4>
                            </div>
                            @can('role-create')
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary text-end">Add Role</a>
                                </div>
                            @endcan
                        </div>
                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->

                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Role</th>
                                            <th data-priority="3">Created At</th>
                                            <th data-priority="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at ? date('d M-y',strtotime($role->created_at)) : '' }}</td>
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                                @endcan
                                                @can('role-delete')
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
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
            <!-- end col -->
        </div>
        <!-- end row -->
        <!-- Row End -->
    </div>
</div>
@endsection
@section('js')
 <!-- Responsive Table js -->
 <script src="{{asset('assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

<!-- Init js -->
<script src="{{asset('assets/js/pages/table-responsive.init.js')}}"></script>
@endsection