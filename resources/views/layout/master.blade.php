<!DOCTYPE html>
<html>
@include('includes.head')
<body class="menubar-pin header-fixed">
@include('includes.navigationBar')
        <!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN CONTENT-->
    <div id="content">
{{--@include('includes.segment')--}}
        @yield('contents')
    </div><!--end #content-->
    <!-- END CONTENT -->
    @include('includes.sidebar')
@include('includes.footer')
</body>
</html>
