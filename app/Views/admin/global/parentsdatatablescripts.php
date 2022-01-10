<script>
  $(document).ready(function(){
    'use strict';

  //$("#frmstprofile input, textarea").val(''); 
  $("input[type=text], textarea").val('');
  $("#frmstprofile select").val('').change();
  //$("#btnsubmit").prop("disabled",true);
  //$("#btnreset").prop("disabled",true);

  if($("#staffprofileid").val()){
    $("#btnsubmit").val('edit').text('Update');
  }else{
    if($("#surname").val() == ''){
      $("#btnsubmit").prop("disabled",true);
      $("#btnreset").prop("disabled",true);
    }else{
      $("#btnsubmit").prop("disabled",false);
      $("#btnreset").prop("disabled",false);
    }
    $("#btnsubmit").val('add').text('Submit');
  }

  $("input[type=text").change(function(){
    if($("#surname").val() == ''){
      $("#btnsubmit").prop("disabled",true);
      $("#btnreset").prop("disabled",true);
    }else{
      $("#btnsubmit").prop("disabled",false);
      $("#btnreset").prop("disabled",false);
    }
  })

  var nowdate = new Date();
  var nowyear = nowdate.getFullYear();

    $('#stprofiletable1').DataTable({
      responsive: true,
      lengthChange: true,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "dom": 'rtlfip',
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
      }
    });


/*********************START DATATABLE CONFIGURATION***********************/
   var resulttable = $('#stprofiletable').DataTable( {
      "pageLength": 2,
      "lengthMenu": [ 2, 5, 10, 25, 50 ],
      ajax: {
          url: '<?php echo site_url('admin/datatablerecord/parentsprofile'); ?>',
          dataSrc: 'parentsprofile'
      },
      columns: [
          {data: "parentsprofileid" },
          { 
               "data": "parentsprofileid",
               "render": function(data, type, row, meta){
                  if(type === 'display'){
                      data = '<a id="exp' + data + '" title="' + data + '" href="" class="lnkedit" onclick="return editaction(this)">Edit</a>&nbsp;|&nbsp;<a id="lnkdelete' + data + '" title="' + data + '" href="" class="lnkdelete" name="lnkdelete' + data + '" title="' + data + '" onclic="return deleteactionid(this)">Delete</a>';
                  }else{
                      data = 'Edit&nbsp;|&nbsp;Delete';
                  }
                  return data;
               }
          },
          {data: "surname"},
          {data: "firstname"},
          {data: "sex"},
          {data: "dob"},
          {data: "telephone"},
          {data: "email"}
      ]

      /*`staffprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`*/
  } );  


  /**********************FORM MANIPULATION SCRIPT SUBMISSION*******/
  //alert($("#metaid").val());

  $("#btnsubmit").click(function(e){                
    //alert(7878);
    alert($("#colname").val())

    if(!confirm('Continue with action?')){
        return false;
    }

    //$("#btnsubmit").attr("disabled","disabled");
    $("#btnsubmit").html('posting data...');
    //$("#notify").html('<strong>Saving</strong> Do not close this page...').addClass("alert info").prop('hidden', false);
    //var notify = $.notify('<strong>Saving</strong> Do not close this page...', { allow_dismiss: false });

    var form = document.getElementById('frmstprofile');
    var formdata = new FormData(form);

    var btnvalue = $("#btnsubmit").val();
    alert(btnvalue);
    if(btnvalue=='add'){
        var targeturl = "<?php echo site_url('admin/postrecord/parentsprofile'); ?>"
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
                if(data == 1){
                  $("input[type=text], textarea").val('');   
                  //$("#frmstprofile input, textarea").val('').change();
                  $("#frmstprofile select").val('').change();

                  $("#btnsubmit").removeAttr("disabled");
                  $("#btnsubmit").html(btntext);
                  console.log( "Data Loaded: " + data );
                  //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' }); 
                  //$("#notify").html('<strong>Success </strong>Record saved!').addClass("alert success").prop('hidden', false); 
                  $("#btnsubmit").prop("disabled",true);
                  $("#btnreset").prop("disabled",true);                             
                  resulttable.ajax.reload();
                }else{
                  console.log("Save failed")
                   //notify.update({ type: 'danger', message: '<strong>Error </strong>Save failed!' });
                  //$("#notify").html('<strong>Error </strong>Save failed!').addClass("alert danger").prop('hidden', false);
                  $("#btnsubmit").removeAttr("disabled");
                  $("#btnsubmit").html(btntext);
                  //return false;
                }
                
            },
            error: function (data) {
                $("#btnsubmit").removeAttr("disabled");
                $("#btnsubmit").html(btntext);
                console.log( "error occured: " + error.message );
                //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                //$("#notify").html('<strong>Error </strong>' + error.message).addClass("alert danger").prop('hidden', false);  
                return false
            }
        });

    }else{
        var targeturl = "<?php echo site_url('admin/updaterecord/parentsprofile'); ?>"
        var btntext = "Update";
        var recordid = $("#parentsprofileid").val();
        console.log(recordid);

        $.ajax({
            url: targeturl, // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: formdata,
            type: 'post',
            success: function (data) {
                if(data == 1){
                  //$("input[type=text], textarea").val('');   
                  $("#frmstprofile input, textarea").val('');   
                  $("#frmstprofile select").val('').change(); 

                  $("#btnsubmit").removeAttr("disabled");
                  $("#btnsubmit").html(btntext);
                  console.log( "Data Loaded: " + data );
                  //$("#notify").html('<strong>Success </strong>Record saved!').addClass("alert success").prop('hidden', false);                       

                  $("#btnsubmit").val('add').text('Submit');
                  $("#btnsubmit").prop("disabled",true);
                  $("#btnreset").prop("disabled",true);
                  resulttable.ajax.reload();
                }else{
                  console.log("update failed")
                  //$("#notify").html('<strong>Error </strong>update failed').addClass("alert danger").prop('hidden', false);
                  $("#btnsubmit").removeAttr("disabled");
                  $("#btnsubmit").html(btntext);
                  //return false;
                }
            },
            error: function (data) {
                $("#btnsubmit").removeAttr("disabled");
                $("#btnsubmit").html(btntext);
                console.log( "error occured: " + error.message );
                //$("#notify").html('<strong>Error </strong>' + error.message).addClass("alert danger").prop('hidden', false);
                return false
            }
        });
    }
    return false;
    });

  $('#resulttable').on('click', '.lnkdelete', function(e){
    e.preventDefault();

    if(!confirm('Continue with action?')){
        return false;
    }
    console.log('Hello')
    console.log(this.title)
    var recordid = this.title;

    $.post( "<?php echo site_url('admin/deleterecord/parentsprofile'); ?>", { 'recordid': recordid, 'colname':'parentsprofileid'})
        .done(function( data ) {
            //alert(data)
            if(data == 1){
                resulttable.ajax.reload();
                console.log("Record Deleted")
                $("#btnsubmit").prop("disabled",true);
                $("#btnreset").prop("disabled",true);
                //$("#notify").html('<strong>Success </strong>Record Deleted!').addClass("alert success").prop('hidden', false); 
            }else{
                console.log("Failed to delete record")
                //$("#notify").html('<strong>Error </strong>Failed to delete record').addClass("alert danger").prop('hidden', false);
            }
            return false;
            
        })
        .fail(function( error ) {
            console.log(error)
            return false
        })
        .always(function( data ) {
            console.log(data)
            return false
        })

    return false;
    });
  
  $("#btnreset").click(function(e){
    e.preventDefault();
    if(!confirm('Continue with action?')){
        return false;
    }

    $("input[type=text], textarea").val(''); 
    $("#frmstprofile select").val('').change(); 
    
    $("#btnsubmit").val('add').text('Submit').prop("disabled",true);
    $("#btnreset").val('reset').text('Reset').prop("disabled",true);
  });          


  });
</script>