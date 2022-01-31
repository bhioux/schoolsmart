<script type="text/javascript">
/****************UTILITY FUNCTIONS*****************************/
function clearField() {
  $("#sessioncode").val('');
  $("#sessioncode").attr('disabled', false);
  $("#rangeCalendarFlatpickr").val('');  
}
function editAction(obj){
    if(!confirm('Continue with action?')){
        return false;
    }
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';  
    var url = '<?php echo site_url('setup/editsession'); ?>';
    $.post({
        url:url,
        data: { session_id: obj.title, [csrfName]:  csrfHash },
        type:'POST',
        dataType: 'json',
        success: function(json) {
            /************Clear All values*******************/
            $("#sessioncode").val('');
            $("#rangeCalendarFlatpickr").val('');
            /************Load New values*******************/                    
            $("#sessionid").val(json.formarray.session_id);
            $("#sessioncode").val(json.formarray.session_code);
            $("#rangeCalendarFlatpickr").val(json.formarray.session_duration);
            //disable session code
            $("#sessioncode").attr('disabled', true);
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
      <form class="needs-validation was-validated" name="sessionsetupform" id="sessionsetupform">
        <?= csrf_field() ?>
        <div class="row justify-content-center">
            <h2>SESSION SETUP</h2>
        </div>
        <div class="col-sm-12 layout-spacing">
          <div class="form-group">
            <!-- hidden fields -->
            <input type="hidden" name="sessionid" id="sessionid" value="">
            <input type="hidden" name="posturl" id="posturl" value="<?= site_url('setup/postsession'); ?>">
            <input type="hidden" name="editurl" id="editurl" value="<?= site_url('setup/updatesession'); ?>">
            <input type="hidden" name="sessiondatatableurl" id="sessiondatatableurl" value="<?= site_url('setup/sessiontable'); ?>">   
            <label for="t-text">Session Code: </label> &ast; <small id="session_code_format_info">(e.g - 2020/2021)</small>
            <input type="text" id="sessioncode" name="sessioncode" placeholder="Session Shortode" class="form-control" required>
          </div>
        </div>
        <div class="col-sm-12 layout-spacing">
          <div class="statbox widget box box-shadow">
            <div class="widget-header">                                 
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h4 id="session_duration_format_info">Session Duration:<small> Session Start On - Session End On (select the date with range.)</small></h4>
                </div>
              </div>
            </div>
              <div class="widget-content widget-content-area">
                <div class="form-group mb-0">
                  <input id="rangeCalendarFlatpickr" name="sessionduration" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                </div>
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
          <h3 style="margin-bottom: 20px;">Session List</h3>
          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="sessionlisttable" name="sessionlisttable" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Session Duration</th>
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