<?php
$user = auth()->user();

?>
        <!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{url('dashboard')}}">
                <span class="text-lg text-bold text-primary ">Energy Audit Portal</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="clockbox" style="padding:0 12px;"></div>
            </div>
        </div>
        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <li class="{{substr(Request::path(),0,10) == 'dashboard'? 'active':''}}">
                <a href="{{url('dashboard')}}" >
                    <div class="gui-icon"><i class="fa fa-dashboard"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            @if(($user->latestRole()->role->id) == 6)
                <li class="gui-folder ">
                    <a>
                        <div class="gui-icon"><i class="fa fa-users"></i></div>
                        <span class="title">User Management</span>
                    </a>
                    <ul>
                        <li><a href="{{url('Users/Index')}}" class="{{substr(Request::path(),0,11) == 'Users/Index'? 'active':''}}"><span class="title">Users</span></a></li>
                        <li><a href="{{url('Users/Create')}}" class="{{substr(Request::path(),0,12) == 'Users/Create'? 'active':''}}"><span class="title">Add User</span></a></li>

                    </ul>
                </li><!--end /menu-li -->
            @endif


            @if(($user->latestRole()->role->id) == 6 || $user->latestRole()->role->id == 8)
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-users"></i></div>
                        <span class="title">MDA Customer Details</span>
                    </a>
                    <ul>
                        <li><a href="{{url('Customer/UploadCustomerNote')}}" class="{{substr(Request::path(),0,27) == 'Customer/UploadCustomerNote'? 'active':''}}"><span class="title">Upload Customer Profile</span></a>
                        </li>
                        <li><a href="{{url('Customer/UploadCustomerBill')}}" class="{{substr(Request::path(),0,27) == 'Customer/UploadCustomerBill'? 'active':''}}"><span class="title">Upload Customer Bill</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-list-alt text-center"></i></div>
                    <span class="title">Audit Report</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('ReportInfo/Energy')}}" class="{{substr(Request::path(),0,17) == 'ReportInfo/Energy'? 'active':''}}">
                            <span class="title">View Audit Report</span>
                        </a>
                    </li>
                    @if(($user->latestRole()->role->id) == 6 || $user->latestRole()->role->id== 8)

                        <li class="">
                            <a href="{{url('ReportInfo/UploadSheet')}}" class="{{substr(Request::path(),0,22) == 'ReportInfo/UploadSheet'? 'active':''}}">
                                <span class="title"> Upload Audit Report</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-bar-chart"></i></div>
                    <span class="title">View DisCo Report</span>
                </a>
                <ul>
                    <li><a href="{{url('Customer/CustomerData')}}" class="{{substr(Request::path(),0,21) == 'Customer/CustomerData'? 'active':''}}"><span class="title">MDA Customer Data</span></a>
                    </li>
                    <li><a href="{{url('Customer/CustomerBilling')}}" class="{{substr(Request::path(),0,24) == 'Customer/CustomerBilling'? 'active':''}}"><span class="title">MDA Customer Billing Data</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{url('Map/Index')}}" class="{{substr(Request::path(),0,9) == 'Map/Index'? 'active':''}}">
                    <div class="gui-icon"><i class="fa fa-map-marker text-center"></i></div>
                    <span class="title">Map</span>
                </a>
            </li>
            @if(($user->latestRole()->role->id) == 6)
                <li>
                    <a href="{{url('AuditTrail/Index')}}" class="{{substr(Request::path(),0,16) == 'AuditTrail/Index'? 'active':''}}">
                        <div class="gui-icon"><i class="fa fa-paper-plane"></i></div>
                        <span class="title"> View Audit Trail</span>
                    </a>
                </li>
            @endif
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->