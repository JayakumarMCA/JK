@extends('admin.layouts.master')

@section('content')
<div class="page-content mainpage-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title fs-4">Add Campaign</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br />
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Campaign Name"required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">For</label>
                                        <input type="text" class="form-control" name="s_for" value="{{ old('s_for') }}" placeholder="Enter For"required />
                                        @error('s_for')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
