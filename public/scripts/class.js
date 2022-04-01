$(document).ready(function(){
    $("#classtype").focus();
    var classdatatableurl = $("#classdatatableurl").val();

    var classlisttable = $('#classlisttable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: classdatatableurl,
            dataSrc: 'classtabledata'
        },
        
        // 'class_id', 'class_type', 'class_group', 'class_fullname'

        columns: [
            {data: "classtype"},
            {data: "classname"},
            {data: "classgroup"},
            //{data: "surname"},
            { 
                "data": "classid",
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
    } );
    
    $("#classsetupform").submit(function(e){
        e.preventDefault();
        //validate form
        var classtype = $("#classtype").val(); 
        var classgroup = $("#classgroup").val();
        if(classtype == null)  {
            $("#classTypeError").css("color", "red");
            $("#classTypeError").css("fontSize", "18px");
            $("#classTypeError").text('Please select class type...');
            $("#classTypeError").fadeOut(4000);
            $("#classtype").focus();            
        }else {
           if(classgroup == null ) {
                $("#classGroupError").css("color", "red");
                $("#classGroupError").css("fontSize", "18px");
                $("#classGroupError").text('Please select class group...');
                $("#classGroupError").fadeOut(4000);
                $("#classgroup").focus();                 
           } else {
                //posturl
                var posturl = $("#posturl").val();
                var editurl = $("#editurl").val();
                $("#btntest").attr("disabled","disabled");
                $("#btntest").html('posting data...');
                $("#notifier").addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
                var form = document.getElementById('classsetupform');
                var formdata = new FormData(form);                

                var btnvalue = $("#btnsubmit").val();
                //const btnvalue;
                if(btnvalue == 'Submit'){
                    var targeturl = posturl;
                    var btntext = "Add";
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
                            if(data == 1) {
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                console.log( "Data Loaded: " + data );
                                alert("Record saved successfully");
                                //$("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                                $("#classtype")[0].selectedIndex = 0
                                $("#classname").val('');
                                $("#classgroup")[0].selectedIndex = 0;
                                //$("#btnsubmit").val('Submit').text(btnsubmit);
                                console.log('Data about to be refreshed');
                                classlisttable.ajax.reload();
                                console.log('Data refreshed');
                            }else if(data == 2){
                                console.log( "Data Loaded: " + data );
                                alert("Record Already Exist");
                                //$("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record already exist!')
                                //$("#btnsubmit").val('Submit').text(btnsubmit);
                            }else if(data == -1){
                                console.log("Invalid file format")                                
                                $("#classtype")[0].selectedIndex = 0
                                $("#classname").val('');
                                $("#classgroup")[0].selectedIndex = 0
                                $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                console.log(data + 'Data error');
                            }else{
                                console.log("Invalid file format")
                                $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                console.log(data + 'Data error');
                            }
                        },
                        error: function (data) {
                            // $("#btnsubmit").removeAttr("disabled");
                            // $("#btnsubmit").html(btnsubmit);
                            console.log( "error occured: " + error.message );
                            notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                            $("#notifier").addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                            return false
                        }
                    });
                }else{
                     var targeturl = editurl
                    // var btntext = "Update";
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
                            if(data == 1) {
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                alert("Record Updated Successfully");
                                //$("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                                $("#classtype")[0].selectedIndex = 0
                                $("#classname").val('');
                                $("#classgroup")[0].selectedIndex = 0;
                                //$("#btnsubmit").val('Submit').text(btnsubmit);
                                $("#btnsubmit").val('Submit').text('Submit')
                                classlisttable.ajax.reload();
                            }else if(data == 2) {
                                alert("Record Already Exist");
                                $("#classname").focus();
                            }else if(data == -1){
                                console.log("Invalid file format")                                
                                $("#classtype")[0].selectedIndex = 0
                                $("#classname").val('');
                                $("#classgroup")[0].selectedIndex = 0
                                $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                console.log(data + 'Data error');
                            }else{
                                console.log("Invalid file format")
                                $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                                //$("#btnsubmit").removeAttr("disabled");
                                //$("#btnsubmit").html(btnsubmit);
                                console.log(data + 'Data error');
                            }
                        },
                        error: function (data) {
                            // $("#btnsubmit").removeAttr("disabled");
                            // $("#btnsubmit").html(btnsubmit);
                            console.log( "error occured: " + error.message );
                            notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                            $("#notifier").addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                            return false
                        }
                    });
                }
           }
        }

    })
})
