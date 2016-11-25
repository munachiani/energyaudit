//var alldata = [];
var status = true;
var status1 = true;
var status2 = true;
var status3 = true;
var status4 = true;
var status5 = true;
var val = 0;
var limstate = 0;
var limdate = 0;
var limpick = 0;
var limdisco = 0;
var limparent = 0;
var start_date = "";
var end_date = "";
var by_pick = "";
var state_name = "";
var loc_gov_name = "";
var disco_name = "";
var par_name = "";
var keypage = true;
var table = "";
var dataCount=0;
var lastCount=0;
var nextCount=0;
var dataLim=10;
var progress=document.getElementById('progress');
var progressbar=document.getElementById('progressbar');
var perc=0;
function setAudit(data) {
    dataCount=data.length;
    lastCount= nextCount;
    nextCount=lastCount + dataLim;
    for (var x = lastCount; x < nextCount; x++) {
        if(x<dataCount){
            table.row.add([data[x].state_name,
                data[x].local_gov_name,
                data[x].distribution_company,
                data[x].address,
                data[x].mda_name,
                data[x].parent_federal_ministry,
                data[x].avg_electricity_bill_per_month,
                data[x].num_of_generators,
                data[x].generator_running,
                data[x].num_of_years_at_location,
                data[x].contact_of_mda_head,
                data[x].telephone
            ]).draw();

            perc=(nextCount/dataCount*100).toFixed(2);
            if(perc<90){
                progressbar.style.width=perc +"%";
                progress.style.display="";
            }
            else{
                progress.style.display="none";
            }

        }



    }

    if(lastCount<dataCount){
        setTimeout(function(){setAudit(data)},0);
    }
}
function resetCount(){
    dataCount=0;
    lastCount=0;
    nextCount=0;
    dataLim=10;
    perc=0;
}
function getEneryAudit() {
    url = $("#getEneryAuditUrl").val();
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            console.log(data);
            if (data.length == 0) {
                status = false;
                progress.style.display="none";

            }
            else if ((data !== undefined || data.length != 0) && status) {
                resetCount(); setAudit(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        if (status === true) {
            getEneryAudit();
        }

    });
}

function daterange() {
    $("#datepick2").change(function (e) {
        e.preventDefault();
        //e.returnValue = false;
        //console.log("cool");
        limdate = 0;
        status1 = true;
        $('#datatables-3').DataTable().clear().draw();
        start_date = $("#datepick").val();
        end_date = $("#datepick2").val();

        if (start_date.length <= 0) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, You Need To Select Start Date</div>');
        } else if (start_date > end_date) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
        } else if (start_date > 0 && start_date > end_date) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
        } else {
            $(".validatemessage").html('');
            filterByDate();
            //$("form").submit();
        }
    });
    $("#datepick").change(function (e) {
        e.preventDefault();
        e.returnValue = false;
        limdate = 0;
        status1 = true;
        $('#datatables-3').DataTable().clear().draw();
        var startdate = $("#datepick").val();
        var enddate = $("#datepick2").val();
        start_date = startdate;
        end_date = enddate;
        //.log(startdate);
        if (enddate.length <= 0) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, You Need To Select Start Date</div>');
        } else if (startdate > enddate) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
        } else if (enddate > 0 && startdate > enddate) {
            $(".validatemessage").html('<div class="alert alert-dismissible alert-danger" id="erroralert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Oops!, Specify Correct Date Range </div>');
        } else {
            $(".validatemessage").html('');
            //if(keypage)
            //filterByDate(startdate, enddate);
            //$("form").submit();
            filterByDate()
        }
    });

    //daterange();
}

function filterByDate() {

    url = $("#getEneryAuditUrl").val();
    //  console.log(url);
    $.ajax({
        type: 'GET',
        url: url,
        data: {start_date: start_date, end_date: end_date},
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (data) {
            console.log(data);
            if (data.length == 0) {
                status = false;
                progress.style.display="none";
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setAudit(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        /*if (status1 === true) {
         filterByDate();
         }*/

    });
}


function getRegion(selectedItem, ddlLgas) {
    var region = localStorage.getItem('region');
    var procemessage = "<option value=''>Please wait...</option>";
    $("#Region").html(procemessage).show();
    url = $("#stateRegionUrl").val();
    $.ajax({
        cache: false,
        type: "GET",
        url: url,
        dataType: "json",
        data: {"id": selectedItem},
        beforeSend: function () {

            $("#message").show();
            //alert(url);
            //ddlLgas.val("Select LGA");
        },
        success: function (data) {
            ddlLgas.html('');
            $("#message").hide();
            if (data.length > 0) {

                ddlLgas.append($('<option></option>').val(null).html("Select LGA"));
                ddlLgas.append($('<option></option>').val("All").html("All"));
                localStorage.setItem("data", JSON.stringify(data));
                $.each(data, function (id, option) {
                    ddlLgas.append($('<option></option>').val(option.Value).html(option.Text));
                    ddlLgas.val(region);
                });
                $("#Region").removeAttr("disabled");

            } else {
                ddlLgas.append($('<option></option>').val('-1').html("N/A"));
            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            //alert('Failed to retrieve Local Governments. ' + thrownError );
        }
    });
};


function filterByRegion() {
    url = $("#getEneryAuditUrl").val();

    $.ajax({
        type: 'GET',
        url: url,
        data: {state_name: state_name, local_gov_name: loc_gov_name},
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (data) {
            console.log(data);
            if (data.length == 0) {
                status = false;
                progress.style.display="none";
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setAudit(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        /*if (status1 === true) {
         filterByDate();
         }*/

    });
}

function filterByPick() {
    var tokenz = localStorage.getItem("access_token");

    var access_token = "bearer " + tokenz;

    $.ajax({
        type: "GET",
        url: location.origin + "/api/energyauditinfo?state_name=" + state_name + "&local_gov_name=" + loc_gov_name + "&distribution_company_name=" + disco_name + "&parent_fed_name=" + par_name + "&lim=" + limpick,
        dataType: 'json',
        headers: {
            Authorization: access_token
        },
        beforeSend: function () {

        },
        success: function (data) {

            //var table = $('#datatables-3').DataTable({ "ordering": false });

            if (data.length == 0) {
                status3 = false;
            }
            else if ((data !== undefined || data.length != 0) && status3) {
                console.log(data);
                for (var x = 0; x < data.length; x++) {
                    table.row.add([data[x].state_name, data[x].local_gov_name, data[x].distribution_company, data[x].address,
                        data[x].mda_name, data[x].parent_federal_ministry, data[x].avg_electricity_bill_per_month, data[x].num_of_generators,
                        data[x].generator_running, data[x].num_of_years_at_location,
                        data[x].contact_of_mda_head, data[x].telephone
                    ]).draw();
                    //alldata.push(dataa[x]);
                }
                //console.log(data);
                limpick += 150;

            }

        },
        error: function () {

        }
    }).done(function () {
        if (status3 === true) {
            filterByPick(by_pick);
        }

    });
}

function filterByDisco() {
    url = $("#getEneryAuditUrl").val();
    console.log(disco_name);
    $.ajax({
        type: 'GET',
        url: url,
        data: {disco_name: disco_name},
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (data) {
            console.log(data);
            if (data.length == 0) {
                status = false;
                progress.style.display="none";
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setAudit(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        /*if (status1 === true) {
         filterByDate();
         }*/

    });
}

function filterByMinistry() {

    url = $("#getEneryAuditUrl").val();
    console.log(par_name);
    $.ajax({
        type: 'GET',
        url: url,
        data: {parent_fed_name: par_name},
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (data) {
            console.log(data);
            if (data.length == 0) {
                status = false;
                progress.style.display="none";
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setAudit(data);
            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        /*if (status1 === true) {
         filterByDate();
         }*/

    });
}


function reloadPage() {
    window.location.reload();
}


$(document).ready(function () {
    table = $('#datatables-3').DataTable({"ordering": false});
    getEneryAudit();
    daterange();
    $("#message").hide();
    if ($("#State").val()) {
        var ddlLgas = $("#Region");
        var region = localStorage.getItem('region');
        //$("#Region option[value='" + region + "']").attr('selected', true);
        getRegion($("#State").val(), ddlLgas);
    }
    $("#State").change(function () {
        var selectedItem = $(this).val();
        var ddlLgas = $("#Region");
        localStorage.removeItem("region");
        getRegion(selectedItem, ddlLgas);

    });
    $("#Region").change(function () {
        status2 = true;
        $('#datatables-3').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        by_pick = $("#By_pick").val();
        disco_name = $("#Disco").val();
        par_name = $("#Minis").val();
        limstate = 0;


        filterByRegion();
    });

    $("#By_pick").change(function () {
        status3 = true;
        $('#datatables-3').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        by_pick = $("#By_pick").val();
        disco_name = $("#Disco").val();
        par_name = $("#Minis").val();

        limpick = 0;

        filterByPick();
    });

    $("#Disco").change(function () {
        status4 = true;
        $('#datatables-3').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        by_pick = $("#By_pick").val();
        disco_name = $("#Disco").val();
        par_name = $("#Minis").val();
        limdisco = 0;

        filterByDisco();
    });

    $("#Minis").change(function () {
        status5 = true;
        $('#datatables-3').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        by_pick = $("#By_pick").val();
        disco_name = $("#Disco").val();
        par_name = $("#Minis").val();
        limparent = 0;
        //console.log(limparent);
        filterByMinistry();
    });

    $("#reloadenergy").click(function () {
        //alert("cool");
        $("#energyform")[0].reset();
        status = true;
        val = 0;
        $(".validatemessage").html('');
        getEneryAudit();
        //reloadPage();
    })

    //resetButton.onclick = reloadPage;

});