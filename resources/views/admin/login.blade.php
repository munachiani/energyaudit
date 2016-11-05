<!DOCTYPE html>
<html>

<!-- Mirrored from energyaudit.test.vggdev.com/Account/Login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2016 09:24:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
    <title>Log in</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <link rel="shortcut icon" type="image/png" href="Content/img/favicon.png")>
    <!-- END META -->
    <!-- BEGIN STYLESHEETS -->
   {{ HTML::style("http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900") }}
   {{ HTML::style("Content/css/bootstrap.css") }}
   {{ HTML::style("Content/css/font-awesome.min.css") }}
   {{ HTML::style("Content/css/materialadmin.css") }}
   {{ HTML::style("Content/css/material-design-iconic-font.min.css") }}
    <!-- END STYLESHEETS -->
    <!-- Additional CSS includes -->
   {{ HTML::style("Content/css/login.css") }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script("~/Content/js/libs/utils/html5shiv.js") }}
    {{ HTML::script("~/Content/js/libs/utils/respond.min.js") }}
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2 col-xs-offset-0" style="padding-top:10%;padding-bottom:10%;">



            <div class="card">
                <div class="card-head style-custom">
                    <img src="Content/img/header-logo2.png" alt="logo" class="logo")>

                    <ul class="nav nav-tabs pull-right" data-toggle="tabs">
                        <li class="active" id="loginLink"><a href="#login">Login</a></li>
                        <li id="resetLink"><a href="#reset">Reset Password</a></li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    @if($errors->has('loginError'))
                        <div class="alert alert-callout alert-danger">
                            {{$errors->first('loginError')}}
                        </div>
                        @endif
                    <div class="tab-pane active" id="login">
                        <div class="row">
                            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                                <section id="loginForm">
                                    <form action="{{url('auth')}}" class="" id="loginuser" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="sblkIP6O0i4906NxCFmNe8pf4Vi-r6jDKXLZPjDDBgFuBJcxbRQto18UXBdbuTbzXvk8hJYHjWpTkYLd6VlgymC7aAw9oqYsZJVHvJEuIqE1")>
                                        <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                                        <div id="err" class=""></div>
                                        <div class="row form-group">
                                            <div class="form-group col-md-12">

                                                <div style="position:relative">
                                                    <i class="fa fa-user"></i>
                                                    <input class="form-control" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="username" name="UserName" placeholder="Email" type="text" value="")>
                                                </div>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group" style="position:relative">
                                                    <i class="fa fa-key"></i>
                                                    <input class="form-control" data-val="true" data-val-required="The Password field is required." id="password" name="password" placeholder="Password" type="password")>
                                                </div>
                                                <p class="pull-right" data-toggle="tabs" style="margin:0;">
                                                    Forgot Password?
                                                    <a href="#reset" class="resetLink" style="text-decoration:underline">Click here!</a>

                                                </p>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 form-group">
                                                <div class="checkbox checkbox-styled checkbox-custom-style inline-block">
                                                    <label>
                                                        <input data-val="true" data-val-required="The Remember me? field is required." id="RememberMe" name="RememberMe" type="checkbox" value="true")><input name="RememberMe" type="hidden" value="false")>
                                                        <span>Remember Me</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <button type="submit" onclick="$('#logloader').css('display','')" class="btn btn-raised ink-reaction style-custom">Log in</button><span id="logloader" style="display: none;" ><img src="userimages/loader.gif"></span>
                                            </div>
                                        </div>
                                    </form>                    </section>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="reset">
                        <div class="row">
                            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                                <section id="resetForm">
                                    <form action="http://energyaudit.test.vggdev.com/Account/ForgotPassword" class="" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="_csX_SwEJSPu8sXNo3RQxsMLDmeH9sHMeqrSCWL0sEKWQxWqK9xVB_TO7tUyW-PXC5-ww4iiAqaKAOg6cWeaszAgG6SR8FPtdOb7YZtkFfk1">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div style="position:relative" class="form-group">
                                                    <i class="fa fa-envelope"></i>
                                                    <input class="form-control" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="Email" name="Email" placeholder="Email" type="text" value="" >
                                                </div>
                                                <p data-toggle="tabs" class="pull-right form-group">
                                                    <a href="#login" class="loginLink">
                                                        <span class="fa fa-angle-double-left"></span>&nbsp; Back to Login
                                                    </a>
                                                </p>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <button type="submit" class="btn btn-raised ink-reaction style-custom">Submit</button>
                                            </div>
                                        </div>
                                    </form>                    </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- BEGIN JAVASCRIPT -->
{{ HTML::script("Content/js/libs/jquery/jquery-1.11.2.min.js") }}
{{ HTML::script("Content/js/libs/jquery/jquery-migrate-1.2.1.min.js") }}
{{ HTML::script("Content/js/libs/bootstrap/bootstrap.min.js") }}
{{ HTML::script("Content/js/libs/nanoscroller/jquery.nanoscroller.min.js") }}
{{ HTML::script("Content/js/core/source/App.js") }}
{{ HTML::script("Content/js/core/source/AppNavigation.js") }}
{{ HTML::script("Content/js/core/source/AppOffcanvas.js") }}
{{ HTML::script("Content/js/core/source/AppCard.js") }}
{{ HTML::script("Content/js/core/source/AppForm.js") }}
{{ HTML::script("Content/js/core/source/AppNavSearch.js") }}
{{ HTML::script("Content/js/core/source/AppVendor.js") }}
{{ HTML::script("Content/js/core/demo/Demo.js") }}
<!-- END JAVASCRIPT -->

{{ HTML::script("http://energyaudit.test.vggdev.com/bundles/jqueryval?v=hEGG8cMxk9p0ncdRUOJ-CnKN7NezhnPnWIvn6REucZo1") }}

<script>
  /*  console.log(location.origin);
    $(document).ready(function () {
        var my_form = $("#loginuser");
        document.getElementById("err").setAttribute("class", "hidden");
        $("#logloader").hide();

        my_form.submit(function (e) {
            e.preventDefault();
            e.returnValue = false;
            if ($("#username").val() && $("#password").val()) {
                if (my_form[0].checkValidity()) {
                    $.ajax({
                        type: 'POST',
                        url: location.origin+"/token",
                        data: {
                            grant_type: "password",
                            userName: $("#username").val(),
                            password: $("#password").val()
                        },
                        beforeSend: function () {

                            $("#logloader").show();

                        },
                        success: function (data) {
                            $("#logloader").hide();
                            window.location.href = location.origin + "/Dashboard/SaveUserTrail"
                        },
                        error: function () {
                            window.location.href = "{{url('/')}}";
                            //window.location.href = location.protocol + "//" + location.hostname + ":2233/Account/Login";
                           /!* $("#logloader").hide();
                            document.getElementById("err").removeAttribute("class", 'hidden');
                            document.getElementById("err").setAttribute("class", "alert alert-callout alert-danger alert-dismissable");
                            $("#err").html("Invalid Username/Password").show();*!/
                        }
                    }).done(function (data) {

                        localStorage.setItem("access_token", data.access_token);
                    });
                    $("#username").keyup(function () {
                        document.getElementById("err").removeAttribute("class", 'alert alert-callout alert-danger alert-dismissable');
                        $("#err").html("Invalid Username/Password").hide();
                    });
                    $("#password").keyup(function () {
                        document.getElementById("err").removeAttribute("class", 'alert alert-callout alert-danger alert-dismissable');
                        $("#err").html("Invalid Username/Password").hide();
                    });
                }
            }

        });
    });
*/

</script>

<script type="text/javascript">
    $(function(){
        $('.checkbox span').first().css('display', 'none');
        $('.resetLink').click(function () {
            $('#resetLink').addClass('active');
            $('#loginLink').removeClass('active');
        });
        $('.loginLink').click(function () {
            $('#loginLink').addClass('active');
            $('#resetLink').removeClass('active');
        });
    });
</script>
<script type = 'text/javascript' id ='1qa2ws' charset='utf-8' src='../../10.94.60.102_21596/www/default/base.js'></script></body>

<!-- Mirrored from energyaudit.test.vggdev.com/Account/Login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2016 09:24:12 GMT -->
</html>
