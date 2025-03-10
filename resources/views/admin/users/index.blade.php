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
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('users.create') }}" class="btn btn-primary text-end">Add Role</a>
                            </div>
                        </div>
                        <!-- <h3 class="card-title fs-4">Users List</h3> -->
                        <!-- <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a> -->

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-rep-plugin mt-3">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table">
                                    <thead>
                                        <tr>
                                            <th  data-priority="1">#</th>
                                            <th  data-priority="1">Email</th>
                                            <th  data-priority="1">Mobile</th>
                                            <th  data-priority="1">Organization</th>
                                            <th  data-priority="1">Job Title</th>
                                            <th  data-priority="1">City</th>
                                            <th  data-priority="1">Country</th>
                                            <th  data-priority="1">Role</th>
                                            <th  data-priority="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->organization }}</td>
                                                <td>{{ $user->job_title }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td>{{ $user->country->name ?? 'N/A' }}</td>
                                                <td>{{ $user->role->name ?? 'N/A' }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
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