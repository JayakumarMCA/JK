@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title fs-4">Add Asset</h3>

                    <form action="{{ route('assetdatas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">File</label>
                                    <input type="file" class="form-control" name="file" required />
                                </div>
                            </div>

                            @php
                                $fields = [
                                    'industries' => 'Industry',
                                    'products' => 'Product',
                                    'assetTypes' => 'Asset Type',
                                    'utilizations' => 'Utilization',
                                    'languages' => 'Language',
                                    'countries' => 'Country'
                                ];
                            @endphp

                            @foreach ($fields as $name => $label)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ $label }}</label>
                                        <select class="form-control" name="{{ $name }}" required>
                                            <option value="">Select {{ $label }}</option>
                                            @foreach (${$name} as $option)
                                                <option value="{{ $option->id }}" {{ old($name) == $option->id ? 'selected' : '' }}>
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary" type="submit">Create Asset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
