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
//var user_role = document.getElementById('user_role').innerHTML;
//var user_id = document.getElementById('user_id').innerHTML;
function getCustomerNote() {
    url = $("#getCustomerNote").val();
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
            }
            else if ((data !== undefined || data.length != 0) && status) {
                for (var x = 0; x < data.length; x++) {
                    var addr = data[x].site_latitude + ", " + data[x].site_longitude;
                    table.row.add(["<a class='btn btn-primary' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/ViewBill/" +
                    data[x].customer_note_id + "'>View Bills</a>",
                     "<a class='btn btn-danger' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                    data[x].customer_note_id + "'>Delete</a>",
                        /*user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                    data[x].customer_note_id + "'>Delete</a>",*/
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
                for (var x = 0; x < data.length; x++) {
                    var addr = data[x].site_latitude + ", " + data[x].site_longitude;
                    table.row.add(["<a class='btn btn-primary' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/ViewBill/" +
                    data[x].customer_note_id + "'>View Bills</a>",
                        "<a class='btn btn-danger' data-value='" +
                        data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                        data[x].customer_note_id + "'>Delete</a>",
                        /*user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
                         data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                         data[x].customer_note_id + "'>Delete</a>",*/
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
                for (var x = 0; x < data.length; x++) {
                    var addr = data[x].site_latitude + ", " + data[x].site_longitude;
                    table.row.add(["<a class='btn btn-primary' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/ViewBill/" +
                    data[x].customer_note_id + "'>View Bills</a>",
                        "<a class='btn btn-danger' data-value='" +
                        data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                        data[x].customer_note_id + "'>Delete</a>",
                        /*user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
                         data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                         data[x].customer_note_id + "'>Delete</a>",*/
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
                for (var x = 0; x < data.length; x++) {
                    var addr = data[x].site_latitude + ", " + data[x].site_longitude;
                    table.row.add(["<a class='btn btn-primary' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/ViewBill/" +
                    data[x].customer_note_id + "'>View Bills</a>",
                        "<a class='btn btn-danger' data-value='" +
                        data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                        data[x].customer_note_id + "'>Delete</a>",
                        /*user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
                         data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                         data[x].customer_note_id + "'>Delete</a>",*/
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
                for (var x = 0; x < data.length; x++) {
                    var addr = data[x].site_latitude + ", " + data[x].site_longitude;
                    table.row.add(["<a class='btn btn-primary' data-value='" +
                    data[x].customer_note_id + "' href='/Customer/ViewBill/" +
                    data[x].customer_note_id + "'>View Bills</a>",
                        "<a class='btn btn-danger' data-value='" +
                        data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                        data[x].customer_note_id + "'>Delete</a>",
                        /*user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
                         data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
                         data[x].customer_note_id + "'>Delete</a>",*/
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

function dataToExcel() {
    // Test script to generate a file from JavaScript such
    // that MS Excel will honor non-ASCII characters.

    testJson = dataexcel;

    // Simple type mapping; dates can be hard
    // and I would prefer to simply use `datevalue`
    // ... you could even add the formula in here.
    testTypes = {
        "customer_note_id": "String",
        "mda_name": "String",
        "government_level": "String",
        "parent_fed_minis_name": "String",
        "sector_name": "String",
        "site_address": "String",
        "site_address_coordinate": "String",
        "closet_landmark": "String",
        "village": "String",
        "town": "String",
        "city": "String",
        "lga_name": "String",
        "state_name": "String",
        "disco_name": "String",
        "business_unit": "String",
        "disco_acct_number": "String",
        "customer_type": "String",
        "customer_class": "String",
        "meter_installed": "String",
        "meter_no": "String",
        "meter_type": "String",
        "meter_brand": "String",
        "meter_model": "String",
        "site_latitude": "String",
        "site_longitude": "String",
        "created_date": "String",
    };

    emitXmlHeader = function () {
        var headerRow = '<ss:Row>\n';
        for (var colName in testTypes) {
            headerRow += '  <ss:Cell>\n';
            headerRow += '    <ss:Data ss:Type="String">';
            headerRow += colName.replace(/_/g, ' ').toUpperCase() + '</ss:Data>\n';
            headerRow += '  </ss:Cell>\n';
        }
        headerRow += '</ss:Row>\n';
        return '<?xml version="1.0"?>\n' +
            '<ss:Workbook xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">\n' +
            '<ss:Worksheet ss:Name="Sheet1">\n' +
            '<ss:Table>\n\n' + headerRow;
    };

    emitXmlFooter = function () {
        return '\n</ss:Table>\n' +
            '</ss:Worksheet>\n' +
            '</ss:Workbook>\n';
    };

    jsonToSsXml = function (jsonObject) {
        var row;
        var col;
        var xml;
        var data = typeof jsonObject != "object" ? JSON.parse(jsonObject) : jsonObject;

        xml = emitXmlHeader();

        for (row = 0; row < data.length; row++) {
            xml += '<ss:Row>\n';

            for (col in data[row]) {
                xml += '  <ss:Cell>\n';
                xml += '    <ss:Data ss:Type="' + testTypes[col] + '">';
                xml += data[row][col] + '</ss:Data>\n';
                xml += '  </ss:Cell>\n';
            }

            xml += '</ss:Row>\n';
        }

        xml += emitXmlFooter();
        return xml;
    };


    //console.log(jsonToSsXml(testJson));
    download = function (content, filename, contentType) {
        if (!contentType) contentType = 'application/octet-stream';
        var a = document.getElementById('test');
        var blob = new Blob([content], {
            'type': contentType
        });
        a.href = window.URL.createObjectURL(blob);
        a.download = filename;
    };

    download(jsonToSsXml(testJson), 'customernotedata.xls', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
}


function reloadPage() {
    window.location.reload();
}


$(document).ready(function () {
    table = $('#datatables-4').DataTable({ "ordering": false });
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