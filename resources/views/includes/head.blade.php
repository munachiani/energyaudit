<head>
    <title>@yield('pageTitle') - Energy Audit Portal </title>


    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->
    <link rel="shortcut icon" href="{{ url('Content/img/favicon.png') }}">
    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css' />
   {{ HTML::style("Content/css/bootstrap.css") }}
   {{ HTML::style("Content/css/font-awesome.min.css") }}
   {{ HTML::style("Content/css/materialadmin.css") }}
   {{ HTML::style("Content/css/material-design-iconic-font.min.css") }}
   {{ HTML::style("Content/css/libs/DataTables/jquery.dataTables.css") }}
   {{ HTML::style("Content/css/libs/bootstrap-datepicker/datepicker3.css") }}
   {{ HTML::style("/cdn.datatables.net/plug-ins/1.10.12/features/searchHighlight/dataTables.searchHighlight.css") }}
    <!-- END STYLESHEETS -->
    <!-- Additional CSS includes -->
   {{ HTML::style("Content/css/style.css") }}
    {{ HTML::script("Content/js/libs/jquery/jquery-1.11.2.min.js") }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   {{ HTML::script("Content/js/libs/utils/html5shiv.js") }}
   {{ HTML::script("Content/js/libs/utils/respond.min.js") }}

    <![endif]-->

</head>
@yield('pageStyles')