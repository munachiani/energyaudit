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
            <script src="{{url('Scripts/maplabel.js')}}"></script>

            <div id="user_id" class="hidden">ca0bc69c-6df6-43ea-b2f5-b4ae3b01855b</div>
            <script src="{{url('Scripts/app.js')}}"></script>
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