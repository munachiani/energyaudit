@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">






            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Manage Users
                        <small class="pull-right">
                            <a href="{{url('dashboard')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Dashboard
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="datatables-1" class="table table-banded table-hover" cellspacing="1">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role(s)</th>
                                        <th>Status</th>
                                        <th>Region Assigned</th>
                                        <th>State</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\User::latest('id')->get() as $user)
                                        <?php
                                                $userRoles = [];
                                        foreach($user->userRole as $item){
                                            $userRoles[]= $item->role->name;
                                            $userRoleIDs[]= $item->role->id;
                                        }

                                        $userRoles = implode(',',$userRoles);
                                        ?>
                                    <tr>

                                        <td>{{$user->getFullNameAttribute()}}</td>
                                        <td>{{$user->Email}}</td>
                                        <td>{{$user->PhoneNumber}}</td>
                                        <td>
                                            {{$userRoles}}
                                        </td>
                                        <td>
                                            {{$user->isActive()?'Active':'Deactivated'}}
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="{{url('Users/Edit/'.$user->id)}}">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="{{url('Users/Activate')}}">Deactivate</a>

                                        </td>
                                    </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
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