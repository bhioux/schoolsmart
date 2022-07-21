$(document).ready(function(){
    //$("#relationshipwithothers").prop('disabled', true)
    
    siteUrl = window.location.origin;
    console.log(siteUrl);
    $("#placeholder").attr('hidden', true);
    $("#realform").attr('hidden', false);

    // START STUDENT LIST LOAD AFTER CLASS SELECTION SECTION
    $("#classgroup").change(function(getClassId){
        var classId  = $('#classgroup').children("option:selected").val();
        //var classId = $('#classgroup option:selected').text();
        if($('#classgroup').children("option:selected").val() == ''){
            alert("Please make sure Class ");
            return false;
        }else{
            alert(classId);
            var studenbyclassturl = $("#studentlisttableurl").val() + '?sentClassId=' + classId;
            studentlisttable.ajax.url(studenbyclassturl).load();   
            var affectiveareatableurl = $("#affectiveareatableurl").val() + '?sentClassId=' + classId;
            affectivearealisttable.ajax.url(affectiveareatableurl).load();  
        }
    })    
    // END STUDENT LIST LOAD AFTER CLASS SELECTION SECTION


    // START STUDENT LIST AUTOLOAD SECTION
    var studenbyclassturl = $("#studentlisttableurl").val() + '?sentClassId=1';
    var studentlisttable = $('#studentlisttable').DataTable( {

        'createdRow': function (row, data, dataIndex) {
          $(row).addClass( 'list-actions' );
           $(row).attr('data-invoice-id', data[0]);
            // id="invoice-00002" data-invoice-id="00002"
        },
        rowId: 'studentid',
        "pageLength": 10,
        "lengthMenu": [10, 20, 50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       // "order": [[ 1, 'asc' ]],
        ajax: {
            url: studenbyclassturl,
            //data: { },
            dataSrc: 'studentslist'
        },
        columns: [
            {
                "data": "regno",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="editAction1(this)">'+ data + '</a>';                       
                   }
                   return data;
                }                 

            },
            {
                "data": "regno",
                "render": function(data, type, row, meta){
                    // f(type === 'display'){
                    //     data = '<a id="exp' + data  + '" title="' + data  + '" href="" class="lnkedit" ionclick="return showform(this)">'+ row['surname'] + ' ' + row['othernames'] + '</a>'; 
                    // }
                   return '<span class="selectedstudent" title="' + row['regno'] + '" onclick="editAction1(this)">' + row['surname'] + ' ' + row['othernames'] + '</span>';
                }                 

            },
        ]
    });

    function format (data) {
        return '<div class="details-container">'+
            '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
                '<tr class="list-actions" id="invoice-'+ data.regno +'" data-invoice-id="'+ data.regno +'">'+
                    '<td>'+ data.regno +'</td>'+
                    '<td style="background-color:red;">'+ data.surname +'</td>'+
                '</tr>'+
            '</table>'+
          '</div>';
    };
    // END STUDENT LIST AUTOLOAD SECTION


    // START STUDENT SELECTION EVENT SECTION
    //$(".selectedstudent").click(function(e){
        // var showform = function(obj){
      
   // })    
    // END STUDENT SELECTION EVENT SECTION


    // START AFFECTIVE AREAS FORM TABLE SECTION
    var affectiveareatableurl = $("#affectiveareatableurl").val() + '?sentClassId=1';
    var affectivearealisttable = $('#affectivearealisttable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        
        ajax: {
            url: affectiveareatableurl,
            dataSrc: 'affectiveareantabledata'
        },
        columns: [
            {
                "data": "regno"               
            },
            {
                "data": "regno"            
            },
            {
                "data": "studentid"             
            },
            {
                "data": "studentid",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editAction(this)">Edit</a>';                       
                   }else{
                       data = 'Edit&nbsp;|&nbsp;Delete';
                   }
                   return data;
                }             
            }                        
        ]
    }); 
    // END AFFECTIVE AREAS FORM TABLE SECTION

    // 'affectiverecordid', 'studentno', 'class', 'session', 'term', 'punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithothers', 'leadership', 'emotionalstability', 'health', 'attitudetoschoolwork', 'attentiveness', 'persevearance', 'attendance', 'reliability', 'selfcontrol', 'cooperation', 'responsibility', 'innitiative', 'orgability', 'verbalfluency', 'games', 'sports', 'drawingpainting', 'musicalskills'


    //$("#frmrating").submit(function(e){
        //e.preventDefault();
    $("#btnsubmit").click(function(e){
        e.preventDefault();
        alert("Hello World");
        // var form = document.getElementById('frmstaffprofile');
        // var formdata = new FormData(form);

        
        // var punctuality = $("#punctuality").val();
        // var neatness = $("#neatness").val();
        // var politeness = $("#politeness").val();
        // var honesty = $("#honesty").val();
        // var relwithstaff = $("#relwithstaff").val();
        // var relwithothers = $("#relwithothers").val();
        // var leadership = $("#leadership").val();
        // var emotionalstability = $("#emotionalstability").val();
        // var health = $("#health").val();
        // var attitude = $("#attitude").val();
        // var attentiveness = $("#attentiveness").val();
        // var perseverance = $("#perseverance").val(); //End of junior

        // var attendance = $("#attendance").val();
        // var reliability = $("#reliability").val();
        // var selfcontrol = $("#selfcontrol").val();
        // var cooperation = $("#cooperation").val();
        // var responsibility = $("#responsibility").val();
        // var initiative = $("#initiative").val();
        // var orgability = $("#orgability").val();
        // var fluency = $("#fluency").val();
        // var games = $("#games").val();
        // var sports = $("#sports").val();
        // var drawing = $("#drawing").val();
        // var music = $("#music").val();
        // var handlingtools = $("#handlingtools").val();
        // if(punctuality=='Rate Students'  || neatness=='Rate Students' || politeness=='Rate Students' || honesty=='Rate Students' || relwithstaff=='Rate Students' || relwithothers=='Rate Students' || leadership=='Rate Students' || emotionalstability=='Rate Students' || health=='Rate Students' || attitude=='Rate Students' || attentiveness=='Rate Students' || perseverance=='Rate Students' || attendance=='Rate Students' || reliability=='Rate Students' || selfcontrol=='Rate Students' || cooperation=='Rate Students' || responsibility=='Rate Students' || initiative=='Rate Students' || orgability=='Rate Students' || fluency=='Rate Students' || games=='Rate Students' || sports=='Rate Students' || drawing=='Rate Students' || music=='Rate Students' || handlingtools=='Rate Students'){
        //     alert("All fields are required");
        // }else if(punctuality== null  || neatness== null || politeness== null || honesty== null || relwithstaff== null || relwithothers== null || leadership== null || emotionalstability== null || health== null || attitude== null || attentiveness== null || perseverance== null || attendance== null || reliability== null || selfcontrol== null || cooperation== null || responsibility== null || initiative== null || orgability== null || fluency== null || games== null || sports== null || drawing== null || music== null || handlingtools== null){
        //     alert("All fields are required");
        // }else{
            // var form = document.getElementById('frmrating');
            // var formdata = new FormData(form);
            
            var formdata = $("#frmrating").serialize();
            // console.log(formdata)
            var targeturl = siteUrl + "/setup/postaffectiveArea";             

            $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: true,
                data: formdata,
                type: 'post',
                success: function (data) {
                    console.log(data)
                    return false;
                    parsedData = JSON.parse(data)
                    console.log('parsed' + parsedData.success)
                    //alert('raw' + data.success)

                    if(parsedData.success == 1){
                        alert("Record Updated Successfully");
                        // $("#btnsubmit").removeAttr("disabled");
                        // $("#btnsubmit").html(btnsubmit);
                        //console.log( "Data Loaded: " + data );
                        //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' });
                        // $("#notifier").removeClass('alert').addClass('alert alert-success').html('Success: <strong>Success </strong>Record saved!')
                        
                        //$("#frmtest")[0].reset();

                        // imps = formw.querySelectorAll('input[type="text"], select');
                        // imps.forEach(element => {
                        // element.value = ''
                        // $(element).prop('selected','selected').val('').change();
                        // });

                        //$("#studentid").val('');
                        //$("#btnsubmit").val('Submit').text(btnsubmit);
                        // console.log('Data about to be refreshed');
                        //gradebooktable.ajax.reload();


                        //$('#sybjectgroup, #classgroup, #assesstype').change(function(){
                        // console.log('Table about to refresh');
                        // var url ='/gradebook/gradebooktable?class=' + $('#classgroup option:selected').text() + '&csrf_test_name=' + $("#refhasname").val() + '&subject=' + $('#sybjectgroup').children("option:selected").val()
                        // gradebooktable.ajax.url(url).load();
                        console.log('Table refreshed');
                            //$('#table').DataTable().ajax.url(url).load();
                           
                        //})


                        console.log('Data refreshed');

                    }else if(data == '-1'){
                        alert('<strong>Error </strong>Save failed!');
                        // console.log("Invalid file format")
                        // $("#notifier").removeClass('alert').addClass('alert alert-danger').html("'<strong>Error: </strong>Save failed!'")
                        // $("#btnsubmit").removeAttr("disabled");
                        // $("#btnsubmit").html(btnsubmit);
                       // console.log(data + 'Data error');
                        //return false;
                    
                    }else{
                        alert('<strong>Error </strong>Save failed!');
                        //console.log("Invalid file format")
                        // $("#notifier").removeClass('alert').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        // $("#btnsubmit").removeAttr("disabled");
                        // $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (data) {
                    alert("error occured: " + data);
                    // $("#btnsubmit").removeAttr("disabled");
                    // $("#btnsubmit").html(btnsubmit);
                    // console.log( "error occured: " + error.message );
                    // //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    // $("#notifier").removeClass('alert').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });
        // }
    });
});



// function getStudentByClass(getClassId){
//     $("#traits").hide();
//     var sentClassId = 'sentClassId='+getClassId;
//     var url = $("#studenbyclassturl").val();
//     $.post(url, sentClassId).done(function(data){
//         var data = $.parseJSON(data);
//         var counter = data.length; 
//         var table = "";
//         for(var i = 0; i < counter; i++){
//             //populate student table
//             table +="<tr class='list-actions' id='invoice-00003' data-invoice-id='00003'>";
//                 table +="<td>" + (i + 1) + "</td>";
//                 table +="<td  id='6' onclick='studentTraitsSetup(this.id)'>" + data[i]['surname'] + " " + data[i]['othernames']+ "</td>";
//             table +="</tr>";
//         }
//         $("#studentlisttable").html(table);
//     });
// }
// function  studentTraitsSetup(getStudentId){
//     //alert(getStudentId+'fdfd');
//     $("#traits").show();
// }