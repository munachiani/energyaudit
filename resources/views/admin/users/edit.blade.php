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
                        <?php
                        $url = 'userimages/';
                        $picDefault = 'default.png';
                            $userImage = empty($user->ImageInfo)?$picDefault:$user->ImageInfo;
                        ?>


                        <img id="avatar" src="{{url($url.$userImage)}}" height="15%" width="15%" />


                        <h4>{{$user->getFullNameAttribute()}} ({{$user->isActive()?'Active':'Deactivated'}})</h4>

                        <hr />
                        <div class="row">
                            @if (Session::has('flash_message'))
                                <div class="alert alert-callout alert-success">
                                    {{ session('flash_message') }}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <form action={{url('Users/ChangeAvatar')}} method="post" enctype="multipart/form-data" id="pixform">
                                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                    <input id="id" name="id" type="hidden" value="{{$user->id}}" />
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <label for="file">Upload Image: (200 by 200, max. file size: 100KB, must be .jpg, .jpeg or .png)</label>
                                            <div id="msg" class="alert alert-danger hidden">Picture size is greater than 100kb. Please select another picture</div>
                                            <input type="file" name="ImageInfo"  class="form-control" required />
                                        </div>
                                        @if ($errors->has('ImageInfo')) <span class="help-block" style="color:red">{{ $errors->first('ImageInfo') }}</span> @endif

                                    </div>



                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 form-group">
                                            <input type="submit" onclick="$('#logloader').css('display','')" value="Change Avatar" class="submit btn btn-raised ink-reaction btn-default" id="upload" />
                                            <img id="logloader"  style="display: none;" src="{{url('userimages/loader.gif')}}" alt="Loading..."  />
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <hr />


                    <div class="row">
                        @if (Session::has('flashMessage'))
                            <div class="alert alert-callout alert-success">
                                {{ session('flashMessage') }}
                            </div>
                        @endif
                        <form action='{{url('Users/Profile/Edit/'.$user->id)}}'  method="post" role="form">
                            <div class="col-md-7">
                                <div class="">
                                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>



                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="LastName" required="">Last Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="Last Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The Last Name field is required." id="LastName" name="LastName" required="required" type="text" value="{{$user->LastName}}" />
                                            @if ($errors->has('LastName')) <span class="field-validation-valid text-danger" style="color:red" data-valmsg-for="LastName" data-valmsg-replace="true">{{ $errors->first('LastName') }}</span> @endif

                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="FirstName">First Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="First Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" data-val-required="The First Name field is required." id="FirstName" name="FirstName" required="required" type="text" value="{{$user->FirstName}}" />
                                            @if ($errors->has('FirstName'))  <span class="field-validation-valid text-danger" data-valmsg-for="FirstName" data-valmsg-replace="true">{{ $errors->first('FirstName') }}</span>@endif


                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="MiddleName">Middle Name</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-regex="Middle Name should contain only alphabets." data-val-regex-pattern="^[a-zA-Z]+$" id="MiddleName" name="MiddleName" required="required" type="text" value="{{$user->MiddleName}}" />
                                            @if ($errors->has('MiddleName')) <span class="field-validation-valid text-danger" data-valmsg-for="MiddleName" data-valmsg-replace="true">{{ $errors->first('MiddleName') }}</span> @endif

                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="Email">Email</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" id="Email" name="Email" readonly="" required="required" type="email" value="{{$user->Email}}" />

                                            @if ($errors->has('Email')) <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true">{{ $errors->first('Email') }}</span>@endif

                                        </div>
                                    </div>



                                    <div class="form-group col-md-12">
                                        <label class="control-label col-md-2" for="Address">Address</label>
                                        <div class="col-md-10">
                                <textarea class="form-control" cols="20" id="Address" name="Address" rows="2">{{$user->Address}}
</textarea>
                                            @if ($errors->has('Address')) <span class="field-validation-valid text-danger" data-valmsg-for="Address" data-valmsg-replace="true">{{ $errors->first('Address') }}</span>@endif

                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="PhoneNumber">Phone Number</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" data-val="true" data-val-length="Phone number is less than 11 characters" data-val-length-max="20" data-val-length-min="11" data-val-regex="Invalid Phone Number." data-val-regex-pattern="^\s*\+?\s*([0-9][\s-]*){2,}$" data-val-required="The Phone Number field is required." id="PhoneNumber" name="PhoneNumber" required="required" type="text" value="{{$user->PhoneNumber}}" />
                                            @if ($errors->has('PhoneNumber'))  <span class="field-validation-valid text-danger" data-valmsg-for="PhoneNumber" data-valmsg-replace="true">{{ $errors->first('PhoneNumber') }}</span> @endif


                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="UserRoles">Role</label>
                                            <span class="require">*</span>
                                        </div>
                                        <?php
                                        foreach($user->userRole as $item){
                                            $userRoles[]= $item->role->name;
                                            $userRoleIDs[]= $item->role->id;
                                            }

                                            $userRoles = implode(',',$userRoles);
                                            ?>
                                        <div class="col-md-10">
                                            <input class="form-control text-box single-line" id="UserRoles" name="UserRoles" readonly="" required="required" type="text" value="{{$userRoles}}" />
                                            <span class="field-validation-valid text-danger" data-valmsg-for="UserRoles" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="col-md-offset-2 col-md-10">
                                            <a class="btn btn-raised btn-sm ink-reaction btn-default" href="{{url('Users/ManageRole/'.$user->id)}}">Manage User Roles</a>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 required">
                                        <div class="col-md-2">
                                            <label class="control-label" for="Gender">Gender</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-10 required">
                                            <input class="form-control text-box single-line" id="UserRoles" name="Gender" readonly="" required="required" type="text" value="{{$user->Gender}}" />

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
                        </form>
                        @if($userRoleIDs == \App\Role::$FIELD_AGENT || $userRoleIDs ==\App\Role::$REGIONAL_ADMIN || $userRoleIDs == \App\Role::$REGIONAL_SUPERVISOR)
                        <div class="col-md-offset-1 col-md-4">
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
                            @endif
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