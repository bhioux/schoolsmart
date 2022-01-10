<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php echo $meta; ?>

    <?php echo $title; ?>

    <!-- vendor css -->
    <?php echo $css; ?>
    <style>
        $('.select2').select2({
            dropdownParent: $('#modaldemo2')
        });
    </style>
  <script type="text/javascript">
    /****************UTILITY FUNCTIONS****************************8*/
        function confirmaction()
        {
            if(confirm('Continue with action?')){
                return false;
            }else{
                return false;
            }
        }

        function getstaffname(code){
            $.post({
              url: '<?php echo site_url('admin/getstaffname'); ?>',
              data: { staffcode: code },
              type:'POST',
              //dataType: 'json',
              success: function(html){
                //alert(html)
                $("#activerecord").html('Currently Editing: (' + code + ') - ' + html);
              }
            });
        }

        function editaction(obj){
            
            if(!confirm('Continue with action?')){
                return false;
            }
            //alert(obj.title)
            $.post({
                url:'<?php echo site_url('admin/getrecord/staffprofile'); ?>',
                data: { 'recordid': obj.title, 'colname': 'staffprofileid' },
                type:'POST',
                dataType: 'json',
                success: function( json ) {
                    //alert(json.formarray.metaid)
                    console.log(json)

                    /************Clear All values*******************/
                    //$("input[type=text], textarea").val('');
                    $("#frmstprofile input, textarea").val(''); 
                    $("#frmstprofile select").val('').change();    
                    //("#biomaritalstatus").val('').find('option:first').val();   

                    /*
                      `staffprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, genotype, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`
                    */            

                    /************Load New values*******************/
                    $("#staffprofileid").val(json.formarray.staffprofileid);
                    $("#recordid").val(json.formarray.staffprofileid);
                    $("#colname").val("staffprofileid");
                    /***********************************************/
                    $("#surname").val(json.formarray.surname);
                    $("#firstname").val(json.formarray.firstname);
                    $("#homeaddress").val(json.formarray.homeaddress);
                    $("#telephone").val(json.formarray.telephone);
                    $("#email").val(json.formarray.email);
                    
                    $('#sex option[value="' + json.formarray.sex + '"]').prop('selected','selected').val(json.formarray.sex).change();  
                    
                    $("#dob").val(json.formarray.dob);
                    //alert(json.formarray.dob)
                    $("#placeofborth").val(json.formarray.placeofborth);
                    $("#ethnicity").val(json.formarray.ethnicity);

                    $('#religion option[value="' + json.formarray.religion + '"]').prop('selected','selected').val(json.formarray.religion).change();

                    $("#weight").val(json.formarray.weight);
                    $("#height").val(json.formarray.height);
                    $("#physicalchallenge").val(json.formarray.physicalchallenge);

                    $('#bloodtype option[value="' + json.formarray.bloodtype + '"]').prop('selected','selected').val(json.formarray.bloodtype).change();
                    $('#genotype option[value="' + json.formarray.genotype + '"]').prop('selected','selected').val(json.formarray.genotype).change();
                    
                    if(json.formarray.staffprofileid != ''){
                        $("#btnsubmit").val('edit').text('Update');
                        $("#btnreset").val('reset').text('Reset');
                    }else{
                        $("#btnsubmit").val('add').text('Save');
                        $("#btnreset").val('reset').text('Reset');
                    }

                    //$("#frmstprofile button, textarea, select").prop('disabled',false);
                    //$("#frmstprofile input, select").attr('disabled',false);
                    $("#colname").val()

                    $("#btnsubmit").prop("disabled",false);
                    $("#btnreset").prop("disabled",false);

                    //$("#pagenotification").prop('hidden', true);
                    //$("#activerecord").html('Currently Editing: ' + $("#staffcode").val()).prop('hidden', false);
                    //getstaffname(json.formarray.staffcode)
                    //$.notify({type: 'success', message: '<strong>Success </strong>Record refreshed!', newest_on_top: true
                                //});
                    return false;
                },
                error: function (error) {
                    $("#btnsubmit").removeAttr("disabled");
                    $("#btnsubmit").html('Save');
                    console.log( "error occured: " + error.message );
                    return false
                }
            });
            return false;
        }
  </script>


  </head>
  <body class="az-body az-body-sidebar">
    <?php
      //print_r($adminmenu); exit;
    ?>

    <div class="az-sidebar az-sidebar-sticky az-sidebar-indigo-dark">
      <div class="az-sidebar-header">
        <a href="index.html" class="az-logo">az<span>i</span>a</a>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500x500" alt=""></div>
        <div class="media-body">
          <h6>Aziana Pechon</h6>
          <span>Premium Member</span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <?php echo $mainnav; ?><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-nine">
      <?php echo $header; ?>

      <div class="az-content-body">
          <div class="az-content-breadcrumb">
            <span>Forms</span>
            <span>staff Profile Form</span>
          </div>
          <h4 class="az-content-title text-right">staff Profile Form</h4>

          <hr class="mg-y-10 mg-lg-y-10">

          <p class="mg-b-20 text-danger">All astericked * fields are compulsory.</p>

          <div class="row">
            <div class="col-lg-8 mg-t-20 mg-lg-t-0">
              <?php echo $staffprofile; ?>
            </div>
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
              <!-- <div class="col-lg-4 mg-t-20 mg-lg-t-0"> START DATATABLE SECTION --> 
                <?php echo $profiletable; ?>
              <!-- </div>END DATATABLE SECTION -->
            </div>
          </div>

          <?php //echo $modaltest; ?>

          <!-- <div class="mg-lg-b-30"></div> -->

        </div><!-- az-content-body -->


      <?php echo $footer; ?>
    </div><!-- az-content -->


    <?php echo $js; ?>

    <?php echo $dashboardscripts; ?>

    <?php echo $formscripts; ?>

    <?php echo $staffdatatablescripts; ?>
    <?php //echo $stprofilecrudscript; ?>
    <?php echo $modalscript; ?>

  </body>
</html>
