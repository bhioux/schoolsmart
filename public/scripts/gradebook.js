$(document).ready(function(){
    // imps = formw.querySelectorAll('input[type="text"], select');
    // imps.forEach(element => {
    // element.value = ''
    $('#sybjectgroup, #classgroup, #assesstype').prop('selected','selected').val('').change();
    //});
    
    $("#assesstype").change(function(gradebooktable){
        if($('#classgroup').children("option:selected").val() == '' || $('#sybjectgroup').children("option:selected").val() == ''){
            alert("Please make sure Class & Subject are selected")
        }
    })

   
    //refreshhash()
 
    //********** * START GRADEBOOK ******************?
// function drawDatatable(){
    console.log("Drawing DataTable...")
    var gradebooktableurl = $("#gradebooktableurl").val();
    var gSubject = $('#sybjectgroup').children("option:selected").val()
    var gClass = $('#classgroup').children("option:selected").val()
    var assesstype = $('#assesstype').children("option:selected").val()
    var gterm = $('#gTerm').val();
    var gSession = $('#gSession').val();
    var csrfName = $("#refhashcode").val(); 
    var csrfHash = $("#refhasname").val(); 

    //var url = "Product/GetProductByCategoryId?categoryId=" + $('#ddlCategory option:selected').val();

    $('#btnSelect').click(function(){ //btnSelect
    //$('#assesstype').change(function(){ //
    //$('#sybjectgroup, #classgroup, #assesstype').change(function(){
        if($('#classgroup').children("option:selected").val() == '' || $('#sybjectgroup').children("option:selected").val() == '' || $('#assesstype').children("option:selected").val() == ''){
            alert("Please make sure Class, Subject & Assessment Type are all selected")
            return false;
        }else{
            var url ='/gradebook/gradebooktable?class=' + $('#classgroup option:selected').text() + '&csrf_test_name=' + $("#refhasname").val() + '&subject=' + $('#sybjectgroup').children("option:selected").val()
            //alert( $('#classgroup').val())
            gradebooktable.ajax.url(url).load();
            //$('#table').DataTable().ajax.url(url).load();
        }
        
       
    })



    var gradebooktable = $('#gradebooktable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "order": [[ 1, 'asc' ]],
        ajax: {
            url: gradebooktableurl,
            //data: { subject: $('#sybjectgroup').val(), class:  $("#classgroup option:selected").val(), term: gterm, session: gSession,[csrfName]:  csrfHash,  },
            data: { },
            dataSrc: 'gradebookdata',
        },
        
        // 'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term', 'created_at', 'updated_at'

        //`studentno`, `subjects`, `subjectname`, `fullname`, `class`, `ca1`, `ca2`, `ca3`, `exam`, `termsummary`, `lasttermcum`, `cumavg`, `cumavg2`, `classavg`, `position`, `remark`, `signs`, `schoolsession`, `sessionname`, `schoolterm`, `termname`, `summary`

        columns: [
            //{data: "studentid"},
            {data: "studentno"},
            {data: "fullname"},
            { 
                "data": "studentid",
                "render": function(data, type, row, meta){                    
                   //return row['surname'] + ' - ' + row['othernames'];
                   return $('#classgroup').children("option:selected").val()
                }
           },

           { 
                "data": "studentid",
                "render": function(data, type, row, meta){
                   if(type === 'display' && $('#assesstype').children("option:selected").val() == 'ca1'){    
                       data = '<input type="hidden" id="studentid' + data + '" value="' + data + '" name="studentid[]" class="form-control"> <input type="hidden" id="studentno' + data + '" value="' + row['studentno'] + '" name="studentno[]" class="form-control">                     <input type="text" id="student' + data + 'grade" title="' + data + '" name="studentgrade[]" class="form-control" value="' + row['ca1'] + '">'
                   }

                   if(type === 'display' && $('#assesstype').children("option:selected").val() == 'ca2'){    
                        data = '<input type="hidden" id="studentid' + data + '" value="' + data + '" name="studentid[]" class="form-control">   <input type="hidden" id="studentno' + data + '" value="' + row['studentno'] + '" name="studentno[]" class="form-control">                  <input type="text" id="student' + data + 'grade" title="' + data + '" name="studentgrade[]" class="form-control" value="' + row['ca2'] + '">'
                    }

                    if(type === 'display' && $('#assesstype').children("option:selected").val() == 'ca3'){    
                        data = '<input type="hidden" id="studentid' + data + '" value="' + data + '" name="studentid[]" class="form-control">    <input type="hidden" id="studentno' + data + '" value="' + row['studentno'] + '" name="studentno[]" class="form-control">                 <input type="text" id="student' + data + 'grade" title="' + data + '" name="studentgrade[]" class="form-control" value="' + row['ca3'] + '">'
                    }

                    if(type === 'display' && $('#assesstype').children("option:selected").val() == 'exam'){    
                        data = '<input type="hidden" id="studentid' + data + '" value="' + data + '" name="studentid[]" class="form-control">     <input type="hidden" id="studentno' + data + '" value="' + row['studentno'] + '" name="studentno[]" class="form-control">                <input type="text" id="student' + data + 'grade" title="' + data + '" name="studentgrade[]" class="form-control" value="' + row['exam'] + '">'
                    }

                    return data;
                }
           },

          //{data: "surname" }

        ]
    } );

// }

    //********** * END GRADEBOOK ******************/

   
    $("#assessment1").submit(function(e){
        e.preventDefault();

        if($('#classgroup').children("option:selected").val() == '' || $('#sybjectgroup').children("option:selected").val() == '' || $('#assesstype').children("option:selected").val() == ''){
            alert("Please make sure Class, Subject & Assessment Type are all selected")
            return false;
        }

        console.log('Registration Module Loaded....')
        console.log("Form Submitted")
        //posturl
        var posturl = $("#posturl").val();
        var editurl = $("#posturl").val();
       // var editurl = $("#editurl").val();

        $("#btntest").attr("disabled","disabled");
        $("#btntest").html('posting data...');
        $("#notifier").removeClass('alert').addClass('alert alert-warning').html('<strong>Saving</strong> Do not close this page...');
        var form = document.getElementById('assessment1');
        var formdata = new FormData(form);

        var btnvalue = $("#btnsubmit").val();
        var btnsubmit = $("#btnsubmit").html();

        console.log(btnvalue);

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
                    parsedData = JSON.parse(data)
                    console.log('parsed' + parsedData.success)
                    //alert('raw' + data.success)

                    if(parsedData.success == 1){
                        alert("Record Updated Successfully");
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        //console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' });
                        $("#notifier").removeClass('alert').addClass('alert alert-success').html('Success: <strong>Success </strong>Record saved!')
                        
                        //$("#frmtest")[0].reset();

                        // imps = formw.querySelectorAll('input[type="text"], select');
                        // imps.forEach(element => {
                        // element.value = ''
                        // $(element).prop('selected','selected').val('').change();
                        // });

                        //$("#studentid").val('');
                        //$("#btnsubmit").val('Submit').text(btnsubmit);
                        console.log('Data about to be refreshed');
                        //gradebooktable.ajax.reload();


                        //$('#sybjectgroup, #classgroup, #assesstype').change(function(){
                        console.log('Table about to refresh');
                        var url ='/gradebook/gradebooktable?class=' + $('#classgroup option:selected').text() + '&csrf_test_name=' + $("#refhasname").val() + '&subject=' + $('#sybjectgroup').children("option:selected").val()
                        gradebooktable.ajax.url(url).load();
                        console.log('Table refreshed');
                            //$('#table').DataTable().ajax.url(url).load();
                           
                        //})


                        console.log('Data refreshed');

                    }else if(data == '-1'){
                        alert('<strong>Error </strong>Save failed!');
                        console.log("Invalid file format")
                        $("#notifier").removeClass('alert').addClass('alert alert-danger').html("'<strong>Error: </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                       // console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        alert('<strong>Error </strong>Save failed!');
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (data) {
                    alert("error occured: " + error.message);
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html(btnsubmit);
                    console.log( "error occured: " + error.message );
                    //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").removeClass('alert').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
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
                    parsedData = JSON.parse(data)
                    console.log('parsed' + parsedData.success)
                    if(parsedData.success == 1){
                        alert("Record Updated Successfully");
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        //console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record updated!' });
                        $("#notifier").removeClass('alert').addClass('alert alert-success').html('<strong>Error </strong>' + error.message)
                        
                        imps = formw.querySelectorAll('input[type="text"], select');
                        imps.forEach(element => {
                        element.value = ''
                        $(element).prop('selected','selected').val('').change();
                        });

                        $("#studentid").val('');
                        $("#btnsubmit").val('add').text('Save');
                        //studentprofiletable.ajax.reload();
                        console.log('Table about to refresh');
                        var url ='/gradebook/gradebooktable?class=' + $('#classgroup option:selected').text() + '&csrf_test_name=' + $("#refhasname").val() + '&subject=' + $('#sybjectgroup').children("option:selected").val()
                        gradebooktable.ajax.url(url).load();
                        console.log('Table refreshed');

                    }else{
                        alert('<strong>Error </strong> SAve failed');
                        $("#btnsubmit").removeAttr("disabled");
                        $("#btnsubmit").html(btnsubmit);
                        console.log( "error occured: " + error.message );
                        //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                        $("#notifier").removeClass('alert').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                        return false
                    }
                },
                error: function (data) {
                    alert('<strong>Error </strong>' + error.message);
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html(btnsubmit);
                    console.log( "error occured: " + error.message );
                    //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").removeClass('alert').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });

        }
    })
})
