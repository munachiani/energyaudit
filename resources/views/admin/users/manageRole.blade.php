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
                        <form action="/Users/ManageRole?userid=8d1b5d88-aaa6-438a-b5d7-3112e2385bc1" method="post"><input name="__RequestVerificationToken" type="hidden" value="rYK9zXufaMmsC_qEGgFUUatjumz21pS5s4WRObYHQvZ3b3pf480bffyvkuxKC76B07DXnBEdI69hjHybzkZwaQJxvgUVnXxUxrjhFMvB35fwxtSw_k_YDaBrj1Q0TLw2E8J9u8L-VxHL0G4ZI8raVg2" />                <div class="col-md-4">
                                <div class="">
                                    <h4>Kayode Yode Kay (korttech@gmail.com)</h4>
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

                                                    <tr>
                                                        <td>

                                                            <input type="checkbox" class="box checkbox" name="todelete" value="Field Agent" />
                                                        </td>
                                                        <td>
                                                            Field Agent
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="form-group col-md-11 ">
                                                                <select class="form-control" id="State" name="Role" required="required"><option value="">Select Role</option>
                                                                    <option value="Disco">Disco</option>
                                                                    <option value="Field Agent">Field Agent</option>
                                                                    <option value="General Supervisor">General Supervisor</option>
                                                                    <option value="Regional Admin">Regional Admin</option>
                                                                    <option value="Regional Supervisor">Regional Supervisor</option>
                                                                    <option value="Super Admin">Super Admin</option>
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
                                                &emsp;<a class="btn btn-sm btn-raised ink-reaction btn-default" href="/Users/Edit/8d1b5d88-aaa6-438a-b5d7-3112e2385bc1">View User Profile</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>            <div class="col-md-4">

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