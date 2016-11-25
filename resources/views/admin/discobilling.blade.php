@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">
            <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">
            <input type="hidden" id="getEneryAuditUrl" value="{{url('ReportInfo/GetEnergyAudit')}}">

            {{ HTML::script("Scripts/energyaudit.js") }}
            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>MDA Customer Billing  for {{$disco->disco_name}}</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form id="energyform">
                                <div class="row form-group">
                                    <div class="col-md-12">


                                    </div>
                                </div>

                            </form>
                            <div class="table-responsive">
                                <table id="datatables-3" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
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
                                    <tbody>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{$bill->mda_name}}</td>
                                            <td>{{$bill->disco_account_number}}</td>
                                            <td>{{$bill->account_month}}</td>
                                            <td>{{$bill->invoice_number}}</td>
                                            <td>{{$bill->monthly_energy_consumption}}</td>
                                            <td>{{$bill->actual_estimated_billing}}</td>
                                            <td>{{$bill->meter_reading}}</td>
                                            <td>{{$bill->tariff_rate}}</td>
                                            <td>{{$bill->fixed_charge}}</td>
                                            <td>{{$bill->invoice_amt}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>

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