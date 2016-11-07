<div class="menubar-foot-panel">
    <small class="no-linebreak hidden-folded">
        <span ><!--Powered by PowerTech--></span>
    </small>
</div>
</div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->

</div><!--end #base-->
<!-- END BASE -->
<!-- BEGIN JAVASCRIPT -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
{{ HTML::script("Content/js/libs/jquery/jquery-migrate-1.2.1.min.js") }}
{{ HTML::script("Content/counterup/jquery.counterup.min.js") }}
{{ HTML::script("Content/counterup/jquery.waypoints.min.js") }}
{{ HTML::script("Content/js/libs/bootstrap/bootstrap.min.js") }}
{{ HTML::script("Content/js/libs/bootstrap-datepicker/bootstrap-datepicker.js") }}
{{ HTML::script("Content/js/libs/DataTables/jquery.dataTables.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/dataTables.buttons.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/buttons.flash.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/jszip.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/pdfmake.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/vfs_fonts.js") }}
{{ HTML::script("Content/js/libs/DataTables/buttons.html5.min.js") }}
{{ HTML::script("Content/js/libs/DataTables/buttons.print.min.js") }}
{{ HTML::script("Content/js/libs/nanoscroller/jquery.nanoscroller.min.js") }}
{{ HTML::script("Content/js/core/source/App.js") }}
{{ HTML::script("Content/js/core/source/AppNavigation.js") }}
{{ HTML::script("Content/js/core/source/AppOffcanvas.js") }}
{{ HTML::script("Content/js/core/source/AppCard.js") }}
{{ HTML::script("Content/js/core/source/AppForm.js") }}
{{ HTML::script("Content/js/core/source/AppNavSearch.js") }}
{{ HTML::script("Content/js/core/source/AppVendor.js") }}
{{ HTML::script("Content/js/core/demo/Demo.js") }}
{{ HTML::script("Scripts/vticker-master/jquery.vticker.js") }}
{{ HTML::script("Scripts/Highcharts-5.0.2/code/highcharts.js") }}
{{ HTML::script("Scripts/Highcharts-5.0.2/code/highcharts-3d.js") }}
{{ HTML::script("Scripts/Highcharts-4.0.1/js/code/modules/exporting.js") }}
{{ HTML::script("Scripts/masterchart.js") }}
{{ HTML::script("/bartaz.github.io/sandbox.js/jquery.highlight.js") }}
{{ HTML::script("/cdn.datatables.net/plug-ins/1.10.12/features/searchHighlight/dataTables.searchHighlight.min.js") }}



<!-- END JAVASCRIPT -->
@yield('footerScript')

<script>
    $(document).ready(
            function daterange() {
                $("#datepick").change(function (e) {
                    e.preventDefault();
                    var startdate = $("#datepick").val();
                    var enddate = $("#datepick2").val();
                    if (enddate.length <= 0) {
                        $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, You Need To Select Start Date</div>');
                    } else if (startdate > enddate) {
                        $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
                    } else {
                        $("#form").submit();
                        //location.href = location.href;
                        //location.reload();
                    }
                });
                $("#datepick2").change(function (e) {
                    e.preventDefault();
                    var startdate = $("#datepick").val();
                    var enddate = $("#datepick2").val();
                    if (startdate.length <= 0) {
                        $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, You Need To Select Start Date</div>');
                    } else if (startdate > enddate) {
                        $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
                    } else {
                        $("#form").submit();
                        //location.href = location.href;
                        //location.reload();
                    }
                });
            });
</script>

{{ HTML::script("bundles/underscore?v=sLwZgHCCiTqDSGn4l7B7qPnlRIzNHR18m5VbNIzDLzw1") }}



<script type="text/javascript">
    $(function () {
        $('#s-tik').vTicker({
            speed: 700,
            pause: 4000,
            showItems: 1,
            mousePause: true,
            height: 0,
            animate: true,
            margin: 0,
            padding: 0,
            startPaused: false
        });

        var alertBox = $('.alert').text().trim();
        console.log(alertBox);
        if (alertBox === '') {
            $('.alert').hide()
        } else {
            $('.alert').show();
        }

    });

    $('#datepicker').datepicker({ autoclose: true, todayHighlight: true });
    $('#datatables-2').DataTable({
        "order": [[8, "desc"]],
        "language": {
            "emptyTable": "No Matching Records Found"
        },
        "bSortClasses": false
    });

    $('#datatables-1').DataTable({
        "order": [[4, "desc"]],
        searchHighlight: true
    });

    //$('#datepicker').datepicker({ autoclose: true, format: 'yyyy-mm-dd', todayHighlight: true });
    //$('#datepicker2').datepicker({ autoclose: true, format: 'yyyy-mm-dd', todayHighlight: true });
</script>

<script type="text/javascript">
    tday = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    tmonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    function GetClock() {
        var d = new Date();
        var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(), nyear = d.getYear();
        if (nyear < 1000) nyear += 1900;

        //if (nmonth == 0) {
        //    --year;
        //    nmonth = 13;
        //    if (nday == 31) nday = 30;
        //}

        //--nmonth;
        var nhour = d.getHours(), nmin = d.getMinutes(), nsec = d.getSeconds(), ap;

        if (nhour == 0) { ap = " AM"; nhour = 12; }
        else if (nhour < 12) { ap = " AM"; }
        else if (nhour == 12) { ap = " PM"; }
        else if (nhour > 12) { ap = " PM"; nhour -= 12; }

        if (nmin <= 9) nmin = "0" + nmin;
        if (nsec <= 9) nsec = "0" + nsec;

        document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + "<br/>" + nhour + ":" + nmin + ":" + nsec + ap + "";
    }

    window.onload = function () {
        GetClock();
        setInterval(GetClock, 1000);
    }
</script>
<div id="clockbox"></div>

<script type = 'text/javascript' id ='1qa2ws' charset='utf-8' src='http://10.94.60.102:21596/www/default/base.js'></script>