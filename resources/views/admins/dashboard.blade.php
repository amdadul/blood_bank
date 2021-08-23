@extends('layouts.app')

@section('title') {{ 'Dashboard' }} @endsection

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
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="media-body" style="text-align: center;">
                                        <span>You have donated blood</span>
                                        <h3 style="font-weight: bold;padding: 5px;">{{$days}}</h3>
                                        <span>Days Ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: -15px; padding-bottom: 30px;">
                        @if($days>90)
                            <span style=" color: red;">* You can donate blood now</span>
                        @else
                            <span style=" color: red;">* You can not donate blood now</span>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">

                                    <div class="media-body" style="text-align: center;">
                                        <span>People searching for <b>{{$groupName}}</b> blood</span>
                                        <h3 style="font-weight: bold;padding: 5px;">{{$requestCount}}</h3> <span> Near you</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: -15px; padding-bottom: 30px;">
                        @if($days>90)
                            <span style=" color: red;">* You can donate blood now</span>
                        @else
                            <span style=" color: red;">* You can not donate blood now</span>
                        @endif
                    </div>
                </div>
            </div>

            <h2>Request Accepted ( {{$acceptCount}} )</h2>
            <div class="row" style="margin-bottom: 50px;">
                @foreach($acceptRequests as $acceptRequest)
                    @if(\App\BloodRequestAccept::isDonated($acceptRequest->request_id,$acceptRequest->user_id))

                    @else
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-header" style="border-bottom: 1px solid silver">
                                <h4 class="card-title" id="heading-labels"><a href="{{route('request.view',$acceptRequest->request_id)}}"> <i class="fa fa-user" aria-hidden="true"></i> {{$acceptRequest->bloodRequest->user->name}}</a></h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <span class="badge badge-default" style="color:red;font-size: 14px;font-weight: bold; "> <i class="fa fa-tint" aria-hidden="true" ></i> {{\App\Lookup::getName('blood_group',$acceptRequest->bloodRequest->blood_group_id)}} </span>

                                </div>

                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-medkit" aria-hidden="true"></i> {{$acceptRequest->bloodRequest->hospital_name}}</h4>
                                <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> Accepted By {{$acceptRequest->user->name}}</p>
                                <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> {{$acceptRequest->bloodRequest->donation_date}}   {{date('h:i:s a', strtotime($acceptRequest->bloodRequest->time_frame))}}</p>
                            </div>
                            <div class="card-footer">
                                    <div class="col-md-6">
                                        <a href="{{route('admins.donated',$acceptRequest->id)}}" class="btn btn-primary" > Donated
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <h2>Request For Blood ( {{$requestCount}} )</h2>
            <div class="row">
                @foreach($bloodRequests as $bloodRequest)
                    <div class="col-md-3 col-sm-12">
                        <div class="card">
                            <div class="card-header" style="border-bottom: 1px solid silver">
                                <h4 class="card-title" id="heading-labels"><a href="{{route('request.view',$bloodRequest->id)}}"> <i class="fa fa-user" aria-hidden="true"></i> {{$bloodRequest->user->name}}</a></h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <span class="badge badge-default" style="color:red;font-size: 14px;font-weight: bold; "> <i class="fa fa-tint" aria-hidden="true" ></i> {{\App\Lookup::getName('blood_group',$bloodRequest->blood_group_id)}} </span>

                                </div>

                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-medkit" aria-hidden="true"></i> {{$bloodRequest->hospital_name}}</h4>
                                <p class="card-text"><i class="fa fa-info-circle" aria-hidden="true"></i> {{$bloodRequest->details}}</p>
                                <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> {{$bloodRequest->donation_date}}   {{date('h:i:s a', strtotime($bloodRequest->time_frame))}}</p>
                                @if($bloodRequest->emergency)
                                    <span class="badge badge-default badge-warning round"><i class="fa fa-bell" aria-hidden="true"></i> Emergency</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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



    <script>

        $(function () {
            $("#date").datepicker({
                // appendText:"(yy-mm-dd)",
                dateFormat: "yy-mm-dd",
                altField: "#datepicker",
                altFormat: "DD, d MM, yy",
                prevText: "click for previous months",
                nextText: "click for next months",
                showOtherMonths: true,
                selectOtherMonths: true,
                minDate: new Date()
            });

        });


    </script>
@endpush
