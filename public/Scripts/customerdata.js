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
var dataexcel = [];
var table = "";
var user_role = document.getElementById('user_role').value;
//var user_id = document.getElementById('user_id').innerHTML;
var dataCount=0;
var lastCount=0;
var nextCount=0;
var dataLim=10;
function setData(data) {
    dataCount=data.length;
    lastCount= nextCount;
    nextCount=lastCount + dataLim;
    for (var x = lastCount; x < nextCount; x++) {
        if(x<dataCount){
            var addr = data[x].site_latitude + ", " + data[x].site_longitude;
            table.row.add(["<a class='btn btn-primary' data-value='" +
            data[x].customer_note_id + "' href='/Customer/ViewBill/" +
            data[x].customer_note_id + "'>View Bills</a>",
                (user_role == 6 ? "<a class='btn btn-danger' onclick='delData(" + data[x].customer_note_id + ")'>Delete</a>" : ""),
                data[x].mda_name,
                data[x].government_level,
                data[x].parent_fed_minis_name,
                data[x].sector_name,
                data[x].site_address,
                addr,
                data[x].closet_landmark,
                data[x].village,
                data[x].town,
                data[x].city,
                data[x].lga_name,
                data[x].state_name,
                data[x].disco_name,
                data[x].business_unit,
                data[x].disco_acct_number,
                data[x].customer_type,
                data[x].customer_class,
                data[x].meter_installed ? "Yes" : "No",
                data[x].meter_no,
                data[x].meter_type,
                data[x].meter_brand,
                data[x].meter_model
            ]).draw();

        }

    }

    if(lastCount<dataCount){
        setTimeout(function(){setData(data)},1);
    }
}
function resetCount(){
    dataCount=0;
    lastCount=0;
    nextCount=0;
    dataLim=10;
}
function getCustomerNote() {
    url = $("#getCustomerNote").val();
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $('#datatables-4').DataTable().clear().draw();
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            //console.log(data);
            if (data.length == 0) {
                status = false;
            }
            else if ((data !== undefined || data.length != 0) && status) {
                 resetCount();setData(data);

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
        $('#datatables-4').DataTable().clear().draw();
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
    url = $("#getCustomerNote").val();
    $.ajax({
        type: 'GET',
        url: url,
        data: {start_date: start_date, end_date: end_date},
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            console.log(data);
            if (data.length == 0) {
                status = false;
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setData(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        if (status === true) {
            //getEneryAudit();
        }

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
    url = $("#getCustomerNote").val();
    $.ajax({
        type: 'GET',
        url: url,
        data: {state_name: state_name, local_gov_name: loc_gov_name},
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            console.log(data);
            if (data.length == 0) {
                status = false;
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setData(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        if (status === true) {
            //getEneryAudit();
        }

    });
}

function filterByMinistry() {
    url = $("#getCustomerNote").val();
    $.ajax({
        type: 'GET',
        url: url,
        data: {parent_fed_name: par_name},
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            console.log(data);
            if (data.length == 0) {
                status = false;
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setData(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        if (status === true) {
            //getEneryAudit();
        }

    });
}

function filterByDisco() {
    url = $("#getCustomerNote").val();
    $.ajax({
        type: 'GET',
        url: url,
        data: {disco_name: disco_name},
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function (data) {
            $("#message").hide();
            console.log(data);
            if (data.length == 0) {
                status = false;
            }
            else if ((data !== undefined || data.length != 0) && status) {
                setData(data);

            }
        },
        error: function (data) {
            console.log(data)
        }
    }).done(function () {

        if (status === true) {
            //getEneryAudit();
        }

    });
}


function delData(id) {
    url = $("#deleteCustomerData").val();
    url = url + "/" + id;
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $("#message").show();
        },
        success: function () {
            $("#message").hide();
            getCustomerNote();
        },
        error: function (data) {
            console.log(data);
            $("#message").hide();
            getCustomerNote();
        }
    }).done(function () {

        if (status === true) {
            // getEneryAudit();
        }

    });
}

function reloadPage() {
    window.location.reload();
}


$(document).ready(function () {
    table = $('#datatables-4').DataTable({"ordering": false});
    getCustomerNote();
    daterange();
    $("#message").hide();
    if ($("#State").val()) {
        var ddlLgas = $("#Region");
        var region = localStorage.getItem('region');
        //$("#Region option[value='" + region + "']").attr('selected', true);
        getRegion($("#State").val(), ddlLgas);
    }
    $("#State").click(function () {
        var selectedItem = $(this).val();
        var ddlLgas = $("#Region");
        localStorage.removeItem("region");
        getRegion(selectedItem, ddlLgas);

    });
    $("#Region").change(function () {
        status2 = true;
        $('#datatables-4').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        par_name = $("#Minis").val();
        disco_name = $("#Disco").val();
        limstate = 0;


        filterByRegion();
    });

    $("#Minis").change(function () {
        status5 = true;
        $('#datatables-4').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        par_name = $("#Minis").val();
        disco_name = $("#Disco").val();
        limparent = 0;
        //console.log(limparent);
        filterByMinistry();
    });

    $("#Disco").change(function () {
        status4 = true;
        $('#datatables-4').DataTable().clear().draw();
        state_name = $("#State").val();
        loc_gov_name = $("#Region").val();
        par_name = $("#Minis").val();
        disco_name = $("#Disco").val();
        limdisco = 0;
        console.log(limdisco);
        filterByDisco();
    });

    $("#reloadenergy").click(function () {
        //alert("cool");
        $("#customerform")[0].reset();
        status = true;
        val = 0;
        getCustomerNote();
        //reloadPage();
    })

    //resetButton.onclick = reloadPage;

});