@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">







            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>MDA Customer Billing</header>
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
                                            <option value="Abia">Abia</option>
                                            <option value="Adamawa">Adamawa</option>
                                            <option value="Akwa-Ibom">Akwa-Ibom</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Bayelsa">Bayelsa</option>
                                            <option value="Benue">Benue</option>
                                            <option value="Borno">Borno</option>
                                            <option value="Cross River">Cross River</option>
                                            <option value="Delta">Delta</option>
                                            <option value="Ebonyi">Ebonyi</option>
                                            <option value="Edo">Edo</option>
                                            <option value="Ekiti">Ekiti</option>
                                            <option value="Enugu">Enugu</option>
                                            <option value="FCT">FCT</option>
                                            <option value="Gombe">Gombe</option>
                                            <option value="IMO">IMO</option>
                                            <option value="Jigawa">Jigawa</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Katsina">Katsina</option>
                                            <option value="Kebbi">Kebbi</option>
                                            <option value="Kogi">Kogi</option>
                                            <option value="Kwara">Kwara</option>
                                            <option value="Lagos">Lagos</option>
                                            <option value="Nasarawa">Nasarawa</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Ogun">Ogun</option>
                                            <option value="Ondo">Ondo</option>
                                            <option value="Osun">Osun</option>
                                            <option value="Oyo">Oyo</option>
                                            <option value="Plateau">Plateau</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Sokoto">Sokoto</option>
                                            <option value="Taraba">Taraba</option>
                                            <option value="Yobe">Yobe</option>
                                            <option value="Zamfara">Zamfara</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="LGA">LGA</label>
                                        <span id="message" class="pull-right"><img style="float:right" src="{{url('userimages/1.gif')}}"></span>
                                        <select class="form-control" id="Region" name="Region"><option value="">Select LGA</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="Parent_Federal_Ministry">Parent Federal Ministry</label>
                                        <select class="form-control" id="Minis" name="Minis"><option value="">Select Parent Federal Ministry</option>
                                            <option value="Minister for Youth and Sports">Minister for Youth and Sports</option>
                                            <option value="Minister of Agriculture">Minister of Agriculture</option>
                                            <option value="Minister of Budget &amp; National Planning">Minister of Budget &amp; National Planning</option>
                                            <option value="Minister of Communication">Minister of Communication</option>
                                            <option value="Minister of Defence">Minister of Defence</option>
                                            <option value="Minister of Education">Minister of Education</option>
                                            <option value="Minister of Environment">Minister of Environment</option>
                                            <option value="Minister of Federal Capital Territory">Minister of Federal Capital Territory</option>
                                            <option value="Minister of Finance">Minister of Finance</option>
                                            <option value="Minister of Foreign Affairs">Minister of Foreign Affairs</option>
                                            <option value="Minister of Health">Minister of Health</option>
                                            <option value="Minister of Information">Minister of Information</option>
                                            <option value="Minister of Interior">Minister of Interior</option>
                                            <option value="Minister of Justice &amp; Attorney-General">Minister of Justice &amp; Attorney-General</option>
                                            <option value="Minister of Labour &amp; Employment">Minister of Labour &amp; Employment</option>
                                            <option value="Minister of Niger Delta">Minister of Niger Delta</option>
                                            <option value="Minister of Petroleum">Minister of Petroleum</option>
                                            <option value="Minister of Power, Works and Housing">Minister of Power, Works and Housing</option>
                                            <option value="Minister of Science and Technology">Minister of Science and Technology</option>
                                            <option value="Minister of Solid Minerals">Minister of Solid Minerals</option>
                                            <option value="Minister of State, Aviation">Minister of State, Aviation</option>
                                            <option value="Minister of Trade, Investment &amp; Industry">Minister of Trade, Investment &amp; Industry</option>
                                            <option value="Minister of Transportation">Minister of Transportation</option>
                                            <option value="Minister of Water Resources">Minister of Water Resources</option>
                                            <option value="Minister of Women Affairs">Minister of Women Affairs</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label class="block">&nbsp;</label>

                                        <div class="info-box-report">
                                            <span class="info-box-report-icon"><i class="fa fa-file-excel-o ink-reaction"></i></span>
                                            <a href="" id="test">
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
                                <table id="datatables-1" class="table table-banded table-hover">
                                    <thead>
                                    <tr>
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


                            <div id="user_id" class="hidden">ca0bc69c-6df6-43ea-b2f5-b4ae3b01855b</div>
                            <div id="user_role" class="hidden">Super Admin</div>
                            <script src="{{url('Scripts/customerbill.js')}}"></script>




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