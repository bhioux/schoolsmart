$(document).ready(function(){
    
    var formw = document.querySelector('#frmstaffprofile');
    imps = formw.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], select');
    imps.forEach(element => {
    element.value = ''
    $(element).prop('selected','selected').val('').change();
    });

    console.log('preparing data insert...')
    var regdatatableurl = $("#regdatatableurl").val();

    var staffprofiletable = $('#staffprofiletable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url: regdatatableurl,
            dataSrc: 'staffdata'
        },

        //'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

        columns: [
            {data: "staffid"},
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
                "data": "staffid",
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
    
    $("#frmstaffprofile").submit(function(e){
        e.preventDefault();
        console.log('Registration Module Loaded....')
        alert("Form Submitted")
        //posturl
        var posturl = $("#posturl").val();
        var editurl = $("#editurl").val();
        $("#btntest").attr("disabled","disabled");
        $("#btntest").html('posting data...');
        $("#notifier").addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
        var form = document.getElementById('frmstaffprofile');
        var formdata = new FormData(form);

        var btnvalue = $("#btnsubmit").val();
        alert(btnvalue);
        //const btnvalue;

        //'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

        if(btnvalue == 'Submit'){
            var targeturl = posturl;
            var btntext = "Add";
            var btnsubmit = $("#btnsubmit").html();

            $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                type: 'post',
                success: function (data) {
                    alert("Record successfully added");
                    parsedData = JSON.parse(data)
                    console.log(parsedData)
                    if(parsedData.success == 1){
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log( "Data Loaded: " + data );
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')

                        var formw = document.querySelector('#frmstaffprofile');
                        imps = formw.querySelectorAll('input[type="text"], select');
                        imps.forEach(element => {
                        element.value = ''
                        $(element).prop('selected','selected').val('').change();
                        });

                        $("#staffid").val('');
                        $("#btnsubmit").val('Submit').text(btnsubmit);
                        console.log('Data about to be refreshed');
                        staffprofiletable.ajax.reload();
                        console.log('Data refreshed');

                    }else if(parsedData.success == '-1'){
                        alert("<strong>Error </strong>Save failed!");
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        alert("<strong>Error </strong>Save failed!" );
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (error) {
                    alert("<strong>Error </strong>Save failed!" + error.message );
                    // parsedData = JSON.parse(data)
                    // console.log(parsedData)
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html(btnsubmit);
                    console.log( "error occured: " + error.message );
                    //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });

        }else{
            var targeturl = editurl
            var btntext = "Update";
            var btnsubmit = $("#btnsubmit").html();
            var staffid = $("#staffid").val();
            console.log(staffid);

            $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: formdata,
                type: 'post',
                success: function (data) {
                    parsedData = JSON.parse(data)
                    console.log(parsedData)
                    if(parsedData.success == 1){
                        alert("Record Successfully Updated");
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log( "Data Loaded: " + data );
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')

                        var formw = document.querySelector('#frmstaffprofile')
                        imps = formw.querySelectorAll('input[type="text"], select');
                        imps.forEach(element => {
                        element.value = ''
                        $(element).prop('selected','selected').val('').change();
                        });

                        $("#staffid").val('');
                        $("#btnsubmit").val('Submit').text(btnsubmit);
                        console.log('Data about to be refreshed');
                        staffprofiletable.ajax.reload();
                        console.log('Data refreshed');

                    }else if(data == '-1'){
                        alert("<strong>Error </strong>Save failed!");
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        alert("<strong>Error </strong>Save failed!");
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                },
                error: function (error) {
                    alert("<strong>Error </strong>Save failed!" + error.message );
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html(btnsubmit);
                    console.log( "error occured: " + error.message );
                   // notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });

        }
    })
})
