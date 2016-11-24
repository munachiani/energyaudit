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

                    @if (Session::has('flash_message'))
                        <div class="alert alert-callout alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif


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
                                    @foreach(\App\User::all() as $user)
                                        <?php
                                        $userRoles = [];
                                        $userRegions = [];
                                        $userStates = [];
                                        foreach ($user->userRole as $item) {
                                            $userRoles[] = $item->role->name;
                                            $userRoleIDs[] = $item->role->id;
                                        }
                                        foreach ($user->region as $item) {
                                            $userRegions[] = $item->region_name;
                                            $userStates[] = $item->state->name;
                                        }


                                        $userRoles = implode(', ', $userRoles);
                                        $userRegions = implode(', ', $userRegions);
                                        $userStates = implode(', ', $userStates);
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
                                                {{!empty($userRegions)?$userRegions:'Not Yet Assigned'}}
                                            </td>
                                            <td>
                                                {{!empty($userStates)?$userStates:'Not Yet Assigned'}}
                                            </td>

                                            <td>
                                                <a class="btn btn-xs btn-raised ink-reaction btn-info"
                                                   href="{{url('Users/Edit/'.$user->id)}}">Edit</a> &nbsp;|&nbsp;
                                                <a class="btn btn-xs btn-raised ink-reaction btn-{{$user->isActive()?'success':'danger'}}"
                                                   href="{{url('Users/Activate/'.$user->IsActive.'/'.$user->id)}}">{{$user->isActive()?'Deactivate ?':'Activate ?'}}</a>&nbsp;|&nbsp;
                                                <a class="btn btn-xs btn-raised ink-reaction btn-danger"
                                                   href="{{url('Users/Delete/'.$user->id)}}">Delete</a>

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