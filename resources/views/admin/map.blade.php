@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">



            <style>
                #map{
                    height:600px;
                }
            </style>

            <div class="card">
                <div class="card-body no-padding">
                    <div id="map"></div>
                </div>
            </div>
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDnwVXdPAfWb3f2OwfsimrxuLIPhHtYZcc">
            </script>
            <input type="hidden" id="stateImage" value="{{url('userimages/state2.png')}}">
            {{ HTML::script('Scripts/maplabel.js')}}

            <div id="user_id" class="hidden">{{auth()->user()->id}}</div>
            {{ HTML::script('Scripts/app.js')}}
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