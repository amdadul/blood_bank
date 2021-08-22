@extends('layouts.app')

@section('title') {{ 'Blood Request' }} @endsection

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

        <div class="d-flex justify-content-center">
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">Blood Request</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                            </div>
                            <form class="form" method="POST" action="{{ route('user.blood.request.store') }}">
                                @csrf
                                <div class="form-body">

                                    <div class="form-group">
                                        <label for="details">Details</label>
                                        <textarea id="details" rows="5" class="form-control border-primary"
                                                  name="details"
                                                  placeholder="Details">{{ old('details') }}</textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="datetimepicker1">Donation Date<span
                                                        class="required text-danger">*</span></label>
                                                <input type="text"
                                                       class="form-control @error('date') is-invalid @enderror"
                                                       id="date" value="{!! date('Y-m-d') !!}" name="date" required>
                                                @error('date')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                                @error('date')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>

                                        <div class='col-sm-6'>
                                            <div class="form-group">
                                                <label for="datetimepicker1">Donation Time<span
                                                        class="required text-danger">*</span></label>
                                                <div class='input-group time' id=''
                                                     data-provide="datepicker">
                                                    <input type='time' name="time" value="{{old('time')}}"
                                                           class="form-control @error('time') is-invalid @enderror"
                                                           data-date-format="Y-MM-DD" autocomplete="off"/>
                                                    <div class="input-group-append">
                                                    </div>
                                                </div>
                                                @error('time')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile No <span
                                                        class="required text-danger">*</span></label>
                                                <input type="text" id="mobile"
                                                       class="form-control border-primary @error('mobile') is-invalid @enderror"
                                                       placeholder="Mobile No"
                                                       name="mobile" value="{{ old('mobile') }}">
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alt_mobile_no">Alternative Mobile No</label>
                                                <input type="text" id="alt_mobile_no"
                                                       class="form-control border-primary" placeholder="Alt Mobile No"
                                                       name="alt_mobile_no" value="{{ old('alt_mobile_no') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="blood_group">Blood Group <span
                                                        class="required text-danger">*</span></label>
                                                <select id="blood_group" name="blood_group"
                                                        class="select2 form-control @error('blood_group') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select Blood Group
                                                    </option>
                                                    @foreach($blood_groups as $blood_group)
                                                        <option
                                                            value="{{$blood_group->code}}" {{ old('blood_group')==$blood_group->code?'selected':'' }}>{{$blood_group->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('blood_group')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hospital_name">Hospital Name<span
                                                        class="required text-danger">*</span></label>
                                                <input type="text" id="hospital_name"
                                                       class="form-control border-primary @error('hospital_name') is-invalid @enderror"
                                                       placeholder="Hospital Name"
                                                       name="hospital_name" value="{{ old('hospital_name') }}">
                                                @error('hospital_name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="district">District <span
                                                        class="required text-danger">*</span></label>
                                                <select id="district" name="district"
                                                        class="select2 form-control @error('district') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select District
                                                    </option>
                                                    @foreach($districts as $district)
                                                        <option
                                                            value="{{$district->id}}" {{ old('district')==$district->id?'selected':'' }}>{{$district->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('district')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="police_station">Police Station <span
                                                        class="required text-danger">*</span></label>
                                                <select id="police_station" name="police_station"
                                                        class="select2 form-control @error('police_station') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select District
                                                    </option>

                                                </select>
                                                @error('police_station')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="post_office">Post Office <span
                                                        class="required text-danger">*</span></label>
                                                <select id="post_office" name="post_office"
                                                        class="select2 form-control @error('post_office') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select Police Station
                                                    </option>
                                                </select>
                                                @error('post_office')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="union">Union <span
                                                        class="required text-danger">*</span></label>
                                                <select id="union" name="union"
                                                        class="select2 form-control @error('union') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select Post Office
                                                    </option>

                                                </select>
                                                @error('union')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="relation">Relation with Patient</label>
                                                <select id="relation" name="relation"
                                                        class="select2 form-control @error('relation') is-invalid @enderror">
                                                    <option value="none" selected="" disabled="">Select Relation
                                                    </option>
                                                    @foreach($relationships as $relation)
                                                        <option
                                                            value="{{$relation->id}}" {{ old('relation')==$relation->id?'selected':'' }}>{{$relation->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('relation')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="switch1">Emergency </label>
                                                <fieldset>
                                                <div class="float-left">
                                                    <input type="checkbox" class="switch" name="emergency" value="1" id="switch1" />
                                                </div>
                                                </fieldset>
                                                @error('emergency')
                                                <div class="help-block text-danger">{{ $message }} </div> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions right">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
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
    <script>

        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $("#district").on('change', function (e) {
            getPoliceStation();
        });

        $("#police_station").on('change', function (e) {
            getPostOffice();
        });

        $("#post_office").on('change', function (e) {
            getUnion();
        });

        function getPoliceStation() {
            var district_id = $("#district").val();
            $.ajax({
                url: "{{ route('police.station.name') }}",
                type: 'post',
                dataType: "json",
                cache: false,
                data: {
                    _token: CSRF_TOKEN,
                    district_id: district_id,
                },
                beforeSend: function () {
                    if (district_id == "" || district_id == 0 || district_id == null) {
                        toastr.warning(" Please select District!", 'Message <i class="fa fa-bell faa-ring animated"></i>');
                        return false;
                    }
                },
                success: function (data) {
                    var len = data.length;
                    $("#police_station").empty();
                    if (len < 1) {
                        $("#police_station").append("<option value='0'>Police Station Not Found!</option>");
                    } else {
                        $("#police_station").append("<option value='0'>Select Police Station</option>");
                        for (var i = 0; i < len; i++) {
                            var id = data[i]['id'];
                            var name = data[i]['name'];
                            $("#police_station").append("<option value='" + id + "'>" + name + "</option>");
                        }
                    }

                },
                error: function (xhr, textStatus, thrownError) {
                    alert(xhr + "\n" + textStatus + "\n" + thrownError);
                }
            }).done(function (data) {
            }).fail(function (jqXHR, textStatus) {
            });
        }


        function getPostOffice() {
            var police_station_id = $("#police_station").val();
            $.ajax({
                url: "{{ route('post.office.name') }}",
                type: 'post',
                dataType: "json",
                cache: false,
                data: {
                    _token: CSRF_TOKEN,
                    police_station_id: police_station_id,
                },
                beforeSend: function () {
                    if (police_station_id == "" || police_station_id == 0 || police_station_id == null) {
                        toastr.warning(" Please select police station!", 'Message <i class="fa fa-bell faa-ring animated"></i>');
                        return false;
                    }
                },
                success: function (data) {
                    var len = data.length;
                    $("#post_office").empty();
                    if (len < 1) {
                        $("#post_office").append("<option value='0'>Post Office Not Found!</option>");
                    } else {
                        $("#post_office").append("<option value='0'>Select Post Office</option>");
                        for (var i = 0; i < len; i++) {
                            var id = data[i]['id'];
                            var name = data[i]['name'];
                            $("#post_office").append("<option value='" + id + "'>" + name + "</option>");
                        }
                    }

                },
                error: function (xhr, textStatus, thrownError) {
                    alert(xhr + "\n" + textStatus + "\n" + thrownError);
                }
            }).done(function (data) {
            }).fail(function (jqXHR, textStatus) {
            });
        }


        function getUnion() {
            var post_office_id = $("#post_office").val();
            $.ajax({
                url: "{{ route('union.name') }}",
                type: 'post',
                dataType: "json",
                cache: false,
                data: {
                    _token: CSRF_TOKEN,
                    post_office_id: post_office_id,
                },
                beforeSend: function () {
                    if (post_office_id == "" || post_office_id == 0 || post_office_id == null) {
                        toastr.warning(" Please select Post office!", 'Message <i class="fa fa-bell faa-ring animated"></i>');
                        return false;
                    }
                },
                success: function (data) {
                    var len = data.length;
                    $("#union").empty();
                    if (len < 1) {
                        $("#union").append("<option value='0'>Union Not Found!</option>");
                    } else {
                        $("#union").append("<option value='0'>Select Union</option>");
                        for (var i = 0; i < len; i++) {
                            var id = data[i]['id'];
                            var name = data[i]['name'];
                            $("#union").append("<option value='" + id + "'>" + name + "</option>");
                        }
                    }

                },
                error: function (xhr, textStatus, thrownError) {
                    alert(xhr + "\n" + textStatus + "\n" + thrownError);
                }
            }).done(function (data) {
            }).fail(function (jqXHR, textStatus) {
            });
        }
    </script>
@endpush
