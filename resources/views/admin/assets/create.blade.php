@extends('admin.layouts.master')

@section('content')
<div class="page-content mainpage-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title fs-4">Add Asset</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br />
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('assetdatas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Title"required />
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <select class="form-control @error('industry_id') is-invalid @enderror" name="industry_id" id="industry_select" required>
                                            <option value="">Select Industry</option>
                                            @foreach ($industries as $industry)
                                                <option value="{{ $industry->id }}" {{ old('industry_id') == $industry->id ? 'selected' : '' }}>
                                                    {{ $industry->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('industry_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6" id="other_industry_div" style="{{ old('industry_id') != 4 ? 'display: none;' : '' }}">
                                    <div class="mb-3">
                                        <label class="form-label">Other Industry</label>
                                        <input type="text" class="form-control" name="other_industry" id="other_industry_input" placeholder="Enter Industry Name" value="{{ old('other_industry')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Product</label>
                                        <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" required>
                                            <option value="">Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Asset Type</label>
                                        <select class="form-control @error('asset_type_id') is-invalid @enderror" id="asset_type_select" name="asset_type_id" required>
                                            <option value="">Select Asset Type</option>
                                            @foreach ($assetTypes as $assetType)
                                                <option value="{{ $assetType->id }}" data-types="{{ $assetType->type }}" {{ old('asset_type_id') == $assetType->id ? 'selected' : '' }}>
                                                    {{ $assetType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('asset_type_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Utilization</label>
                                        <select class="form-control @error('utilization_id') is-invalid @enderror" name="utilization_id" required>
                                            <option value="">Select Utilization</option>
                                            @foreach ($utilizations as $utilization)
                                                <option value="{{ $utilization->id }}" {{ old('utilization_id') == $utilization->id ? 'selected' : '' }}>
                                                    {{ $utilization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('utilization_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Language</label>
                                        <select class="form-control @error('language_id') is-invalid @enderror" name="language_id" required>
                                            <option value="">Select Language</option>
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>
                                                    {{ $language->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('language_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <select class="form-control @error('country_id') is-invalid @enderror" name="country_id" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">File</label>
                                        <input type="file" class="form-control" name="file" id="file_input" required />
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Create Asset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#industry_select').change(function () {
            if ($(this).val() === '4') {
                $('#other_industry_div').show();
                $('#other_industry_input').prop('required', true);
            } else {
                $('#other_industry_div').hide();
                $('#other_industry_input').prop('required', false);
            }
        });
        $('#asset_type_select').change(function () {
            let selectedOption = $(this).find(':selected');
            let allowedTypes = selectedOption.data('types'); // Fetch file extensions

            if (allowedTypes) {
                $('#file_input').attr('accept', allowedTypes);
            } else {
                $('#file_input').removeAttr('accept');
            }
        });
    });
</script>
@endsection
