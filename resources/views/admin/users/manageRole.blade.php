@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Manage User Roles
                        <small class="pull-right">
                            <a href="{{url('Users/Index')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">
                    <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">

                    <div class="row">
                        @if (Session::has('flash_message'))
                            <div class="alert alert-callout alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif
                        <form action="{{url('Users/ManageRole')}}" method="post">
                            <input name="_token" type="hidden" value="{{csrf_token()}}"/>

                            <div class="col-md-4">
                                <div class="">
                                    <h4>{{$user->getFullNameAttribute()}} ({{$user->Email}})</h4>
                                    <hr/>


                                    <input id="id" name="id" type="hidden" value="{{$user->id}}"/>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2 class="panel-title">User Roles</h2>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <table class="table table-striped" width="50">
                                                    <tr>
                                                        <th></th>
                                                        <th>Roles</th>
                                                    </tr>
                                                    @foreach($user->userRole as $item)
                                                        <tr>
                                                            <td>

                                                                <input type="checkbox" class="box checkbox"
                                                                       name="todelete[]" value="{{$item->role->id}}"/>
                                                            </td>
                                                            <td>
                                                                {{$item->role->name}}
                                                            </td>
                                                            <td>
                                                                <a class="close"
                                                                   href="{{url('ManageRole/Delete/'.$item->id)}}">x</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-group col-md-11 ">
                                                                <select class="form-control" id="State" name="role"
                                                                        required="required">
                                                                    <option value="">Select Role</option>
                                                                    @foreach(\App\Role::all() as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                <span class="field-validation-valid text-danger"
                                                                      data-valmsg-for="Role"
                                                                      data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" value="Save"
                                                       class="btn btn-sm btn-raised ink-reaction btn-default"/>&emsp;
                                                <a class="btn btn-sm btn-raised ink-reaction btn-default"
                                                   disabled="disabled" href="#" id="delete">Delete roles</a>
                                                &emsp;<a class="btn btn-sm btn-raised ink-reaction btn-default"
                                                         href="{{url('Users/Edit/'.$user->id)}}">View User Profile</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="col-md-offset-3 col-md-4">
                            <form action="{{url('Users/AssignRegion')}}" method="post"><input
                                        name="__RequestVerificationToken" type="hidden"
                                        value="Zed11ZQ6NAlHoDHSMBWe2Nhq7NHdYhrSvUOMQrq1Fe9642godSMh6IfV7WnhQOGUY4QXHUbJQIZvhoyxE-xvml93bZYYRuiEpKwgFm6Yjx-1iHmRpvpfUr0SDk_q2DfhauhSws1lqmP0ik6FQzFGtA2"/>

                                <div class="">
                                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                    <input id="id" name="id" type="hidden" value="{{$user->id}}"/>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h2 class="panel-title">Regions</h2>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <table class="table table-striped" width="50">
                                                    <tr>
                                                        <th></th>
                                                        <th>State</th>
                                                        <th>Region</th>
                                                        <th>X</th>
                                                    </tr>


                                                    @foreach($user->userRegion as $item)
                                                        <tr>
                                                            <td>

                                                                <input type="checkbox" class="box checkbox"/>
                                                            </td>
                                                            <td>
                                                                {{\App\Region::find($item->region_id)->state->name}}
                                                            </td>
                                                            <td>
                                                                {{\App\Region::find($item->region_id)->region_name}}
                                                            </td>
                                                            <td>
                                                                <a class="close"
                                                                   href="{{url('ManageRegion/Delete/'.$item->id)}}">x</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" id="State" name="State"
                                                                        onchange="setRegion(this.value)"
                                                                        required="required">
                                                                    <option value="">Select State</option>
                                                                    @foreach(\App\State::all() as $state)
                                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="field-validation-valid text-danger"
                                                                      data-valmsg-for="State"
                                                                      data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control" disabled="True" id="Region"
                                                                        name="Region" required="required">
                                                                    <option value="">Select Region</option>
                                                                </select>
                                                                <span class="field-validation-valid text-danger"
                                                                      data-valmsg-for="Region"
                                                                      data-valmsg-replace="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <script>$(".box").removeClass("hidden");</script>
                                            <div class="form-group col-md-offset-2">
                                                <input type="submit" value="Save"
                                                       class="btn btn-sm btn-raised ink-reaction btn-default"/>&emsp;
                                                <a class="btn btn-sm btn-raised ink-reaction btn-default"
                                                   disabled="disabled"
                                                   href="/Users/RemoveUserRegion?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1&amp;regions=XXX"
                                                   id="delete">Delete regions</a>

                                            </div>
                                        </div>

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
                                             &copy; Copyright 2016 - Advisory Power Team. All rights reserved.<br>                                             For more information please contact mdadebts@aptovp.org | 07089090000
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

        function setRegion(id) {
            var selectedItem = id;
            var ddlLgas = $("#Region");
            localStorage.removeItem("region");
            getRegion(selectedItem, ddlLgas);
        }

        function getRegion(selectedItem, ddlLgas) {
            var region = localStorage.getItem('region');
            var procemessage = "<option value=''>Please wait...</option>";
            $("#Region").html(procemessage).show();
            url = $("#stateRegionUrl").val();
            $.ajax({
                cache: false,
                type: "GET",
                url: url,
                dataType: "json",
                data: {"id": selectedItem},
                beforeSend: function () {

                    $("#message").show();
                    //alert(url);
                    //ddlLgas.val("Select LGA");
                },
                success: function (data) {
                    ddlLgas.html('');
                    $("#message").hide();
                    if (data.length > 0) {

                        ddlLgas.append($('<option></option>').val(null).html("Select LGA"));
                        ddlLgas.append($('<option></option>').val("All").html("All"));
                        localStorage.setItem("data", JSON.stringify(data));
                        $.each(data, function (id, option) {
                            ddlLgas.append($('<option></option>').val(option.Value).html(option.Text));
                            ddlLgas.val(region);
                        });
                        $("#Region").removeAttr("disabled");

                    } else {
                        ddlLgas.append($('<option></option>').val('-1').html("N/A"));
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //alert('Failed to retrieve Local Governments. ' + thrownError );
                }
            });
        }
        ;
    </script>

@stop