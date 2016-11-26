@extends('layout.master')
@section('pageStyles')
    <style>
        .containerColor {
            background: #C5C5C5;
            background: url('{{url('Content/img/FedRepNig1.png')}}') no-repeat !important;
            background-size: contain !important;
            background-size: 100% 100% !important;
            margin-bottom:30px;


        }

        .containerColor1 {
            background: #C5C5C5;
            background: url('{{url('Content/img/FedRepNig1.png')}}') no-repeat !important;
            background-size: contain !important;
            background-size: 100% 100% !important;
            height:1000px;


        }

        .logoStyle {
            text-align: center;
        }

        .logoStyle img {
            width: 150px;
        }

        .rowStyle {
            padding-top: 40px;
        }

        .inputStyle {
            border: 1px solid #000000;
        }

        .inputStyle1 {
            background: #C0DAB7 !important;
        }

        .rowStyle1 {
            margin-top: 8px;

        }

        .rowStyle3 {
            padding: 20px;

        }

        .rowStyle2 {
            padding-top: 30px;
        }

        .rowStyletable {
            margin-top: 15px;
            padding: 20px;
        }

        .rowStyletable table {
            width: 100%;
        }

        @media print {
            .no-print {
                display: none;
            }

            #containerColor {
                -webkit-print-color-adjust: exact !important;
                background: url('{{url('Content/img/FedRepNig1.png')}}') no-repeat !important;
                background-size: contain !important;
                background-size: 100% 100% !important;
                margin-top: 900px !important;
            }

            #containerColor1 {
                -webkit-print-color-adjust: exact !important;
                background: url('{{url('Content/img/FedRepNig1.png')}}') no-repeat !important;
                background-size: contain !important;
                background-size: 100% 90% !important;
                margin-top: 900px !important;
                height: 1000px !important;
            }

            #inputStyle {
                width: 35%;
            }

            #inputStyletext {
                width: 35%;
                margin-left: 400px;

            }

            #inputStyletext1 {
                width: 35%;
                margin-left: 400px;
                margin-top: -20px;
                background-color: #C0DAB7 !important;

            }

            #inputStyletextColor {
                width: 35%;
                margin-left: 450px;
                background-color: #C0DAB7 !important;

            }

            #acctNumber {
                margin-top: -50px;
                padding-left: 400px;
            }

            #acctNumber1 {
                margin-top: -100px;
                padding-left: 400px;
            }
            #acctNumber2{
                margin-top: -200px;
                padding-left: 400px;
            }

            #logoStyle img {
                width: 60px;
            }

            #mda h1 {
                font-size: 25px;
            }

            #rowStyle {
                margin-top: -30px;
            }

            #footerContainer {
                padding-top: 550px;
            }

        }
    </style>

@stop
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
                <div class="card-head card-head-sm style-custom no-print">
                    <header>MDA Customer Billing Data for {{$bill->mda_name}}</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row containerColor" id="containerColor">
                                <div class="row logoStyle" id="logoStyle">
                                    <div class="col-md-12">
                                        <img src="{{url('Content/img/FedRepNig.png')}}">
                                    </div>
                                    <div class="col-md-12" id="mda">
                                        <h1>Ministries Department And Agencies Energy Audit</h1>

                                        <h3>{{$bill->disco}}</h3>
                                    </div>

                                </div>
                                <div class="row rowStyle" id="rowStyle">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Account Number</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{$bill->disco_account_number}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Due Date</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyletext">{{$bill->invoice_date}}</div>
                                    </div>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Name</div>
                                        <div class="col-md-6 inputStyle" id="inputStyle">{{$bill->mda_name}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Meter Number</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyletext">{{$bill->customerNote->meter_no}}</div>
                                    </div>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Service Address</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{$bill->customerNote->site_address}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Dials</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyletext">{{$bill->customerNote->id}}</div>
                                    </div>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Old A/C Number</div>
                                        <div class="col-md-6 inputStyle" id="inputStyle">smnvdhsvj</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">ADC</div>
                                        <div class="col-md-6 inputStyle" id="inputStyletext">bacdbvskjgs</div>
                                    </div>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Previous Bal</div>

                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{(is_null($prevBill)?"N/A":$prevBill->invoice_amt)}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Payments</div>
                                        <div class="col-md-6 inputStyle" id="inputStyletext">0.00</div>
                                    </div>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Net Arrears</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{(is_null($prevBill)?"N/A":$prevBill->invoice_amt)}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Adjustment</div>
                                        <div class="col-md-6 inputStyle" id="inputStyletext">0.00</div>
                                    </div>
                                </div>
                                <div class="row rowStyletable">
                                    <table class="table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>Description</td>
                                            <td>Tariff Code</td>
                                            <td>Read Date</td>
                                            <td>Present Reading</td>
                                            <td>Previous Reading</td>
                                            <td>Multiplier</td>
                                            <td>Consumption</td>
                                            <td>Current Charges</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td>{{$bill->customerNote->customer_class}}</td>
                                            <td>{{$bill->invoice_date}}</td>
                                            <td>{{$bill->meter_reading}}</td>
                                            <td>{{(is_null($prevBill)?"N/A":$prevBill->meter_reading)}}</td>
                                            <td>1.00</td>
                                            <td>{{$bill->monthly_energy_consumption}}</td>
                                            <td>{{$bill->invoice_amt}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row rowStyle1">

                                    <div class="col-md-6">
                                        <div class="col-md-3">Last Pay. Date</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{(is_null($prevBill)?"N/A":$prevBill->invoice_date)}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-3" id="acctNumber">Amount</div>
                                        <div class="col-md-6 inputStyle" id="inputStyletext">bacdbvskjgs</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row rowStyle1">

                                    <div class="col-md-4">
                                        <div class="col-md-6">Net Arrears</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{(is_null($prevBill)?"N/A":$prevBill->invoice_amt)}}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-6" id="acctNumber">Current Charges</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyletext">{{$bill->invoice_amt}}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-5">VAT</div>
                                        <div class="col-md-6 inputStyle" id="inputStyle">{{$bill->fixed_charge}}</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row containerColor1" id="containerColor1">
                                <div class="row rowStyle1">

                                    <div class="col-md-4">
                                        <div class="col-md-6" id="acctNumber2">VAT number</div>
                                        <div class="col-md-6 inputStyle" id="inputStyletext">smnvdhsvj</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-6">LAR Date</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyle">{{(is_null($prevBill)?"N/A":$prevBill->invoice_date)}}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-5" id="acctNumber">LAR</div>
                                        <div class="col-md-6 inputStyle"
                                             id="inputStyletext">{{(is_null($prevBill)?"N/A":$prevBill->meter_reading)}}</div>
                                    </div>
                                </div>
                                <div class="row rowStyle2">


                                    <div class="col-md-3" id="inputStyle">
                                        PAY TOTAL DUE NOW
                                    </div>

                                    <div class="col-md-3 inputStyle1" id="inputStyletext1">bacdbvskjgs</div>

                                </div>
                                <div class="row rowStyle3">

                                    <div class="col-md-12 inputStyle">
                                        <p>PLEASE PAY AT ANY CASH OFFICE OR DESIGNATED BANK IN BIRNIN KEBBI BUSIN</p>

                                        <p>ENC2 - Rate = =N= 31.27 per unit</p>

                                        <p>(LAR = Last Actual Reading)</p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="font-weight: bolder;">
                                        <p>Customers whose complaints are not statisfactory addresssed by the Customer
                                            Complaints Unit of the Distribution License
                                            may approach the Forum established for Customer Complaints</p>

                                    </div>
                                </div>
                            </div>


                            <div id="user_id" class="hidden">{{$user->id}}</div>
                            <input id="user_role" type="hidden" value="{{$user->latestRole()->role->id}}"/>


                        </div><!--end .section-body -->
                    </div>
                    <div class="row no-print">
                        <div class="col-md-12">
                            <div class="footer">
                                <div class="container-fluid" >
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