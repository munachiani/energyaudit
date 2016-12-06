@extends('layout.master')
@section('contents')
    <?php
    $user = auth()->user();

    ?>

    <section>
        <div class="section-body">

            <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">
            <input type="hidden" id="getCustomerBill" value="{{url('ReportInfo/getCustomerBill')}}">
            <input type="hidden" id="deleteCustomerBill" value="{{url('Customer/DeleteCustomerBill')}}">

            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>MDA Customer Billing</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="progress" id="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar" id="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                                <span class="sr-only">45% Complete</span>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <form id="customerform">
                                <div class="row form-group">
                                    <div class="validatemessage"></div>
                                    <div class="col-md-5 form-group">

                                        <div class="input-group-content col-md-6">

                                            <label for="Start_Date">Start Date</label>

                                            <input class="form-control" id="datepick" name="datepick"
                                                   placeholder="11/3/2016" type="date" value="11/3/2016"/>
                                        </div>

                                        <div class="input-group-content col-md-6">

                                            <label for="End_Date">End Date</label>

                                            <input class="form-control" id="datepick2" name="datepick2"
                                                   placeholder="11/3/2016" type="date" value="11/3/2016"/>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
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


                                    <div class="col-md-3">
                                        <label class="block">&nbsp;</label>
                                        <div class="info-box-report">
                                            <span class="info-box-report-icon"><i
                                                        class="fa fa-file-excel-o ink-reaction"></i></span>
                                            <a href="{{url('CustomerData/ExportCustomerBill')}}" id="test">
                                                <div class="info-box-report-content">
                                        <span class="info-box-report-text">
                                            Export To Excel
                                        </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 form-group">
                                        <label class="block">&nbsp;</label>
                                        <p class="btn btn-primary-dark" id="reloadBill">Clear Filter</p>
                                        <span id="message" class="pull-right">
                                            <img src="{{url('userimages/default.gif')}}"></span>
                                    </div>


                                </div>
                                <div class="row">


                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="datatables-5" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th></th>
                                        <th>MDA Name</th>

                                        <th>Distribution Company</th>

                                        <th>Disco Account No.</th>

                                        <th>Account Month</th>

                                        <th>Invoice Number</th>

                                        <th>Monthly Energy Consumption (kWH)</th>

                                        <th>Actual/Estimated Billing</th>

                                        <th>Meter Reading</th>

                                        <th>Tariff Rate (NGN/kWH)</th>

                                        <th>Fixed Charge</th>

                                        <th>Invoice Amount (NGN)</th>

                                    </tr>
                                    </thead>

                                </table>
                            </div>


                            <div id="user_id" class="hidden">{{$user->id}}</div>
                            <input id="user_role" type="hidden" value="{{$user->latestRole()->role->id}}"/>
                            <script src="{{url('Scripts/customerbill.js')}}"></script>


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