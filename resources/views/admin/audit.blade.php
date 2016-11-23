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

                    <form action="/AuditTrail" id="form" method="get">
                        <div class="col-md-4 form-group">
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="input-group-content">
                                    <label for="Start_Date">Start Date</label>
                                    <input autocomplete="off" class="form-control" id="datepick" name="datepick"
                                           placeholder="03/Nov/2016" type="text" value=""/>
                                </div>
                                <span class="input-group-addon">to</span>

                                <div class="input-group-content">
                                    <label for="End_Date">End Date</label>
                                    <input autocomplete="off" class="form-control" id="datepick2" name="datepick2"
                                           placeholder="03/Nov/2016" type="text" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="block">&nbsp;</label>
                            <input type="submit" class="btn btn-raised ink-reaction btn-default" value="Search"/>
                        </div>
                    </form>
                    <table id="datatables-1" class="table table-striped">
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
                        @foreach(\App\AuditTrail::latest('id')->get() as $auditTrail)
                            <tr>
                                <td>{{$auditTrail->actorName}}</td>
                                <td>{{$auditTrail->userRole}}</td>
                                <td>{{\App\AuditAction::find($auditTrail->actionId)->action_name}}</td>
                                <td>{{$auditTrail->details}}</td>
                                <td>{{$auditTrail->updated_at}}</td>
                            </tr>
                        @endforeach
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
                            <img src="{{url('Content/img/FedRepNig.png')}}" class="footer-logo"/>
                            <br/>

                            <p class="col-md-12">
                                        <span>
                                             &copy; Copyright 2016 - Advisory Power Team. All rights reserved.<br>
                                            For more information please contact mdadebts@aptovp.org | 07089090000
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop