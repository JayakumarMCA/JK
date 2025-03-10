@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title fs-4">Edit Asset</h3>

                    <form action="{{ route('assetdatas.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $asset->title) }}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Current File</label><br>
                                    <a href="{{ asset('storage/' . $asset->file) }}" target="_blank">View File</a>
                                    <input type="file" class="form-control mt-2" name="file" />
                                    <small class="text-muted">Upload new file to replace the existing one.</small>
                                </div>
                            </div>

                            @php
                                $fields = [
                                    'industry_id' => 'Industry',
                                    'product_id' => 'Product',
                                    'asset_type_id' => 'Asset Type',
                                    'utilization_id' => 'Utilization',
                                    'language_id' => 'Language',
                                    'country_id' => 'Country'
                                ];
                            @endphp

                            @foreach ($fields as $name => $label)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ $label }}</label>
                                        <select class="form-control" name="{{ $name }}" required>
                                            <option value="">Select {{ $label }}</option>
                                            @foreach (${$name . 's'} as $option)
                                                <option value="{{ $option->id }}" {{ $asset->$name == $option->id ? 'selected' : '' }}>
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary" type="submit">Update Asset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
