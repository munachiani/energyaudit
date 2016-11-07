@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">




            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Change Password
                        <small class="pull-right">
                            <a href="{{url('Users/Edit')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Profile
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">
                    @if(Session::has('updateSuccess'))
                        <div class="alert alert-callout alert-success">
                            {{session('updateSuccess')}}
                        </div>
                    @endif
                    @if($errors->has('updateError'))
                        <div class="alert alert-callout alert-danger">
                            {{$errors->first('updateError')}}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('User/UpdatePassword')}}" class="form-horizontal" method="post" role="form">
                                <hr />
                                <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                <input name="id" type="hidden" value="{{$user->id}}"/>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-offset-1 col-md-2">
                                            <label class=" control-label" for="OldPassword">Current password</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" data-val="true" data-val-required="The Current password field is required." id="OldPassword" name="OldPassword"  type="password" />
                                            @if ($errors->has('OldPassword'))
                                                <p class="help-block" style="color:red">{{ $errors->first('OldPassword') }}</p>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-offset-1 col-md-2">
                                            <label class=" control-label" for="NewPassword" required="">New password</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" data-val="true" data-val-length="The New password must be at least 8 characters long." data-val-length-max="100" data-val-length-min="8" data-val-required="The New password field is required." id="NewPassword" name="NewPassword"  type="password" />
                                            @if ($errors->has('NewPassword'))
                                                <p class="help-block" style="color:red">{{ $errors->first('NewPassword') }}</p>
                                            @endif                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-offset-1 col-md-2">
                                            <label class=" control-label" for="ConfirmPassword">Confirm new password</label>
                                            <span class="require">*</span>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" data-val="true" data-val-equalto="The new password and confirmation password do not match." data-val-equalto-other="*.NewPassword" id="ConfirmPassword" name="ConfirmPassword" type="password" />
                                            @if ($errors->has('ConfirmPassword'))
                                                <p class="help-block" style="color:red">{{ $errors->first('ConfirmPassword') }}</p>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-offset-3 col-md-10">
                                            <input type="submit" value="Change password" class="btn btn-default" />
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