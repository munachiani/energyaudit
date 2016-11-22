@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">


            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-head card-head-sm style-custom">
                            <header>
                                Create User
                                <small class="pull-right">
                                    <a href="{{url('Users/Index')}}">
                                        <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                                    </a>
                                </small>
                            </header>
                        </div>
                        <div class="card-body">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-callout alert-success">
                                    {{ session('flash_message') }}
                                </div>
                            @endif


                            <form action="{{url('auth/createUser')}}" class="" method="post" role="form">
                                <div class="row">
                                    <div class="col-md-12">

                                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                                        <div>


                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="LastName">Last Name</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true"
                                                           data-val-regex="Last Name should contain only alphabets."
                                                           data-val-regex-pattern="^[a-zA-Z]+$"
                                                           data-val-required="The Last Name field is required."
                                                           id="LastName" name="LastName" type="text"
                                                           value="{{old('LastName')}}" required/>
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="LastName" data-valmsg-replace="true">

                                                    </span>
                                                    @if ($errors->has('LastName')) <span class="help-block"
                                                                                         style="color:red">{{ $errors->first('LastName') }}</span> @endif


                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="FirstName">First Name</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true"
                                                           data-val-regex="First Name should contain only alphabets."
                                                           data-val-regex-pattern="^[a-zA-Z]+$"
                                                           data-val-required="The First Name field is required."
                                                           id="FirstName" name="FirstName" type="text"
                                                           value="{{old('FirstName')}}" required/>
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="FirstName" data-valmsg-replace="true">


                                                    </span>
                                                    @if ($errors->has('FirstName'))
                                                        <span class="help-block"
                                                              style="color:red">{{ $errors->first('FirstName') }}</span> @endif

                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="MiddleName">Middle Name</label>

                                                    <input class="form-control text-box single-line" data-val="true"
                                                           data-val-regex="Middle Name should contain only alphabets."
                                                           data-val-regex-pattern="^[a-zA-Z]+$" id="MiddleName"
                                                           name="MiddleName" type="text" value="{{old('MiddleName')}}"
                                                           />
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="MiddleName"
                                                          data-valmsg-replace="true">

                                                    </span>
                                                    @if ($errors->has('MiddleName'))
                                                        <span class="help-block"
                                                              style="color:red">{{ $errors->first('MiddleName') }}</span> @endif

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="Gender">Gender</label>
                                                    <span class="require">*</span>
                                                    <select class="form-control" data-val="true"
                                                            data-val-required="The Gender field is required."
                                                            id="Gender" name="Gender" required>
                                                        <option value="" required>&lt;--Select--&gt;</option>
                                                        <option value="Male" {{old('Gender')=="Male"?'selected':''}}>
                                                            Male
                                                        </option>
                                                        <option value="Female" {{old('Gender')=="Female"?'selected':''}}>
                                                            Female
                                                        </option>
                                                    </select>
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="Gender" data-valmsg-replace="true">

                                                    </span>
                                                    @if ($errors->has('Gender'))
                                                        <span class="help-block"
                                                              style="color:red">{{ $errors->first('Gender') }}</span> @endif


                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="PhoneNumber">Phone Number</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true"
                                                           data-val-length="Phone number is less than 11 characters"
                                                           data-val-length-max="20" data-val-length-min="11"
                                                           data-val-regex="Invalid Phone Number."
                                                           data-val-regex-pattern="^\s*\+?\s*([0-9][\s-]*){11,14}$"
                                                           data-val-required="The Phone Number field is required."
                                                           id="PhoneNumber" name="PhoneNumber" type="number"
                                                           value="{{old('PhoneNumber')}}" required/>
                                                    @if ($errors->has('PhoneNumber'))

                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="PhoneNumber"
                                                          data-valmsg-replace="true">
                                               {{ $errors->first('PhoneNumber') }}

                                                    </span>
                                                    @endif
                                                        <span class="help-block"
                                                              style="color:red"></span>

                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="Email">Email</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true"
                                                           data-val-regex="Enter a valid Email Address"
                                                           data-val-regex-pattern="^([\w-\._]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                                           data-val-required="The Email field is required." id="Email"
                                                           name="Email" type="email" value="{{old('Email')}}" required/>
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="Email" data-valmsg-replace="true">


                                                    </span>
                                                    @if ($errors->has('Email'))
                                                        <span class="help-block"
                                                              style="color:red">{{ $errors->first('Email') }}</span> @endif

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 form-group">
                                                    <label for="Address">Address</label>

                                            <textarea class="form-control" cols="20" id="Address" name="Address"
                                                      rows="2" >{{OLD('Address')}}
</textarea>
                                                    <span class="field-validation-valid text-danger"
                                                          data-valmsg-for="Address" data-valmsg-replace="true">


                                                    </span>
                                                    @if ($errors->has('Address'))
                                                        <span class="help-block"
                                                              style="color:red">{{ $errors->first('Address') }}</span> @endif

                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="UserRole">User Role</label>
                                                    <span class="require">*</span>
                                                    <select class="form-control" data-val="true"
                                                            data-val-required="The User Role field is required."
                                                            id="role" name="UserRole" required>
                                                        <option value="{{old('UserRole')}}">Select</option>
                                                        @foreach(\App\Role::all() as $role)
                                                            <option value="{{$role->name}}"
                                                                    {{$role->name==old('UserRole')?'selected':''}}  required>{{$role->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <div class="col-md-4">
                                                        <span class="field-validation-valid text-danger"
                                                              data-valmsg-for="UserRole" data-valmsg-replace="true">
                                                    </span>
                                                    </div>


                                                </div>
                                                @if ($errors->has('UserRole'))
                                                    <span class="help-block"
                                                          style="color:red">{{ $errors->first('UserRole') }}</span>
                                                @endif

                                            </div>


                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="Password">Password</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line password"
                                                           data-val="true"
                                                           data-val-regex="Password must contain at least 8 characters, a lower case alphabet, an uppercase alphabet and a number"
                                                           data-val-regex-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,14}$"
                                                           data-val-required="Please enter a password" id="Password"
                                                           maxlength="14" name="password" type="password"
                                                           value="{{old('')}}" required/>
                                                    @if ($errors->has('password'))
                                                        <span class="field-validation-valid text-danger"
                                                              data-valmsg-for="Password" data-valmsg-replace="true">
                                                      {{ $errors->first('password') }}
                                                    </span>
                                                    @endif


                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="ConfirmPassword">Confirm Password</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line password"
                                                           data-val="true"
                                                           data-val-regex="Password must contain at least 8 characters, a lower case alphabet, an uppercase alphabet and a number"
                                                           data-val-regex-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,14}$"
                                                           data-val-required="Please confirm password"
                                                           id="ConfirmPassword" maxlength="14" name="confirmPassword"
                                                           type="password" value="{{old('')}}" required/>

                                                    @if ($errors->has('confirmPassword'))
                                                        <span class="field-validation-valid text-danger"
                                                              data-valmsg-for="ConfirmPassword" data-valmsg-replace="true">
                                                      {{ $errors->first('confirmPassword') }}
                                                    </span>
                                                    @endif

                                                      </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row" id="reg" hidden>
                                    <h3 class="col-md-10">Assign Region to User</h3>

                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <span class="require">*</span>
                                        <select class="form-control" id="State" name="State">
                                            <option value="{{old('')}}" required>Select State</option>

                                            @foreach(\App\State::all() as $state)
                                                <option value="{{$state->id}}" required>{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="State"
                                              data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Region</label>
                                        <span class="require">*</span>
                                        <select class="form-control" disabled="True" id="Region" name="Region">
                                            <option value="{{old('')}}" required>Select Region</option>
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Region"
                                              data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row" id="disc" hidden>
                                    <h3 class="col-md-10">Assign User to distribution company</h3>

                                    <div class="form-group col-md-4">
                                        <label>Disco</label>
                                        <span class="require">*</span>
                                        <select class="form-control" id="disco" name="disco_id">
                                            <option value="{{old('')}}" required>Select Disco</option>
                                            @foreach(\App\DistributionCompany::orderby('disco_name')->get() as $disco)
                                                <option value="{{$disco->id}}" required>{{$disco->disco_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="disco"
                                              data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input type="submit" class="btn btn-sm btn-raised ink-reaction btn-default"
                                               value="Register" id="btn"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--end .section-body -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="{{url('Content/img/FedRepNig.png')}}" class="footer-logo"/>
                            <br/>

                            <p class="col-md-12">
                                        <span>
                                            &copy; Copyright {{date('Y')}} - Advisory Power Team. All rights reserved.
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('footerScript')
    <script>
        $(function () {
            $("#State").change(function () {
                var selectedItem = $(this).val();
                var ddlLgas = $("#Region");
                $.ajax({
                    cache: false,
                    type: "GET",
                    url: "{{url('Users/GetRegionByStateId')}}",
                    dataType: "json",
                    data: {"id": selectedItem},
                    success: function (data) {
                        ddlLgas.html('');
                        if (data.length > 0) {
                            ddlLgas.append($('<option></option>').val(null).html("----"));
                            $.each(data, function (id, option) {
                                ddlLgas.append($('<option></option>').val(option.Value).html(option.Text));
                            });
                            $("#Region").removeAttr("disabled");
                        } else {
                            ddlLgas.append($('<option></option>').val('-1').html("N/A"));
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert('Failed to retrieve Local Governments. ' + thrownError);
                    }
                });
            });
        });

        $(document).ready(function () {
            if ($("#role").val()) {
                rolechange($("#role").val())
            }
            $("#role").change(function () {
                var role = $(this).val();
                rolechange(role);
            });
        });

        function rolechange(role) {
            if (role == "Disco") {
                $("#disc").removeAttr("hidden");
                $("#disco").attr("required", true);
                $("#reg").attr("hidden", true);
                $("#State").removeProp("required");
                $("#Region").val('');
                $("#Region").removeProp("required");
            }
            else if (role != "General Supervisor" && role != "Super Admin" && role != "Admin" && role != "General User" && role !="") {
                $("#reg").removeAttr("hidden");
                $("#State").attr("required", true);
                $("#Region").attr("required", true);
                $("#disco").removeProp("required");
                $("#disc").attr("hidden", true);
            }
            else {
                $("#reg").attr("hidden", true);
                $("#disc").attr("hidden", true);
                $("#disco").removeProp("required");
                $("#State").removeProp("required");
                $("#Region").val('');
                $("#Region").removeProp("required");
            }
        }
    </script>

@stop