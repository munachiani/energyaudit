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
            height: 600px !important;
            min-width: 610px !important;
            max-width: 920px;
            margin: 0 auto;
            text-align: right;
        }
    </style>
@stop
<?php
$discoData = [];
$discoCount = [];
foreach ($disco as $item) {
    $count = \App\CustomerNote::where('disco_id', '=', $item->disco_name)->count();
    $discoData[] = $item->disco_name;
    $discoId[] = $item->id;
    $discoCount[] = $count;
}
$discoData = implode(",", $discoData);
$discoId = implode(",", $discoId);
$discoCount = implode(',', $discoCount);

$discoNames = [];
$discoNamesD = [];
$discoAmount = [];
$discoAmountD = [];
$distinctCustomerD = [];
foreach ($disco as $item) {
    $discoNames[] = $item->disco_name;
    $discoNamesD[] = $item->disco_name;
    $totalCount = \App\CustomerBill::where('disco', '=', $item->disco_name)->get();
    $itemAmount[] = $item->id;
    $total = 0;
    foreach ($totalCount as $tt) {
        $total += $tt->invoice_amt;
    }
    $discoAmount[] = $total;
    $discoAmountD[] = $total;
//Get All customerNotes belonging to selected ministry
    $customNotesD = \App\CustomerNote::where('disco_id', '=', $item->disco_name)->get();
    $totalMD = 0;
    $dataD = [];
    foreach ($customNotesD as $tmD) {
        //fetch all customer bills belonging to the selected customer profile
        $totalCountMD = \App\CustomerBill::where('disco_account_number', '=', $tmD->disco_acct_number)->get();

        // if (!in_array($tm->mda_name, $distinctCustomer)) {
        $nowTotalD = 0;
        foreach ($totalCountMD as $dttD) {
            $nowTotalD += $dttD->invoice_amt;
        }
        $dataD[] = [trim($tmD->mda_name), $nowTotalD];


        foreach ($totalCountMD as $ttD)
            $totalMD += $ttD->invoice_amt;
    }

    $distinctCustomerD[] = ['name' => 'Total Debt', 'id' => $item->disco_name,
            'data' => $dataD];
}
$discoNames = implode(",", $discoNames);
$itemAmount = implode(",", $itemAmount);
$discoAmount = implode(',', $discoAmount);

//3rd graph starts here
$ministryAmount = [];
$ministry = [];
$ministryAmountTotal = 0;
$distinctCustomer = [];
$totalDistinctCustomerBill = [];
//Iterating through mdaCaptured
foreach ($mdaCapturedDistinct as $mdasDistinct) {
    $ministry[] = $mdasDistinct->parent_fed_ministry_name;//list of ministries

    //Get All customerNotes belonging to selected ministry
    $customNotes = \App\CustomerNote::where('parent_fed_min_id', '=', $mdasDistinct->parent_fed_ministry_name)->get();
    //$totalCountM = \App\CustomerBill::where('parent_ministry', '=',$mdasDistinct->parent_fed_ministry_name)->get();
    $totalM = 0;
    $data = [];
    foreach ($customNotes as $tm) {
        //fetch all customer bills belonging to the selected customer profile
        $totalCountM = \App\CustomerBill::where('disco_account_number', '=', $tm->disco_acct_number)->get();

        // if (!in_array($tm->mda_name, $distinctCustomer)) {
        $nowTotal = 0;
        foreach ($totalCountM as $dtt) {
            $nowTotal += $dtt->invoice_amt;
        }
        $data[] = [trim($tm->mda_name), $nowTotal];
        /**
         * [
        {
        name: 'Total debt',
        id: 'Minister for Youth and Sports',
        data: [
        [
        'v12.x',
        0.34
        ],
        [
        'v28',
        0.24
        ],
        [
        'v27',
        0.17
        ],
        [
        'v29',
        0.16
        ]
        ]
        }]
         */


        foreach ($totalCountM as $tt)
            $totalM += $tt->invoice_amt;
    }

    $ministryAmount[] = $totalM;

    $distinctCustomer[] = ['name' => 'Total Debt', 'id' => $mdasDistinct->parent_fed_ministry_name,
            'data' => $data];
    // }
}
$series = [];
$seriesD = [];

for ($i = 0; $i < count($ministry); $i++)
    $series[] = ['name' => $ministry[$i], 'y' => $ministryAmount[$i], 'drilldown' => $ministry[$i]];

for ($j = 0; $j < count($discoNamesD); $j++)
    $seriesD[] = ['name' => $discoNamesD[$j], 'y' => $discoAmountD[$j], 'drilldown' => $discoNamesD[$j]];
//dd(json_encode($seriesD));
$ministry = implode(",", $ministry);
$ministryAmount = implode(",", $ministryAmount);


?>
@section('contents')
    <section>
        <div class="section-body">

            ﻿﻿<input type="hidden" id="discoData" value="{{$discoData}}">
            ﻿﻿<input type="hidden" id="ministry" value="{{$ministry}}">
            ﻿﻿<input type="hidden" id="discoCount" value="{{$discoCount}}">
            ﻿﻿<input type="hidden" id="itemId" value="{{$itemAmount}}">
            ﻿﻿<input type="hidden" id="discoId" value="{{$discoId}}">
            ﻿﻿<input type="hidden" id="ministryAmount" value="{{$ministryAmount}}">
            <input id="startdate" name="startdate" type="hidden" value="01/01/2015"/>
            <input id="enddate" name="enddate" type="hidden" value="31/12/2016"/>
            <input id="userid" name="userid" type="hidden" value="{{auth()->user()->id}}"/>

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
                                                       name="datepick" placeholder="03/Nov/2016" type="text"
                                                       value="01/01/2015"/>
                                            </div>
                                        </div>

                                        <div class="input-group-content">
                                            <div class="col-md-4">
                                                <label for="End_Date">End Date</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input autocomplete="off" class="form-control" id="datepick2"
                                                       name="datepick2" placeholder="03/Nov/2016" type="text"
                                                       value="31/12/2016"/>
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
                                    <span class="info-box-text">MDAs-Uploaded Bills</span>
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
                                Disco
                            </header>
                        </div>
                        <div class="card-body height-12">
                            <div id="container5" style="height: 400px"></div>
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
                        <div class="card-body height-12" style="height: 640px;">
                            <!-- <div id="container2" style="height: 400px;"></div> -->
                            <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
                                             &copy; Copyright 2016 - Advisory Power Team. All rights reserved.<br>                                             For more information please contact mdadebts@aptovp
                                            .org | 07089090000
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
        dataHor = $("#discoData").val();
        dataDiscoId = $("#discoId").val();
        var aSeries = <?php echo json_encode($series)?>;
        var aSeriesD = <?php echo json_encode($seriesD)?>;
        hor = dataHor.split(',');
        dataId = dataDiscoId.split(',');
        var distinctCustomer =<?php echo json_encode($distinctCustomer)?>;
        var distinctCustomerD =<?php echo json_encode($distinctCustomerD)?>;
        //console.log(distinctCustomer);
        $(function () {
            $('#container1').highcharts({
                chart: {
                    type: 'column'

                },

                title: {
                    text: ''
                },

                legend: {
                    labelFormatter: function () {
                        var total = 0;
                        for (var i = this.yData.length; i--;) {
                            total += this.yData[i];
                        }

                        return 'Total MDA-Premises Captured: ' + total;
                    }

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
                    color: '#2a532a',
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                window.open('premesis/captured/' + dataId[this.x], '_top');
                            }
                        }
                    }

                }]
            });
        });


    </script>
    <script type="text/javascript">
        dataHorDebt = $("#discoNames").val();
        dataItemId = $("#itemId").val();
        horDebt = dataHor.split(',');
        ItemIds = dataItemId.split(',');
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
                legend: {
                    labelFormatter: function () {
                        var total = 0;
                        for (var i = this.yData.length; i--;) {
                            total += this.yData[i];
                        }

                        return 'Total Dept owed to Discos: ' + '₦' + total.toFixed(2);
                    }

                },

                xAxis: {
                    categories: horDebt
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Total Debt Owed'
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
                    name: 'Total Dept owed to Discos',
                    data: [{{$discoAmount}}],
                    color: '#2a532a',
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                window.open('disco/amount/owed/' + ItemIds[this.x], '_top');
                            }
                        }
                    }

                }]
            });
        });


    </script>
    <script type="text/javascript">
        datHorMinistry = $("#ministry").val();
        horMinistry = datHorMinistry.split(',');
        $(function () {
            $('#container2').highcharts({
                chart: {
                    type: 'column'

                },

                title: {
                    text: ''
                },

                style: {
                    width: '250px'
                },
                xAxis: {
                    categories: horMinistry,
                    labels: {
                        formatter: function () {
                            return this.value.toString().substring(0, 40);
                        }
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Debt Owed'
                    },
                    labels: {
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
                    name: 'Total Dept owed',
                    data: [{{$ministryAmount}}],
                    color: '#2a532a'

                }]
            });
        });


    </script>

    {{--dummy content starts here--}}
    <script>
        $(function () {
            // Create the chart
            Highcharts.chart('container3', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'TOTAL DEBT PER MINISTRY'
                },
                subtitle: {
                    text: 'Click the columns to view DrillDown of Individual MDAs'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Debt Owed'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: false,
                            format: '₦{point.y:.1f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: ₦{point.y}'
                },

                series: [
                    {
                        name: 'Total Debt',
                        colorByPoint: true,
                        data: aSeries
                    }],
                drilldown: {
                    series: distinctCustomer
                }
            });
        });
    </script>


    <script>
        $(function () {
            // Create the chart
            Highcharts.chart('container5', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Total Debt owed per Disco'
                },
                subtitle: {
                    text: 'Click the columns to view DrillDown of Individual MDAs.'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Debt Owed'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: false,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: ₦{point.y}'
                },

                series:[{
                    name: 'Total Disco Debt',
                    colorByPoint: true,
                    data: aSeriesD
                }],
                drilldown: {
                    series: distinctCustomerD
                }
            });
        });
    </script>




@stop