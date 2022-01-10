<script type="text/javascript">
  $(document).ready(function(){

      //alert($("#metaid").val());
      if($("#studentprofileid").val()){
          $("#btnsubmit").val('edit').text('Update');
      }else{
          $("#btnsubmit").val('add').text('Submit');
      }
      var nowdate = new Date();
      var nowyear = nowdate.getFullYear();

      $("#btnsubmit").click(function(e){                

            if(!confirm('Continue with action?')){
                return false;
            }

            $("#btnsubmit").attr("disabled","disabled");
            $("#btnsubmit").html('posting data...');
            //$("#notify").html('<strong>Saving</strong> Do not close this page...').addClass("alert info").prop('hidden', false);
            //var notify = $.notify('<strong>Saving</strong> Do not close this page...', { allow_dismiss: false });

            var form = document.getElementById('frmstprofile');
            var formdata = new FormData(form);

            var btnvalue = $("#btnsubmit").val();
            //alert(btnvalue);
            if(btnvalue=='add'){
                var targeturl = "<?php echo site_url('admin/postrecord/studentprofile'); ?>"
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
                          $("#frmstprofile select").val('').change();

                          $("#btnsubmit").removeAttr("disabled");
                          $("#btnsubmit").html(btntext);
                          console.log( "Data Loaded: " + data );
                          //notify.update({ type: 'success', message: '<strong>Success </strong>Record saved!' }); 
                          //$("#notify").html('<strong>Success </strong>Record saved!').addClass("alert success").prop('hidden', false);                              
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
                var targeturl = "<?php echo site_url('admin/updaterecord/studentprofile'); ?>"
                var btntext = "Update";
                var recordid = $("#studentprofileid").val();
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
                          $("input[type=text], textarea").val('');   
                          $("#frmstprofile select").val('').change(); 

                          $("#btnsubmit").removeAttr("disabled");
                          $("#btnsubmit").html(btntext);
                          console.log( "Data Loaded: " + data );
                          //$("#notify").html('<strong>Success </strong>Record saved!').addClass("alert success").prop('hidden', false);                       

                          $("#btnsubmit").val('add').text('Submit');
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

            $.post( "<?php echo site_url('admin/deleterecord/studentprofile'); ?>", { 'recordid': recordid, 'colname':'studentprofileid'})
                .done(function( data ) {
                    //alert(data)
                    if(data == 1){
                        resulttable.ajax.reload();
                        console.log("Record Deleted")
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
        
        $("#btnsubmit").val('add').text('Submit');
        $("#btnreset").val('reset').text('Reset');
      });          

  })
</script>