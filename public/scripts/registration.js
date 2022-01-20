$(document).ready(function(){
    //alert("888")
    console.log('preparing data insert...')
    var regdatatableurl = $("#regdatatableurl").val();

    var studentprofiletable = $('#studentprofiletable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: regdatatableurl,
            dataSrc: 'registrationdata'
        },
        
        // 'studentid', 'passport', 'surname', 'othernames', 'dob', 'class', 'hometown', 'lga', 'stateoforigin', 'nationality', 'nin', 'gender', 'height', 'weight', 'fathername', 'fatheroccupation', 'mothername', 'motheroccupation', 'fatherpermaddress', 'fatherphonenumber', 'motherpermaddress', 'motherphonenumber', 'guardianname', 'guardianoccupation', 'guardianpermaddress', 'guardianphonenumber', 'familytype', 'familysize', 'positioninfamily', 'noofbrothers', 'noofsisters', 'parentreligion', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'classgiven', 'classgroup', 'last_updated'

        columns: [
            {data: "studentid"},
            //{data: "surname"},
            { 
                 "data": "surname",
                 "render": function(data, type, row, meta){
                    const milliseconds = data * 1000
                    var s = new Date(milliseconds).toLocaleDateString()
                    
                    return row['surname'] + ' - ' + row['othernames'];
                 }
            },
            { 
                "data": "studentid",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editaction(this)">Edit</a>&nbsp;|&nbsp;<a id="lnkdelete' + data + '" title="' + data + '" href="" class="lnkdelete" name="lnkdelete' + data + '" title="' + data + '" onclic="return deleteactionid(this)">Delete</a>';
                   }else{
                       data = 'Edit&nbsp;|&nbsp;Delete';
                   }
                   return data;
                }
           },
          //{data: "surname" }

        ]
    } );
    
    
    
    $("#frmstprofile").submit(function(e){
        e.preventDefault();
        console.log('Registration Module Loaded....')
        alert("Form Submitted")
        //posturl
        var posturl = $("#posturl").val();
        var editurl = $("#editurl").val();
        $("#btntest").attr("disabled","disabled");
        $("#btntest").html('posting data...');
        $("#notifier").addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
        var form = document.getElementById('frmstprofile');
        var formdata = new FormData(form);

        var btnvalue = $("#btnsubmit").val();
        alert(btnvalue)
        //const btnvalue;
        if(btnvalue == 'Add'){
            var targeturl = posturl;
            var btntext = "Submit";

            $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                type: 'post',
                success: function (data) {
                    console.log(data.success)
                    //var parsedData = JSON.parse(data);
                    //console.log(parsedData.success)
                    if(data.success == 1){
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' });
                        $("#notifier").addClass('alert alert-primary').html('success <strong>Success </strong>Record saved!')
                        
                        //$("#frmtest")[0].reset();

                        // $('#experiencesession').val($(this).find('option:first').val());
                        // $("#experiencesession").val('').change();
                        //$("#current").prop('checked', false);

                        $("#studentid").val('');
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        console.log('Data about to be refreshed');
                        studentprofiletable.ajax.reload();
                        console.log('Data refreshed');

                    }else if(data == '-1'){
                        console.log("Invalid file format")
                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        //console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        console.log("Invalid file format")
                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        //console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (data) {
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").val(btnvalue).text(btntext);
                    console.log( "error occured: " + error.message );
                    notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });

        }else{
            var targeturl = editurl
            var btntext = "Update";
            var studentid = $("#studentid").val();
            console.log(studentid);

            $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                type: 'post',
                success: function (data) {
                    console.log(data.success + 'DATA')
                    //var parsedData = JSON.parse(data);
                    //console.log(data.success + 'PARSEDDATA')

                    if(data.success == 1){
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        console.log( "Data Loaded: " + data );
                        $("#notifier").addClass('alert alert-primary').html('success <strong>Success </strong>Record saved!')
                        
                        //$("#frmtest")[0].reset();
                        // $('#experiencesession').val($(this).find('option:first').val());
                        // $("#experiencesession").val('').change();
                        //$("#current").prop('checked', false);

                        $("#studentid").val('');
                        $("#btnsubmit").val('Add').text('Submit');
                        studentprofiletable.ajax.reload();

                        
                    }else{
                        console.log(data.message)
                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").val(btnvalue).text(btntext);
                        //return false;
                    }
                },
                error: function (data) {
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").val(btnvalue).text(btntext);
                    console.log( "error occured: " + error.message );
                    //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });

        }
    })
})
