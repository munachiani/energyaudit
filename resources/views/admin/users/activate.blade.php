@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">



            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Activate
                        <small class="pull-right">
                            <a href="{{url('Users/Index')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Users
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h4>
                            {{$user->getFullNameAttribute()}} has been {{$user->isActive()?'Activated':'Deactivated'}} and an email has been sent to the user as notification.
                        </h4>
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