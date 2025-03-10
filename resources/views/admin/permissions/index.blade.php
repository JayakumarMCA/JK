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
                                <h4 class="card-title">Permissions</h4>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary text-end">Add Permission</a>
                            </div>
                        </div>
                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->

                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Permission</th>
                                            <th data-priority="3">Created At</th>
                                            <th data-priority="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->created_at ? date('d M-y',strtotime($permission->created_at)) : '' }}</td>
                                            <td>
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
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
 <script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/table-responsive.init.js"></script>
@endsection