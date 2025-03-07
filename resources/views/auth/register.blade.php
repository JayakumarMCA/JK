@extends('auth.layouts.master')

@php
    $page_title = 'Register';
    $page_name = 'Register';
@endphp
@section('content')
<body class="auth-body-bg loginbg">
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="row justify-content-md-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mt-0 mb-2">
                            <a href="index.html" class="logo"><img src="assets/images/tech-data.png" height="40" alt="logo-img" /></a>
                        </h3>
                        <h4 class="text-center mt-0 text-color"><b>Sign Up</b></h4>

                        <form class="form-horizontal mt-3" action="/">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required="" placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="email" required="" placeholder="Email" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required="" placeholder="Mobile" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="password" required="" placeholder="Password" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required="" placeholder="Organization" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required="" placeholder="Job Title" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <input class="form-control" type="text" required="" placeholder="City" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="col-12">
                                            <!-- <input class="form-control" type="text" required="" placeholder="City"> -->
                                            <select class="form-select" style="border: #000 solid 1px;">
                                                <option selected>Choose Country</option>
                                                <option value="English">India</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Cantonese">Cantonese</option>
                                                <option value="Bahasa">Bahasa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center mt-4">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light w-50" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group mt-3 mb-0">
                                <div class="col-sm-12 text-center">
                                    <a href="/" class="">Already have account?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection