@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">





            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Profile
                        <small class="pull-right">
                            <a href="{{url('Users/Index')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                            </a>
                        </small>

                    </header>
                </div>
                <div class="card-body">
                    <div class="row">

                        <img id="avatar" src="{{url('userimages/default.png')}}" height="15%" width="15%" />


                        <h4>Kayode Yode Kay (Inactive)</h4>

                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/Users/ChangeAvatar" , method="post" enctype="multipart/form-data" id="pixform">
                                    <input id="Id" name="Id" type="hidden" value="ca0bc69c-6df6-43ea-b2f5-b4ae3b01855b" />
                                    <input id="ImageInfo" name="ImageInfo" type="hidden" value="" />
                                    <input name="__RequestVerificationToken" type="hidden" value="1E16-rOFcZ2rAJeEmtr7CsRpllJjGISsd59FKjVZhW874EMFyDNAUlUOKvqfzhTg46_ViAdnTdGe4Qr188Mxwy57Rd4qr1kH2ft8hl61vehB8qqeFK7SjnQhoA_Zjwb4vk6DB2Drhl4YSwQnUkIWSQ2" />
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label for="file">Upload Image: (200 by 200, max. file size: 100KB, must be .jpg, .jpeg or .png)</label>
                                            <div id="msg" class="alert alert-danger hidden">Picture size is greater than 100kb. Please select another picture</div>
                                            <input type="file" name="file" accept=".jpg, .jpeg, .png" id="file" class="form-control" required />
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <input type="submit" value="Change Avatar" class="submit btn btn-raised ink-reaction btn-default" id="upload" />
                                            <img id="loading-image" src="/Content/img/default.gif" alt="Loading..." hidden />
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <hr />


                    <div class="row">
                        <form action="/Users/Edit/8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="9-QZiP8FaaVawvf7JqY7gAlkXcJ1zh5UcwSSfzux17pKFAjEye6IcOIundXSq9mS7nez2FVTvJYG1dscdtgmOze1k28z67j3QC2MpDq8OTPtVLiwCf5Z21ZLDE4B5o7BBZRHocnbk8rzkxNA4zcw4g2" />                <div class="col-md-7">
                                <div class="">

                                    <input id="ImageInfo" name="ImageInfo" type="hidden" value="default.png" />

                                    <input id="Id" name="Id" type="hidden" value="8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" />

                                    <input data-val="true" data-val-regex="Enter a valid Email Address" data-val-regex-pattern="^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" data-val-required="The Email field is required." id="Email" name="Email" type="hidden" value="korttech@gmail.com" />

                                    <input data-val="true" data-val-required="The Status field is required." id="status" name="status" type="hidden" value="False" />

                                    <input id="UserRoles" name="UserRoles" type="hidden" value="Field Agent" />

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="LastName" required="">Last Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="Last Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The Last Name field is required." id="LastName" name="LastName" required="required" type="text" value="Kayode" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="LastName" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="FirstName">First Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="First Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The First Name field is required." id="FirstName" name="FirstName" required="required" type="text" value="Yode" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="MiddleName">Middle Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="Middle Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" id="MiddleName" name="MiddleName" required="required" type="text" value="Kay" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="MiddleName" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="Email">Email</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" id="Email" name="Email" readonly="" required="required" type="email" value="korttech@gmail.com" />

                                            <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-2" for="Address">Address</label>
                                        <div class="col-md-10">
                                <textarea class="form-control" cols="20" id="Address" name="Address" rows="2">
</textarea>
                                            <span class="field-validation-valid text-danger" data-valmsg-for="Address" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="PhoneNumber">Phone Number</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-length="Phone number is less than 11 characters" data-val-length-max="20" data-val-length-min="11" data-val-regex="Invalid Phone Number." data-val-regex-pattern="^\s*\+?\s*([0-9][\s-]*){2,}$" data-val-required="The Phone Number field is required." id="PhoneNumber" name="PhoneNumber" required="required" type="text" value="09090909090" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNumber" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="UserRoles">Role</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" id="UserRoles" name="UserRoles" readonly="" required="required" type="text" value="Field Agent" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="UserRoles" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-md-offset-2 col-md-10">
                                            <a class="btn btn-raised btn-sm ink-reaction btn-default" href="/Users/ManageRole?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1">Manage User Roles</a>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="Gender">Gender</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10 required">
                                            <select class="form-control" data-val="true" data-val-required="The Gender field is required." id="gender" name="Gender" required="required" selected="Male"><option value="">Select</option>
                                                <option selected="selected" value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <span class="field-validation-valid text-danger" data-valmsg-for="Gender" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input type="submit" value="Save" class="btn btn-raised btn-sm ink-reaction btn-default" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>                            <div class="col-md-offset-1 col-md-4">
                            <form action="/Users/AssignRegion" method="post"><input name="__RequestVerificationToken" type="hidden" value="Zed11ZQ6NAlHoDHSMBWe2Nhq7NHdYhrSvUOMQrq1Fe9642godSMh6IfV7WnhQOGUY4QXHUbJQIZvhoyxE-xvml93bZYYRuiEpKwgFm6Yjx-1iHmRpvpfUr0SDk_q2DfhauhSws1lqmP0ik6FQzFGtA2" />                        <div class="">
                                    <input id="Id" name="Id" type="hidden" value="8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" />
                                    <input data-val="true" data-val-regex="First Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The First Name field is required." id="FirstName" name="FirstName" type="hidden" value="Yode" />
                                    <input data-val="true" data-val-regex="Middle Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" id="MiddleName" name="MiddleName" type="hidden" value="Kay" />
                                    <input data-val="true" data-val-regex="Last Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The Last Name field is required." id="LastName" name="LastName" type="hidden" value="Kayode" />
                                    <input data-val="true" data-val-regex="Enter a valid Email Address" data-val-regex-pattern="^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" data-val-required="The Email field is required." id="Email" name="Email" type="hidden" value="korttech@gmail.com" />
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2 class="panel-title">Regions</h2>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <table class="table table-striped" width="50">
                                                    <tr><th></th><th>State</th> <th>Region</th> </tr>

                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox hidden" name="todelete" value="516" />
                                                        </td>
                                                        <td>
                                                            Lagos
                                                        </td>
                                                        <td>
                                                            Ikeja
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox hidden" name="todelete" value="519" />
                                                        </td>
                                                        <td>
                                                            Lagos
                                                        </td>
                                                        <td>
                                                            Lagos-Island
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox hidden" name="todelete" value="520" />
                                                        </td>
                                                        <td>
                                                            Lagos
                                                        </td>
                                                        <td>
                                                            Lagos-Mainland
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox hidden" name="todelete" value="525" />
                                                        </td>
                                                        <td>
                                                            Lagos
                                                        </td>
                                                        <td>
                                                            Surulere
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" id="State" name="State" required="required"><option value="">Select State</option>
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
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" disabled="True" id="Region" name="Region" required="required"><option value="">Select Region</option>
                                                                </select>
                                                                <span class="field-validation-valid text-danger" data-valmsg-for="Region" data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>                                        </table>
                                            </div>
                                            <script>$(".box").removeClass("hidden");</script>
                                            <div class="form-group col-md-offset-2">
                                                <input type="submit" value="Save" class="btn btn-sm btn-raised ink-reaction btn-default" />&emsp;
                                                <a class="btn btn-sm btn-raised ink-reaction btn-default" disabled="disabled" href="/Users/RemoveUserRegion?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1&amp;regions=XXX" id="delete">Delete regions</a>

                                            </div>                                </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var alertBox = $('.alert').text().trim();
                console.log(alertBox);
                if (alertBox === '') {
                    $('.alert').hide()
                } else {
                    $('.alert').show();
                }
            </script>


        </div><!--end .section-body -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="{{url('Content/img/FedRepNig.png')}}" class="footer-logo" />
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