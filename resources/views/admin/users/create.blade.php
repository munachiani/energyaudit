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
                                    <a href="/Users/Index">
                                        <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                                    </a>
                                </small>
                            </header>
                        </div>
                        <div class="card-body">
                            <form action="/Users/Create" class="" method="post" role="form">                        <div class="row">
                                    <div class="col-md-12">

                                        <input name="__RequestVerificationToken" type="hidden" value="szSv6QGVzSOnjtngTICqFgrTCQDYUWazBb2i8qbcFv_mQRPMZqEGpu9eOsegybIxsnx9p6nZ6E6MxD1kOF-P_xaCYjS1dhY4PXRpeaWErZ27Abgh_MLFUkLLfiwrmVdgoB8tIDo2IBOHFFpzI00bAQ2" />
                                        <div>



                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="LastName">Last Name</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true" data-val-regex="Last Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The Last Name field is required." id="LastName" name="LastName" required="" type="text" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="FirstName">First Name</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true" data-val-regex="First Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The First Name field is required." id="FirstName" name="FirstName" required="" type="text" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="MiddleName">Middle Name</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true" data-val-regex="Middle Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" id="MiddleName" name="MiddleName" required="" type="text" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="MiddleName" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="Gender">Gender</label>
                                                    <span class="require">*</span>
                                                    <select class="form-control" data-val="true" data-val-required="The Gender field is required." id="Gender" name="Gender" required="required"><option value="">&lt;--Select--&gt;</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Gender" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="PhoneNumber">Phone Number</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true" data-val-length="Phone number is less than 11 characters" data-val-length-max="20" data-val-length-min="11" data-val-regex="Invalid Phone Number." data-val-regex-pattern="^\s*\+?\s*([0-9][\s-]*){11,14}$" data-val-required="The Phone Number field is required." id="PhoneNumber" name="PhoneNumber" required="" type="text" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNumber" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="Email">Email</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line" data-val="true" data-val-regex="Enter a valid Email Address" data-val-regex-pattern="^([\w-\._]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" data-val-required="The Email field is required." id="Email" name="Email" required="" type="email" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 form-group">
                                                    <label for="Address">Address</label>
                                            <textarea class="form-control" cols="20" id="Address" name="Address" rows="2">
</textarea>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Address" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="UserRole">User Role</label>
                                                    <span class="require">*</span>
                                                    <select class="form-control" data-val="true" data-val-required="The User Role field is required." id="role" name="UserRole" required="required"><option value="">Select</option>
                                                        <option value="Disco">Disco</option>
                                                        <option value="Field Agent">Field Agent</option>
                                                        <option value="General Supervisor">General Supervisor</option>
                                                        <option value="Regional Admin">Regional Admin</option>
                                                        <option value="Regional Supervisor">Regional Supervisor</option>
                                                        <option value="Super Admin">Super Admin</option>
                                                    </select>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="UserRole" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label for="Password">Password</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line password" data-val="true" data-val-regex="Password must contain at least 8 characters, a lower case alphabet, an uppercase alphabet and a number" data-val-regex-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,14}$" data-val-required="Please enter a password" id="Password" maxlength="14" name="Password" required="" type="password" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="ConfirmPassword">Confirm Password</label>
                                                    <span class="require">*</span>
                                                    <input class="form-control text-box single-line password" data-val="true" data-val-regex="Password must contain at least 8 characters, a lower case alphabet, an uppercase alphabet and a number" data-val-regex-pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,14}$" data-val-required="Please confirm password" id="ConfirmPassword" maxlength="14" name="ConfirmPassword" required="" type="password" value="" />
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <input htmlAttributes="{ class = form-control }" id="Id" name="Id" type="hidden" value="" />
                                            <input htmlAttributes="{ class = form-control }" id="Email" name="Email" type="hidden" value="" />
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row" id="reg" hidden>
                                    <h3 class="col-md-10">Assign Region to User</h3>
                                    <div class="form-group col-md-4">
                                        <label>State</label>
                                        <span class="require">*</span>
                                        <select class="form-control" id="State" name="State"><option value="">Select State</option>
                                            <option value="1">Abia</option>
                                            <option value="2">Adamawa</option>
                                            <option value="3">Akwa-Ibom</option>
                                            <option value="4">Anambra</option>
                                            <option value="5">Bauchi</option>
                                            <option value="6">Bayelsa</option>
                                            <option value="7">Benue</option>
                                            <option value="8">Borno</option>
                                            <option value="9">Cross River</option>
                                            <option value="10">Delta</option>
                                            <option value="11">Ebonyi</option>
                                            <option value="12">Edo</option>
                                            <option value="13">Ekiti</option>
                                            <option value="14">Enugu</option>
                                            <option value="15">FCT</option>
                                            <option value="16">Gombe</option>
                                            <option value="17">IMO</option>
                                            <option value="18">Jigawa</option>
                                            <option value="19">Kaduna</option>
                                            <option value="20">Kano</option>
                                            <option value="21">Katsina</option>
                                            <option value="22">Kebbi</option>
                                            <option value="23">Kogi</option>
                                            <option value="24">Kwara</option>
                                            <option value="25">Lagos</option>
                                            <option value="26">Nasarawa</option>
                                            <option value="27">Niger</option>
                                            <option value="28">Ogun</option>
                                            <option value="29">Ondo</option>
                                            <option value="30">Osun</option>
                                            <option value="31">Oyo</option>
                                            <option value="32">Plateau</option>
                                            <option value="33">Rivers</option>
                                            <option value="34">Sokoto</option>
                                            <option value="35">Taraba</option>
                                            <option value="36">Yobe</option>
                                            <option value="37">Zamfara</option>
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="State" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Region</label>
                                        <span class="require">*</span>
                                        <select class="form-control" disabled="True" id="Region" name="Region"><option value="">Select Region</option>
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Region" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row" id="disc" hidden>
                                    <h3 class="col-md-10">Assign User to distribution company</h3>
                                    <div class="form-group col-md-4">
                                        <label>Disco</label>
                                        <span class="require">*</span>
                                        <select class="form-control" id="disco" name="disco"><option value="">Select Disco</option>
                                            <option value="9">Abuja Distribution</option>
                                            <option value="11">Benin Distribution</option>
                                            <option value="3">Eko Distribution</option>
                                            <option value="4">Enugu Distribution</option>
                                            <option value="2">Ibadan Distribution</option>
                                            <option value="1">Ikeja Distribution</option>
                                            <option value="10">Jos Distribution</option>
                                            <option value="7">Kaduna Distribution</option>
                                            <option value="6">Kano Distribution</option>
                                            <option value="5">Port Harcourt Distribution</option>
                                            <option value="8">Yola Distribution</option>
                                        </select>
                                        <span class="field-validation-valid text-danger" data-valmsg-for="disco" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input type="submit" class="btn btn-sm btn-raised ink-reaction btn-default" value="Register" id="bttn"/>
                                    </div>
                                </div>
                            </form>            </div>
                    </div>
                </div>
            </div>



        </div><!--end .section-body -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="/Content/img/FedRepNig.png" class="footer-logo" />
                            <br/>
                            <p class="col-md-12">
                                        <span>
                                            &copy; Copyright 2016 - Advisory Power Team. All rights reserved.
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
                    url: "/Users/GetRegionbyStateId",
                    dataType: "json",
                    data: { "id": selectedItem },
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
                        alert('Failed to retrieve Local Governments.');
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
            else if (role != "General Supervisor" && role != "Super Admin" && role != "") {
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