$(document).ready(function(){
    siteUrl = window.location.origin;
    $("#classgroup").change(function(getClassId){
        var classId  = $('#classgroup').children("option:selected").val();
        //var classId = $('#classgroup option:selected').text();
        if($('#classgroup').children("option:selected").val() == ''){
            alert("Please make sure Class ");
            return false;
        }else{
            var studenbyclassturl = $("#studenbyclassturl").val() + '?sentClassId=' + classId;
            studentlisttable.ajax.url(studenbyclassturl).load();   
            var affectiveareatableurl = $("#affectiveareatableurl").val() + '?sentClassId=' + classId;
            affectivearealisttable.ajax.url(affectiveareatableurl).load();  
        }
    }) 

    var studenbyclassturl = $("#studenbyclassturl").val() + '?sentClassId=1';
    var studentlisttable = $('#studentlisttable').DataTable( {
        "pageLength": 50,
        "lengthMenu": [50, 100 ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       // "order": [[ 1, 'asc' ]],
        ajax: {
            url: studenbyclassturl,
            //data: { },
            dataSrc: 'students'
        },
        columns: [
            {
                "data": "studentid",
                "render": function(data, type, row, meta){
                   if(type === 'display'){
                       data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editAction(this)">'+ data + '</a>';                       
                   }else{
                       data = 'Edit&nbsp;|&nbsp;Delete';
                   }
                   return data;
                }                 

            },
            {
                "data": "studentid",
                "render": function(data, type, row, meta){
                   
                   return row['surname'] + ' ' + row['othernames'];
                }                 

            },
        ]
    });

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

    $("#btnSaveRatings").click(function(){
        var punctuality = $("#punctuality").val();
        var neatness = $("#neatness").val();
        var politeness = $("#politeness").val();
        var honesty = $("#honesty").val();
        var relwithstaff = $("#relwithstaff").val();
        var relwithothers = $("#relwithothers").val();
        var leadership = $("#leadership").val();
        var emotionalstability = $("#emotionalstability").val();
        var health = $("#health").val();
        var attitude = $("#attitude").val();
        var attentiveness = $("#attentiveness").val();
        var perseverance = $("#perseverance").val();
        var attendance = $("#attendance").val();
        var reliability = $("#reliability").val();
        var selfcontrol = $("#selfcontrol").val();
        var cooperation = $("#cooperation").val();
        var responsibility = $("#responsibility").val();
        var initiative = $("#initiative").val();
        var orgability = $("#orgability").val();
        var fluency = $("#fluency").val();
        var games = $("#games").val();
        var sports = $("#sports").val();
        var drawing = $("#drawing").val();
        var music = $("#music").val();
        var handlingtools = $("#handlingtools").val();
        if(punctuality=='Rate Students'  || neatness=='Rate Students' || politeness=='Rate Students' || honesty=='Rate Students' || relwithstaff=='Rate Students' || relwithothers=='Rate Students' || leadership=='Rate Students' || emotionalstability=='Rate Students' || health=='Rate Students' || attitude=='Rate Students' || attentiveness=='Rate Students' || perseverance=='Rate Students' || attendance=='Rate Students' || reliability=='Rate Students' || selfcontrol=='Rate Students' || cooperation=='Rate Students' || responsibility=='Rate Students' || initiative=='Rate Students' || orgability=='Rate Students' || fluency=='Rate Students' || games=='Rate Students' || sports=='Rate Students' || drawing=='Rate Students' || music=='Rate Students' || handlingtools=='Rate Students'){
            alert("All fields are required");
        }else if(punctuality== null  || neatness== null || politeness== null || honesty== null || relwithstaff== null || relwithothers== null || leadership== null || emotionalstability== null || health== null || attitude== null || attentiveness== null || perseverance== null || attendance== null || reliability== null || selfcontrol== null || cooperation== null || responsibility== null || initiative== null || orgability== null || fluency== null || games== null || sports== null || drawing== null || music== null || handlingtools== null){
            alert("All fields are required");
        }else{
            var formdata = $("#assessmentform").serialize();
            var url = siteUrl + "/setup/updateaffectivearea";             
            $.post(url, formdata).done(function(data){
                alert(data);
                var classId = $("#classId").val();
                var affectiveareatableurl = $("#affectiveareatableurl").val() + '?sentClassId=' + classId;            
                affectivearealisttable.ajax.url(affectiveareatableurl).load();   
                //clear fields
                $("#punctuality").val(0);
                $("#neatness").val(0);
                $("#politeness").val(0);
                $("#honesty").val(0);
                $("#relwithstaff").val(0);
                $("#relwithothers").val(0);
                $("#leadership").val(0);
                $("#emotionalstability").val(0);
                $("#health").val(0);
                $("#attitude").val(0);
                $("#attentiveness").val(0);
                $("#perseverance").val(0);
                $("#attendance").val(0);
                $("#reliability").val(0);
                $("#selfcontrol").val(0);
                $("#cooperation").val(0);
                $("#responsibility").val(0);
                $("#initiative").val(0);
                $("#orgability").val(0);
                $("#fluency").val(0);
                $("#games").val(0);
                $("#sports").val(0);
                $("#drawing").val(0);
                $("#music").val(0);
                $("#handlingtools").val(0);            
            });  
        }
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