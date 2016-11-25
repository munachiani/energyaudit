@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">
            <input type="hidden" id="stateRegionUrl" value="{{url('ReportInfo/GetRegionbyStateId')}}">
            <input type="hidden" id="getEneryAuditUrl" value="{{url('ReportInfo/GetEnergyAudit')}}">

            {{ HTML::script("Scripts/energyaudit.js") }}
            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>Disco Report for {{$disco->disco_name}}</header>
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

                                        <th>Government Level</th>

                                        <th>Site Address</th>

                                        <th>Site Latitude</th>

                                        <th>Site Longitude</th>


                                        <th>Closet Landmark</th>


                                        <th>City</th>

                                        <th>Sector</th>

                                        <th>LGA</th>


                                        <th>State</th>

                                        <th>Parent Federal Ministry</th>

                                        <th>Disco Account Number</th>
                                        <th>Business Unit</th>
                                        <th>Customer Type</th>
                                        <th>Meter Installed</th>
                                        <th>Meter Number</th>
                                        <th>Meter Type</th>
                                        <th>Meter Brand</th>
                                        <th>Meter Model</th>
                                        <th>Town</th>
                                        <th>Village</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($notes as $note)
                                    <tr>
                                        <td>{{$note->mda_name}}</td>
                                        <td>{{$note->government_level}}</td>
                                        <td>{{$note->site_address}}</td>
                                        <td>{{$note->site_latitude}}</td>
                                        <td>{{$note->site_longitude}}</td>
                                        <td>{{$note->closet_landmark}}</td>
                                        <td>{{$note->city}}</td>
                                        <td>{{$note->sector_id}}</td>
                                        <td>{{$note->lga_id}}</td>
                                        <td>{{$note->state_id}}</td>
                                        <td>{{$note->parent_fed_min_id}}</td>
                                        <td>{{$note->disco_acct_number}}</td>
                                        <td>{{$note->business_unit}}</td>
                                        <td>{{$note->customer_type}}</td>
                                        <td>{{$note->meter_installed}}</td>
                                        <td>{{$note->meter_no}}</td>
                                        <td>{{$note->meter_type}}</td>
                                        <td>{{$note->meter_brand}}</td>
                                        <td>{{$note->meter_model}}</td>
                                        <td>{{$note->town}}</td>
                                        <td>{{$note->village}}</td>
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