$(document).ready(function(){
    //refreshhash()
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
            {data: "regno"},
            //{data: "surname"},
            { 
                 "data": "surname",
                 "render": function(data, type, row, meta){
                    const milliseconds = data * 1000
                    var s = new Date(milliseconds).toLocaleDateString()
                    
                    return row['surname'] + ' - ' + row['othernames'];
                 }
            },
            {data: "class"},
            { 
                "data": "studentid",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editaction(this)">Edit</a>&nbsp;|&nbsp;<a id="lnkdelete' + data + '" title="' + data + '" href="" class="lnkdelete" name="lnkdelete' + data + '" onclick="return deleteactionid(this)">Delete</a>';
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
        alert(btnvalue);
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
                    alert(data)
                    if(data == 1){
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' });
                        $("#notifier").addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')
                        
                        //$("#frmtest")[0].reset();

                        imps = formw.querySelectorAll('input[type="text"], select');
                        imps.forEach(element => {
                        element.value = ''
                        $(element).prop('selected','selected').val('').change();
                        });

                        $("#studentid").val('');
                        $("#btnsubmit").val('Submit').text(btnsubmit);
                        console.log('Data about to be refreshed');
                        studentprofiletable.ajax.reload();
                        console.log('Data refreshed');

                    }else if(data == '-1'){
                        console.log("Invalid file format")
                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        console.log("Invalid file format")
                        $("#notifier").addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (data) {
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html(btnsubmit);
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
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                type: 'post',
                success: function (data) {
                    if(data == 0){
                        console.log("File upload error")
                        //notify.update({ type: 'danger', message: '<strong>Error </strong>Update failed!' });
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        //return false;
                    }else{
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record updated!' });
                        
                        imps = formw.querySelectorAll('input[type="text"], select');
                        imps.forEach(element => {
                        element.value = ''
                        $(element).prop('selected','selected').val('').change();
                        });

                        $("#studentid").val('');
                        $("#btnsubmit").val('add').text('Save');
                        studentprofiletable.ajax.reload();
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
    })
})
