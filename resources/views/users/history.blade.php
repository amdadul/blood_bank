@extends('layouts.app')

@section('title') {{ 'Users History' }} @endsection

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
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid silver">
                            <h2 class="card-title" id="heading-labels">Donations
                            </h2>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($donations as $donation)
                            <div class="row" style="padding-bottom: 15px; padding-top:15px; border-bottom: 1px dotted silver">
                                <div class="col-md-4 col-xs-4">
                                    <p class="card-title">{{Carbon\Carbon::parse($donation->created_at)->format('d F Y')}}</p>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$donation->bloodRequest->union->name.' , '.$donation->bloodRequest->union->postOffice->policeStation->name.' , '.$donation->bloodRequest->union->postOffice->policeStation->district->name}}</p>
                                    <p class="card-text"><i class="fa fa-medkit" aria-hidden="true"></i> {{$donation->bloodRequest->hospital_name}}</p>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <p> <i class="fa fa-tint" aria-hidden="true" ></i> {{\App\Lookup::getName('blood_group',$donation->bloodRequest->blood_group_id)}}</p>
                                    <p>{{$donation->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid silver">
                            <h2 class="card-title" id="heading-labels">Service Taken
                            </h2>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($takes as $taken)
                                <div class="row" style="padding-bottom: 15px; padding-top:15px; border-bottom: 1px dotted silver">
                                    <div class="col-md-4 col-xs-4">
                                        <p class="card-title">{{Carbon\Carbon::parse($donation->created_at)->format('d F Y')}}</p>
                                    </div>
                                    <div class="col-md-4 col-xs-4">
                                        <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$taken->bloodRequest->union->name.' , '.$taken->bloodRequest->union->postOffice->policeStation->name.' , '.$taken->bloodRequest->union->postOffice->policeStation->district->name}}</p>
                                        <p class="card-text"><i class="fa fa-medkit" aria-hidden="true"></i> {{$taken->bloodRequest->hospital_name}}</p>
                                    </div>
                                    <div class="col-md-4 col-xs-4">
                                        <p> <i class="fa fa-tint" aria-hidden="true" ></i> {{\App\Lookup::getName('blood_group',$taken->bloodRequest->blood_group_id)}}</p>
                                        <p>{{$taken->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            @endforeach
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
