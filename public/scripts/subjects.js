$(document).ready(function(){
    $("#subjectname").focus();
    var subjectsdatatableurl = $("#subjectsdatatableurl").val();
    var subjectlisttable = $('#subjectlisttable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: subjectsdatatableurl,
            dataSrc: 'subjectstabledata'
        },
        columns: [
            {data: "subject_name"},
            {data: "subject_code"},
            {data: "subject_description"},
            { 
                "data": "subject_id",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editAction(this)">Edit</a>';
                   }else{
                       data = 'Edit&nbsp;|&nbsp;Delete';
                   }
                   return data;
                }
           },
          //{data: "surname" }

        ]
    } );
    
    $("#subjectsetupform").submit(function(e){
        e.preventDefault();
        //posturl
        var posturl = $("#posturl").val();
        var editurl = $("#editurl").val();
        // $("#btntest").attr("disabled","disabled");
        // $("#btntest").html('posting data...');
        $("#notifier").addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
        var form = document.getElementById('subjectsetupform');
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
                        alert("Record saved successfully");
                        //$("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                        $("#subjectname").val(''); $("#subjectname").focus();
                        $("#subjectcode").val('');
                        $("#subjectdescription").val('');
                        //$("#btnsubmit").val('Submit').text(btnsubmit);
                        subjectlisttable.ajax.reload();
                    }else if(data == 2){
                        alert("Record Already Exist");
                        $("#subjectname").focus();
                        //$("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record already exist!')
                        //$("#btnsubmit").val('Submit').text(btnsubmit);
                    }else if(data == -1){
                        console.log("Invalid file format")                                
                        $("#subjectname").val('');
                        $("#subjectcode").val('');
                        $("#subjectdescription").val('');
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
                        $("#subjectname").val(''); $("#subjectname").focus();
                        $("#subjectcode").val(''); 
                        $("#subjectcode").attr('disabled', false);        
                        $("#subjectdescription").val('');
                        //$("#btnsubmit").val('Submit').text(btnsubmit);
                        $("#btnsubmit").val('Submit').text('Submit')
                        subjectlisttable.ajax.reload();
                   }else if(data == -1){
                        $("#subjectname").val('');
                        $("#subjectcode").val('');
                        $("#subjectdescription").val('');
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
    })
})
