<script type="text/javascript">
/****************UTILITY FUNCTIONS*****************************/
function clearField() {
  $("#subjectname").val('');
  $("#subjectcode").val('');
  $("#subjectcode").attr('disabled', false);  
  $("#subjectdescription").val('');
}
function editAction(obj){
    if(!confirm('Continue with action?')){
        return false;
    }
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';  
    var url = '<?php echo site_url('setup/editsubjects'); ?>';
    $.post({
        url:url,
        data: { subjectsid: obj.title, [csrfName]:  csrfHash },
        type:'POST',
        dataType: 'json',
        success: function(json) {
            /************Clear All values*******************/
            var formw = document.querySelector('#subjectsetupform')
            imps = formw.querySelectorAll('input[type="text"], select');
            imps.forEach(element => {
              element.value = ''
              //$(element).prop('disabled', 'disabled');
              $(element).prop('selected','selected').val('').change();
            });
            /************Load New values*******************/  
            //$("#subjectname").val(json.formarray.subject_name).change();
            //$('#subjectname option[value="' + json.formarray.subjectname + '"]').prop('selected','selected').val(json.formarray.subjectname).change();
            $("#subjectname").val(json.formarray.subjectname);
            $("#subjectcode").val(json.formarray.subjectcode).prop('disabled', 'disabled');
            $("#subjectdescription").val(json.formarray.subjectdescription);
           // $("#subjectdescription").val(json.formarray.subject_description).change();
            //$('#subjectdescription option[value="' + json.formarray.subjectdescription + '"]').prop('selected','selected').val(json.formarray.subjectdescription).change();
            //disable session code
            $("#subjectcode").attr('disabled', true);            
            //pass class id in hidden field
            $("#subjectsid").val(json.formarray.subjectid);
            $("#btnsubmit").val();
            $("#btnsubmit").val('edit').text('Update')
            return false;
        }
    });
    return false;
}
</script>
<div class="container-fluid">
  <div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
      <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
          <nav class="breadcrumb-one float-left">
            <a href="#">Home</a>
          </nav>
          <nav class="breadcrumb-one float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Back</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 layout-spacing">
      <form class="needs-validation was-validated" name="subjectsetupform" id="subjectsetupform">
        <?= csrf_field() ?>
        <div class="row justify-content-center">
            <h2>SUBJECT</h2>
        </div>
        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
                  <!-- hidden fields -->
                  <input type="hidden" name="subjectsid" id="subjectsid" value="">
                  <input type="hidden" name="posturl" id="posturl" value="<?= site_url('setup/postsubjects'); ?>">
                  <input type="hidden" name="editurl" id="editurl" value="<?= site_url('setup/updatesubjects'); ?>">
                  <input type="hidden" name="subjectsdatatableurl" id="subjectsdatatableurl" value="<?= site_url('setup/subjectstable'); ?>">                                 
              <label for="t-text">Name: </label> &ast;
              <input type="text" id="subjectname" name="subjectname" placeholder="Name of Subject" class="form-control" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Subject Code: </label> &ast;
              <input type="text" id="subjectcode" name="subjectcode" placeholder="Subject Shortode" class="form-control" required>
            </div>
          </div>                                        
        </div>
        <div class="row row-form">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="t-text">Subject Description: </label> &ast;
              <textarea class="form-control" name="subjectdescription" id="subjectdescription" placeholder="Subject Description" rows="3" required></textarea>
            </div>
          </div>
        </div>
        <div class="row row-form1">
          <div class="col text-right">
          <button type="submit" value="Submit" class="mt-4 btn btn-secondary" name="btnsubmit" id="btnsubmit">Submit</button>
            <button class="mt-4 btn btn-secondary" name="btnreset" id="btnreset" onclick="clearField()">Reset</button>  
          </div>                                        
        </div>
      </form>
    </div>
    <div class="col-lg-6 layout-spacing">
      <div class="main-container sidebar-closed sbar-open" id="container">
        <!--  BEGIN CONTENT AREA  -->        
        <div class="col-xl-12 col-lg-12 col-sm-12 ">
          <h3 style="margin-bottom: 20px;">Subject List</h3>
          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="subjectlisttable" name="subjectlisttable" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Subject Desc.</th>
                    <th class="no-content">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>    
        <!--  END CONTENT AREA  -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"></script>