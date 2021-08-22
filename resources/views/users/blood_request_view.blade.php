@extends('layouts.app')

@section('title') {{ 'Blood Request View' }} @endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/switch.css')}}">


    <!-- END Custom CSS-->
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>
@endpush

@section('content')

    <section id="basic-form-layouts">

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
        @endif

        <div class=" ">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid silver">
                            <h4 class="card-title" id="heading-labels"><i class="fa fa-user"
                                                                          aria-hidden="true"></i> {{$bloodRequest->user->name}}
                            </h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <span class="badge badge-default" style="color:red;font-size: 14px;font-weight: bold; "> <i
                                        class="fa fa-tint" aria-hidden="true"></i> {{\App\Lookup::getName('blood_group',$bloodRequest->blood_group_id)}} </span>

                            </div>

                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><i class="fa fa-medkit"
                                                      aria-hidden="true"></i> {{$bloodRequest->hospital_name}}</h4>
                            <p class="card-text"> {{$bloodRequest->details}}</p>
                            <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$bloodRequest->union->name.' , '.$bloodRequest->union->postOffice->policeStation->name.' , '.$bloodRequest->union->postOffice->policeStation->district->name}}</p>
                            <p class="card-text"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i> {{$bloodRequest->donation_date}}   {{date('h:i:s a', strtotime($bloodRequest->time_frame))}}
                            </p>
                            @if($bloodRequest->emergency)
                                <span class="badge badge-default badge-warning round"><i class="fa fa-bell"
                                                                                         aria-hidden="true"></i> Emergency</span>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="tel:{{$bloodRequest->mobile_no}}" class="btn"
                                       style="font-size: 18px;font-weight: bold; color: #0c0c0c;"><i class="fa fa-phone"
                                                                                                     aria-hidden="true"></i> {{$bloodRequest->mobile_no}}
                                    </a>
                                </div>

                                <div class="col-md-6" style="text-align: center;">
                                    @if($days >= 90)
                                        @if(\App\BloodRequestAccept::isAccepted($bloodRequest->id,auth()->user()->id))
                                            <h3 style="color: red;">Already Accepted</h3>
                                        @else
                                            Are you donating?<br>
                                            <a href="{{route('request.accept',$bloodRequest->id)}}"
                                               class="btn btn-info">Yes
                                                I'm</a>
                                        @endif
                                    @else
                                        <h3 style="color: red;">* You can not donate blood now</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- // Basic form layout section end -->

@endsection

@push('scripts')

    <script src="{{asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/pickers/dateTime/bootstrap-datetime.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

@endpush
