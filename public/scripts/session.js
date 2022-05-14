$(document).ready(function(){
    $("#sessioncode").focus();
    var sessiondatatableurl = $("#sessiondatatableurl").val();
    //data table reloader
    var sessionlisttable = $('#sessionlisttable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: sessiondatatableurl,
            dataSrc: 'sessiontabledata'
        },
        //'session_code', 'session_duration'
        columns: [
            {data: "session"},
            { 
                data: "activeflag",
            },
            { 
                "data": "session_id",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editAction(this)">Edit</a>';                       
                   }else{
                       data = 'Edit&nbsp;|&nbsp;Delete';
                   }
                   return data;
                }
           },
        ]
    });
    $("#sessionsetupform").submit(function(e){
        e.preventDefault();
        //validate session duration
        var sessionDuration = $("#rangeCalendarFlatpickr").val();
        if(sessionDuration == "") {
            $("#session_duration_format_info").css("color", "red");
            $("#session_duration_format_info").css("fontSize", "18px");
            $("#session_duration_format_info").text('Please select session duration...');
            $("#session_duration_format_info").fadeOut(4000);
            $("#rangeCalendarFlatpickr").focus();
        }else {   
            //input formatter
            var sessionCode, sessionCodeLeft, sessionCodeRight, sessionDuration, sessionDurationLeft, sessionDurationRight;
            sessionCode             = $("#sessioncode").val().trim(); 
            sessionCodeLeft         = parseInt(sessionCode.substr(0,4));
            sessionCodeRight        = parseInt(sessionCode.substr(-4));
            sessionCode             = sessionCodeLeft + "/" + sessionCodeRight;
            sessionDuration         = $("#rangeCalendarFlatpickr").val().trim();
            sessionDurationLeft     = sessionDuration.substr(0,10);
            sessionDurationLeft     = parseInt(sessionDuration.substr(0,4));
            sessionDurationRight    = sessionDuration.substr(-10);
            sessionDurationRight    = parseInt(sessionDurationRight.substr(0,4));
            //validate session
            if(sessionCodeLeft + 1 === sessionCodeRight) {
                if(sessionDurationLeft + 1 === sessionDurationRight) {
                    //compare session code with session duration
                    if(sessionCodeLeft === sessionDurationLeft) {
                        //posturl
                        var posturl = $("#posturl").val();
                        var editurl = $("#editurl").val();
                        $("#btntest").attr("disabled","disabled");
                        $("#btntest").html('posting data...');
                        $("#notifier").addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
                        var form = document.getElementById('sessionsetupform');
                        var formdata = new FormData(form);
                        //get button value for manipulation
                        var btnvalue = $("#btnsubmit").val();
                        if(btnvalue == 'Submit'){
                            var targeturl = posturl;
                            var btntext = "Submit";
                            $.ajax({
                                url: targeturl, // point to server-side controller method
                                dataType: 'text', // what to expect back from the server
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formdata,
                                type: 'post',
                                success: function (data) {
                                    data = $.parseJSON(data);
                                    data = data.success;
                                    if(data == 1){
                                        alert("Record added successfully");
                                        //$("#btnsubmit").removeAttr("disabled");
                                        //$("#btnsubmit").html(btnsubmit);
                                        $("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                                        $("#sessioncode").val('');
                                        $("#rangeCalendarFlatpickr").val('');
                                       // $("#btnsubmit").val('Submit').text(btntext);
                                        sessionlisttable.ajax.reload();
                                    }else if(data == 2) {
                                        alert("Record already exist");
                                        //$("#btnsubmit").removeAttr("disabled");
                                        //$("#btnsubmit").html(btnsubmit);
                                        $("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                                        $("#sessioncode").focus();
                                        //$("#btnsubmit").val('Submit').text(btntext);
                                        sessionlisttable.ajax.reload();
                                    }else if(data == '-1'){
                                        console.log("Invalid file format")
                                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                        //$("#btnsubmit").removeAttr("disabled");
                                        //$("#btnsubmit").html(btnsubmit);
                                        console.log(data + 'Data error');
                                        return false;
                                    }else{
                                        console.log("Invalid file format")
                                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                        //$("#btnsubmit").removeAttr("disabled");
                                       // $("#btnsubmit").html(btnsubmit);
                                        alert(data + 'data')
                                        console.log(data + 'Data error');
                                        return false;
                                    }
                                },
                                error: function (data) {
                                    alert('error:'+data);
                                    //$("#btnsubmit").removeAttr("disabled");
                                    //$("#btnsubmit").html(btnsubmit);
                                    console.log( "error occured: " + error.message );
                                    notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                                    $("#notifier").addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                                    return false;
                                }
                            });
                        }else{
                            //update 
                            var targeturl = editurl
                            var btntext = "Update";
                            var session_id = $("#sessionid").val();
                            $.ajax({
                                url: targeturl, // point to server-side controller method
                                dataType: 'text', // what to expect back from the server
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formdata,
                                type: 'post',
                                success: function (data) {
                                    data = $.parseJSON(data);
                                    data = data.success;
                                    if(data == 0){
                                        console.log("File upload error")
                                        $("#btnsubmit").removeAttr("disabled");
                                        $("#btnsubmit").html(btnsubmit);
                                    }else{
                                        $("#btnsubmit").removeAttr("disabled");
                                        $("#btnsubmit").html(btnsubmit);
                                        $("#sessioncode").val(''); $("#sessioncode").attr('disabled', false); 
                                        $("#rangeCalendarFlatpickr").val('');
                                        $("#btnsubmit").val('Submit').text('Submit');
                                        sessionlisttable.ajax.reload();
                                    }
                                },
                                error: function (data) {
                                    $("#btnsubmit").removeAttr("disabled");
                                    $("#btnsubmit").html(btnsubmit);
                                    console.log( "error occured: " + error.message );
                                    notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                                    return false
                                }
                            });
                        }                        
                    }else{
                        alert('Wrong session combinations');
                        $("#sessioncode").focus();
                    }
                }else {
                    alert('Session duration is in wrong format');
                    $("#rangeCalendarFlatpickr").focus();
                }
            }else {
                $("#session_code_format_info").css("color", "red");
                $("#session_code_format_info").css("fontSize", "18px");
                $("#session_code_format_info").text('Session code in in wrong format');
                $("#session_code_format_info").fadeOut(4000);
                $("#sessioncode").focus();                
            }
        }
    })
})


