@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">
            <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">
            <input type="hidden" id="getEneryAuditUrl" value="{{url('ReportInfo/GetEnergyAudit')}}">

            {{ HTML::script("Scripts/energyaudit.js") }}
            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>Audit Report</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form id="energyform">
                                <div class="row form-group">
                                    <div class="col-md-12">


                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="validatemessage"></div>
                                    <div class="col-md-6 form-group">

                                        <div class="input-group-content">
                                            <!--<input type="text" class="form-control" placeholder="Start Date" name="start">-->
                                            <label for="Start_Date">Start Date</label>

                                            <input class="form-control" id="datepick" name="datepick"
                                                   placeholder="11/3/2016" type="date" value="11/3/2016"/>
                                        </div>
                                        <span class="input-group-addon">to</span>

                                        <div class="input-group-content">
                                            <!--<input type="text" class="form-control" placeholder="End Date" name="end">-->
                                            <label for="End_Date">End Date</label>

                                            <input class="form-control" id="datepick2" name="datepick2"
                                                   placeholder="11/3/2016" type="date" value="11/3/2016"/>
                                        </div>

                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="State">State</label>
                                        <select class="form-control" id="State" name="State">
                                            <option value="">Select State</option>
                                            @foreach(\App\State::all() as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="LGA">LGA</label>
                                        <span id="message" class="pull-right">
                                            <img style="float:right" src="{{url('userimages/default.gif')}}">Loading.Please Wait...</span>
                                        <select class="form-control" id="Region" name="Region" disabled>
                                            <option value="">Select LGA</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-3 form-group">
                                        <label for="Distribution_Company">Distribution Company</label>
                                        <select class="form-control" id="Disco" name="Disco">
                                            <option value="">Select Disco</option>
                                            @foreach(\App\DistributionCompany::all() as $item)
                                                <option value="{{$item->disco_name}}">
                                                    {{$item->disco_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="Ministry">Ministry</label>
                                        <select class="form-control" id="Minis" name="Minis">
                                            <option value="">Select Ministry</option>
                                            @foreach(\App\ParentFederalMinistry::all() as $item)
                                                <option value="{{$item->parent_fed_ministry_name}}">
                                                    {{$item->parent_fed_ministry_name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label class="block">&nbsp;</label>

                                        <div class="info-box-report">
                                            <span class="info-box-report-icon"><i
                                                        class="fa fa-file-excel-o ink-reaction"></i></span>
                                            <a href="{{url('ReportInfo/Exporttoexcel')}}">
                                                <div class="info-box-report-content">
                                        <span class="info-box-report-text">
                                            Export To Excel
                                        </span>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label class="block">&nbsp;</label>

                                        <p class="btn btn-primary-dark" id="reloadenergy">Clear Filter</p>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatables-3" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
                                        <th>State</th>

                                        <th>LGA</th>

                                        <th>Distribution Company</th>

                                        <th>Address</th>

                                        <th>MDA Name</th>


                                        <th>Parent Federal Ministry</th>


                                        <th>Avg Electricity Bill (P/M)</th>

                                        <th>No of Generators</th>

                                        <th>Generator Running Hrs/Month</th>


                                        <th>No of Years at Location</th>

                                        <th>Contact Details of MDA Head</th>


                                        <th>Telephone</th>


                                        <!--<th>Comment</th>-->

                                        <!--<th>Image</th>-->

                                    </tr>
                                    </thead>

                                </table>
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