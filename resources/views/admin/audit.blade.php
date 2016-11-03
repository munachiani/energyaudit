@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">



            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Audit Trail
                        <small class="pull-right">
                            <a href="{{url('dashboard')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Dashboard
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">

                    <form action="/AuditTrail" id="form" method="get">            <div class="col-md-4 form-group">
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="input-group-content">
                                    <label for="Start_Date">Start Date</label>
                                    <input autocomplete="off" class="form-control" id="datepick" name="datepick" placeholder="03/Nov/2016" type="text" value="" />
                                </div>
                                <span class="input-group-addon">to</span>
                                <div class="input-group-content">
                                    <label for="End_Date">End Date</label>
                                    <input autocomplete="off" class="form-control" id="datepick2" name="datepick2" placeholder="03/Nov/2016" type="text" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="block">&nbsp;</label>
                            <input type="submit" class="btn btn-raised ink-reaction btn-default" value="Search" />
                        </div>
                    </form>        <table id="datatables-1" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>Last Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Login</td>
                            <td>Logged in</td>
                            <td>03/Nov/2016 02:48:56 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Logout</td>
                            <td>Logged out</td>
                            <td>03/Nov/2016 02:51:53 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Login</td>
                            <td>Logged in</td>
                            <td>03/Nov/2016 07:56:02 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Login</td>
                            <td>Logged in</td>
                            <td>03/Nov/2016 10:27:44 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Logout</td>
                            <td>Logged out</td>
                            <td>03/Nov/2016 10:44:15 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Login</td>
                            <td>Logged in</td>
                            <td>03/Nov/2016 11:03:06 AM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Login</td>
                            <td>Logged in</td>
                            <td>03/Nov/2016 12:06:08 PM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Activate User</td>
                            <td>Activated user taiwofasae@mailinator.com</td>
                            <td>03/Nov/2016 01:09:00 PM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Deactivate</td>
                            <td>Deactivated user taiwofasae@mailinator.com</td>
                            <td>03/Nov/2016 01:09:40 PM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Activate User</td>
                            <td>Activated user taiwofasae@mailinator.com</td>
                            <td>03/Nov/2016 01:10:14 PM</td>
                        </tr>
                        <tr>
                            <td>Jekoyemi Victor</td>
                            <td>Super Admin</td>
                            <td>Deactivate</td>
                            <td>Deactivated user taiwofasae@mailinator.com</td>
                            <td>03/Nov/2016 01:10:25 PM</td>
                        </tr>

                        </tbody>
                    </table>
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