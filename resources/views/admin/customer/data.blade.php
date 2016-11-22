@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">
            <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">
            <input type="hidden" id="getCustomerNote" value="{{url('ReportInfo/getCustomerNote')}}">
       <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>MDA Customer Data</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form id="customerform">
                                <div class="row form-group">
                                    <div class="validatemessage"></div>
                                    <div class="col-md-6 form-group">

                                        <div class="input-group-content">

                                            <label for="Start_Date">Start Date</label>

                                            <input class="form-control" id="datepick" name="datepick" placeholder="11/3/2016" type="date" value="11/3/2016" />
                                        </div>
                                        <span class="input-group-addon">to</span>
                                        <div class="input-group-content">

                                            <label for="End_Date">End Date</label>

                                            <input class="form-control" id="datepick2" name="datepick2" placeholder="11/3/2016" type="date" value="11/3/2016" />
                                        </div>

                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="State">State</label>
                                        <select class="form-control" id="State" name="State"><option value="">Select State</option>
                                            @foreach(\App\State::all() as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="LGA">LGA</label>
                                        <span id="message" class="pull-right">
                                            <img style="float:right" src="{{url('userimages/default.gif')}}">Loading.Please Wait...</span>
                                        <select class="form-control" id="Region" name="Region"><option value="">Select LGA</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="Distribution_Company">Distribution Company</label>
                                        <select class="form-control" id="Disco" name="Disco"><option value="">Select Disco</option>
                                            @foreach(\App\DistributionCompany::all() as $item)
                                                <option value="{{$item->disco_name}}">
                                                    {{$item->disco_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="Ministry">Ministry</label>
                                        <select class="form-control" id="Minis" name="Minis"><option value="">Select Ministry</option>
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
                                            <span class="info-box-report-icon"><i class="fa fa-file-excel-o ink-reaction"></i></span>
                                            <a href="{{url('CustomerData/ExportCustomerNote')}}" id="test">
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
                                <table id="datatables-4" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>MDA Name</th>

                                        <th>Gov. Level</th>

                                        <th>Parent Federal Ministry</th>

                                        <th>Sector</th>

                                        <th>Site Address</th>

                                        <th>Site Address Co-ordinate</th>

                                        <th>Closest Landmark</th>

                                        <th>Village</th>

                                        <th>Town</th>

                                        <th>City</th>

                                        <th>LGA</th>

                                        <th>State</th>

                                        <th>Distribution Company</th>

                                        <th>Business Unit</th>

                                        <th>Disco Account No.</th>

                                        <th>Customer Type</th>

                                        <th>Customer Class</th>

                                        <th>Meter Installed</th>

                                        <th>Meter Number</th>

                                        <th>Meter Type</th>

                                        <th>Meter Brand</th>

                                        <th>Meter Model</th>

                                    </tr>
                                    </thead>

                                </table>
                            </div>

                            <script src="{{url('Scripts/customerdata.js')}}"></script>


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