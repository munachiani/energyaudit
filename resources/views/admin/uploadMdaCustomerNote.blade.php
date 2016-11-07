    @extends('layout.master')
    @section('pageTitle')
        Upload MDA Customer Profile
        @stop
    @section('contents')
        <section>
            <div class="section-body">



                <div class="card">
                    <div class="card-head card-head-sm style-custom">
                        <header>
                            Upload excel sheet (Upload MDA Customer Profile)
                            <small class="pull-right">
                                <a href="{{url('dashboard')}}">
                                    <i class="fa fa-angle-double-left"></i>&nbsp; Back to Dashboard
                                </a>
                            </small>
                        </header>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @if (Session::has('flash_message'))
                                <div class="alert alert-callout alert-success">
                                    {{ session('flash_message') }}
                                </div>
                            @endif
                                @if ($errors->has('uploadError'))
                                    <div class="alert alert-callout alert-error">
                                        {{ $errors->first('uploadError') }}
                                    </div>
                                @endif

                            <form action="{{url('Customer/UploadCustomerNote')}}" method="post" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 form-group">

                                        <label for="file">Upload excel file: (must be .xls or .xlsx)</label>
                                        <input type="file" name="file" accept=".xls, .xlsx" id="file" class="form-control" required />

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 form-group">
                                        <input type="submit" value="Upload" class="submit btn btn-raised ink-reaction btn-default" id="upload" />
                                        <img id="loading-image" src="{{url('Content/img/default.gif')}}" alt="Loading..." hidden/>
                                    </div>
                                </div>
                            </form>
                            <span class="alert alert-info">Please note that the excel sheet to be uploaded should be in the same format as the approved template. <a href="{{url('userimages/MDA_Debt_Sample.xlsx')}}" class="btn btn-danger">Click here</a> to download a template of the approved format</span>
                        </div>
                    </div>
                </div>


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
                                            &copy; Copyright {{date('Y')}} - Advisory Power Team. All rights reserved.
                                        </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $("form").submit(function () {
                $("#loading-image").show();
            });
        </script>

    @stop