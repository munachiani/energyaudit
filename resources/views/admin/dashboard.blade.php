@extends('layout.master')
@section('pageStyles')
    <style>
        #container {
            height: 1200px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container1 {
            height: 1200px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        #container2 {
            height: 1200px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
@stop
<?php
$discoData = [];
$discoCount = [];
foreach ($disco as $item) {
    $count = \App\CustomerNote::where('disco_id', '=', $item->disco_name)->count();
    $discoData[] = $item->disco_name;
    $discoCount[] = $count;
}
$discoData = implode(",", $discoData);
$discoCount = implode(',', $discoCount);

$discoNames = [];
$discoAmount = [];
foreach ($disco as $item) {
    $discoNames[] = $item->disco_name;
    $totalCount = \App\CustomerBill::where('disco', '=', $item->disco_name)->get();
    $total = 0;
    foreach ($totalCount as $tt) {
        $total += $tt->invoice_amt;
    }
    $discoAmount[] = $total;
}
$discoNames = implode(",", $discoNames);
$discoAmount = implode(',', $discoAmount);

$ministryAmount = [];
$ministryAmountTotal = 0;
foreach ($mdasCapturedDistinct as $mdasDistinct) {
    $ministryAmountTotal += $mdasDistinct->invoice_amt;
}
$ministryAmount[] = $ministryAmountTotal;
        dd($ministryAmount);
?>
@section('contents')
    <section>
        <div class="section-body">

            ﻿﻿<input type="hidden" id="discoData" value="{{$discoData}}">
            ﻿﻿<input type="hidden" id="discoCount" value="{{$discoCount}}">
            <input id="startdate" name="startdate" type="hidden" value="11/03/2016"/><input id="enddate" name="enddate"
                                                                                            type="hidden"
                                                                                            value="11/03/2016"/>
            <input id="userid" name="userid" type="hidden" value=""/>

            <form action="/Dashboard" id="form" method="get">
                <div class="row">
                    <div class="card">
                        <div class="card-head style-custom">

                            <header class="text-bold">
                                <i class="fa fa-s fa-dashboard"></i>&nbsp; Dashboard
                                <div class="pull-right">
                                    <div class="input-daterange input-group" id="datepicker" style="margin:auto;">
                                        <div class="input-group-content">
                                            <div class="col-md-4">
                                                <label for="Start_Date">Start Date</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input autocomplete="off" class="form-control" id="datepick"
                                                       name="datepick" placeholder="03/Nov/2016" type="text" value=""/>
                                            </div>
                                        </div>

                                        <div class="input-group-content">
                                            <div class="col-md-4">
                                                <label for="End_Date">End Date</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input autocomplete="off" class="form-control" id="datepick2"
                                                       name="datepick2" placeholder="03/Nov/2016" type="text" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>

                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="info-box">
                                <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">MDA-Premises Captured</span>
                                    {{--<span class="info-box-number"><span id="totalno">0</span></span>--}}
                                    <span class="counter info-box-number" data-counter="counterup"
                                          data-value="{{$mdasCaptured}}">0</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="info-box">
                                <span class="info-box-icon"><i class="fa fa-institution"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">MDAs-Uploaded</span>
                                    {{--<span class="info-box-number" id="numberOfMembers">{{$mdasUploaded}}</span>--}}
                                    <span class="counter info-box-number" data-counter="counterup"
                                          data-value="{{$mdasUploaded}}">0</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-underline">
                        <div class="card-head custom-default-dark">
                            <header class="text-bold"><i class="fa fa-s fa-bar-chart-o"></i>&nbsp; MDA-Premises Captured
                                per DisCo
                            </header>
                        </div>
                        <div class="card-body height-12">
                            <div id="container1" style="height: 400px"></div>

                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-underline">
                        <div class="card-head custom-default-dark">
                            <header class="text-bold"><i class="fa fa-s fa-bar-chart-o"></i>&nbsp; Total Debt owed per
                                DisCo
                            </header>
                        </div>
                        <div class="card-body height-12">
                            <div id="container" style="height: 400px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-underline">
                        <div class="card-head custom-default-dark">
                            <header class="text-bold"><i class="fa fa-s fa-bar-chart-o"></i>&nbsp; Total Debt per
                                Ministry
                            </header>
                        </div>
                        <div class="card-body height-12">
                            <div id="container2" style="height: 400px"></div>
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
@section('footerScript')

    <script type="text/javascript">

        $('.counter').counterUp();
        //        dataVert = $("#discoCount").val();
        dataHor = $("#discoData").val();
        //alert(dataVert);
        //alert(dataHor);
        //        vert=dataVert.split(',');
        hor = dataHor.split(',');


        $(function () {
            $('#container1').highcharts({
                chart: {
                    type: 'column'

                },

                title: {
                    text: ''
                },

                xAxis: {
                    categories: hor
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'MDA-Premises Captured'
                    }
                },

                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}'
                },

                plotOptions: {
                    column: {
                        stacking: 'normal',
                        depth: 40
                    }
                },

                series: [{
                    name: 'Total MDA-Premises Captured',
                    data: [{{$discoCount}}],
                    color: '#2a532a'

                }]
            });
        });


    </script>
    <script type="text/javascript">
        dataHorDebt = $("#discoNames").val();
        horDebt = dataHor.split(',');
        Highcharts.setOptions({
            lang: {

                thousandsSep: ","
            }
        });
        $(function () {
            $('#container').highcharts({
                chart: {
                    type: 'column'

                },

                title: {
                    text: ''
                },

                xAxis: {
                    categories: horDebt
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Debt Owed '
                    }, labels: {
                        formatter: function () {
                            return '₦' + this.axis.defaultLabelFormatter.call(this);
                        }
                    }

                },

                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: ₦{point.y}'
                },

                plotOptions: {
                    column: {
                        stacking: 'normal',
                        depth: 40
                    }
                },

                series: [{
                    name: 'Total Dept owed by Discos',
                    data: [{{$discoAmount}}],
                    color: '#2a532a'

                }]
            });
        });


    </script>
    <script type="text/javascript">
        $(function () {
            $('#container2').highcharts({
                chart: {
                    type: 'column'

                },

                title: {
                    text: ''
                },

                xAxis: {
                    categories: ['Ministr of Interior', 'Ministr of Solid Minerals', 'Minister of Women Affiars', 'Minister of Youth and Sports', 'Minister of Agriculture']
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Debt Owed'
                    }
                },

                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}'
                },

                plotOptions: {
                    column: {
                        stacking: 'normal',
                        depth: 40
                    }
                },

                series: [{
                    name: 'Total Dept owed by Ministries',
                    data: [{y: 5, color: '#2a532a'}, {y: 3, color: '#2a532a'}, {y: 7, color: '#2a532a'}, {
                        y: 9,
                        color: '#2a532a'
                    }, {y: 15, color: '#2a532a'}],
                    color: '#2a532a'

                }]
            });
        });


    </script>


@stop