@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">





            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Manage User Roles
                        <small class="pull-right">
                            <a href="/Users/Index">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">
                    <div class="row">



                        <form action="/Users/ManageRole?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" method="post"><input name="__RequestVerificationToken" type="hidden" value="rYK9zXufaMmsC_qEGgFUUatjumz21pS5s4WRObYHQvZ3b3pf480bffyvkuxKC76B07DXnBEdI69hjHybzkZwaQJxvgUVnXxUxrjhFMvB35fwxtSw_k_YDaBrj1Q0TLw2E8J9u8L-VxHL0G4ZI8raVg2" />
                            <div class="col-md-4">
                                <div class="">
                                    <h4>{{$user->getFullNameAttribute()}} ({{$user->Email}})</h4>
                                    <hr />


                                    <input id="Id" name="Id" type="hidden" value="8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" />
                                    <input id="FirstName" name="FirstName" type="hidden" value="Yode" />
                                    <input id="MiddleName" name="MiddleName" type="hidden" value="Kay" />
                                    <input id="LastName" name="LastName" type="hidden" value="Kayode" />
                                    <input id="Email" name="Email" type="hidden" value="korttech@gmail.com" />
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2 class="panel-title">User Roles</h2>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <table class="table table-striped" width="50">
                                                    <tr><th></th><th>Roles</th></tr>
                                                    @foreach($user->userRole as $item)
                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox" name="todelete[]" value="{{$item->role->id}}" />
                                                        </td>
                                                        <td>
                                                           {{$item->role->name}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-group col-md-11 ">
                                                                <select class="form-control" id="State" name="Role" required="required"><option value="">Select Role</option>
                                                                    @foreach(\App\Role::all() as $item)
                                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                <span class="field-validation-valid text-danger" data-valmsg-for="Role" data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>



                                            <div class="form-group">
                                                <input type="submit" value="Save" class="btn btn-sm btn-raised ink-reaction btn-default" />&emsp;
                                                <a class="btn btn-sm btn-raised ink-reaction btn-default" disabled="disabled" href="/Users/RemoveUserRole?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1&amp;roles=XXX" id="delete">Delete roles</a>
                                                &emsp;<a class="btn btn-sm btn-raised ink-reaction btn-default" href="{{url('Users/Edit/'.$user->id)}}">View User Profile</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="col-md-offset-3 col-md-4">
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
@section('footerScript')

    <script>
        $(".box").change(function () {
            if (this.checked) {
                $("#delete").removeAttr("disabled")
            }
            else {
                $("#delete").attr("disabled", true)
            }
        });

        $("#delete").click(function () {
            var regions = document.getElementsByClassName("box")
            var values = new Array();
            for (var i = 0; i < regions.length; i++) {
                if (regions[i].checked) {
                    values.push(regions[i].value)
                }
            }
            this.href = this.href.replace("XXX", values);
        });
    </script>

@stop