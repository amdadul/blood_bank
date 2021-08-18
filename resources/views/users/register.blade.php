<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Bloodbank management software">
    <meta name="keywords" content="Bloodbank management software">
    <meta name="author" content="Amdadul Hoque">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Registrations | Amdadul Hoque</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css')}}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/timeline.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <!-- END Custom CSS-->
<style>

</style>
</head>

<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-6 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">

                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Create Account</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" method="POST" action="{{ route('register.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="User Name">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        </div>
                                            <div class="col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left mb-1">
                                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email Address"
                                                   required>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password"
                                                   required>
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                            </div>
                                                <div class="col-md-6">
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password-confirm" placeholder="Confirm Password"
                                                   required>
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </fieldset>
                                                </div></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control form-control-lg @error('mobile_no') is-invalid @enderror" name="mobile_no" id="mobile_no" placeholder="Mobile No"
                                                           required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-mobile"></i>
                                                    </div>
                                                    @error('mobile_no')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control form-control-lg @error('alt_mobile_no') is-invalid @enderror" name="alt_mobile_no" id="alt_mobile_no" placeholder="Alternative Mobile No">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-mobile"></i>
                                                    </div>
                                                    @error('alt_mobile_no')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror
                                                </fieldset>

                                            </div></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender" >Select Gender</label>
                                                    <select id="gender" name="gender" class="select2 form-control form-control-lg @error('gender') is-invalid @enderror">
                                                        <option value="none" selected="" disabled="">Select Gender
                                                        </option>
                                                        @foreach($genders as $gender)
                                                            <option value="{{ $gender->code }}"> {{ $gender->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('gender')<div class="help-block text-danger">{{ $message }} </div> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="religion" >Select Religion</label>
                                                    <select id="religion" name="religion" class="select2 form-control form-control-lg @error('religion') is-invalid @enderror">
                                                        <option value="none" selected="" disabled="">Select Religion
                                                        </option>
                                                        @foreach($religions as $religion)
                                                            <option value="{{ $religion->code }}"> {{ $religion->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('religion')<div class="help-block text-danger">{{ $message }} </div> @enderror
                                                </div>

                                            </div></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="blood_group" >Select Blood Group</label>
                                                    <select id="blood_group" name="blood_group" class="select2 form-control form-control-lg @error('blood_group') is-invalid @enderror">
                                                        <option value="none" selected="" disabled="">Select Blood Group
                                                        </option>
                                                        @foreach($blood_groups as $blood_group)
                                                            <option value="{{ $blood_group->code }}"> {{ $blood_group->name }} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('blood_group')<div class="help-block text-danger">{{ $message }} </div> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control form-control-lg @error('weight') is-invalid @enderror" name="weight" id="weight" placeholder="Weight"
                                                           required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-mobile"></i>
                                                    </div>
                                                    @error('weight')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror
                                                </fieldset>

                                            </div></div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Register</button>
                                    </form>
                                </div>
                                <p class="text-center">Already have an account ? <a href="{{route('login')}}" class="card-link">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>s

</body>
</html>
