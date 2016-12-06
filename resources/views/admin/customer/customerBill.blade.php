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
                    <header>MDA Customer Billing Data for {{$customer->mda_name}}</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 label label-success">
                            <h4>MDA NAME: {{$customer->mda_name}}</h4>
                            <h4>DISCO: {{$customer->disco_id}}</h4>
                            <h4>DISCO ACC. NO: {{$customer->disco_acct_number}}</h4>
                            <h4>PARENT FEDERAL MINISTRY: {{$customer->parent_fed_min_id}}</h4>
                            <h4>TOTAL BILLS FOUND: {{$bills->count()}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="datatables-7" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
                                        <th>SN</th>

                                        <th>Invoice Date</th>

                                        <th>Invoice Month</th>

                                        <th>Invoice Number</th>

                                        <th>Monthly Energy Consumption (kWH)</th>

                                        <th>Actual/Estimated Billing</th>

                                        <th>Meter Reading</th>

                                        <th>Tariff Rate (NGN/kWH)</th>

                                        <th>Fixed Charge</th>

                                        <th>Invoice Amount (NGN)</th>

                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $c=1;$arr=0; $billsList=$bills->toArray(); ?>
                                    @foreach($bills as $bill)
                                        <tr>
                                            <td>{{$c}}</td>
                                            <td>{{Carbon\Carbon::parse($bill->invoice_date)->format('jS M, Y')}}</td>
                                            <td>{{Carbon\Carbon::parse($bill->invoice_date)->format('F')}}</td>
                                            <td>{{$bill->invoice_number}}</td>
                                            <td>{{$bill->monthly_energy_consumption}}</td>
                                            <td>{{$bill->actual_estimated_billing}}</td>
                                            <td>{{$bill->meter_reading}}</td>
                                            <td>{{$bill->tariff_rate}}</td>
                                            <td>{{$bill->fixed_charge}}</td>
                                            <td>{{$bill->invoice_amt}}</td>
                                            <?php

                                                if(array_key_exists($arr-1,$billsList))
                                                {
                                                    $prev= $billsList[($arr-1)]['id'];
                                                }
                                                else
                                                {
                                                    $prev= 0;
                                                }
                                                ?>
                                            <!--<td><a href="{{url('Customer/Bill/Print/'.$bill->id.'/'.$prev)}}" class="btn btn-default">View scanned bill</a></td>-->
                                            <td><a href="{{url('userimages/sample_invoice.pdf')}}" class="btn btn-default">View scanned bill</a></td>
                                        </tr>
                                        <?php $c++;$arr++;?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div id="user_id" class="hidden">{{$user->id}}</div>
                            <input id="user_role" type="hidden" value="{{$user->latestRole()->role->id}}"/>


                        </div><!--end .section-body -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer">
                                <div class="container-fluid">
                                    <div class="row">
                                        <img src="{{url('Content/img/FedRepNig.png')}}" class="footer-logo"/>
                                        <br/>

                                        <p class="col-md-12">
                                        <span>
                                             &copy; Copyright 2016 - Advisory Power Team. All rights reserved.<br>                                             For more information please contact mdadebts@aptovp
                                            .org | 07089090000
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop