<script type="text/javascript">
/****************UTILITY FUNCTIONS*****************************/
function clearField() {
  $("#classtype")[0].selectedIndex = 0
  $("#classname").val('');
  $("#classgroup")[0].selectedIndex = 0;
}
function editAction(obj){
    if(!confirm('Continue with action?')){
        return false;
    }
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = '<?= csrf_hash() ?>';  
    var url = '<?php echo site_url('setup/editclass'); ?>';
    $.post({
        url:url,
        data: { class_id: obj.title, [csrfName]:  csrfHash },
        type:'POST',
        dataType: 'json',
        success: function(json) {
            /************Clear All values*******************/
            // $("#classtype")[0].selectedIndex = 0
            // $("#classname").val('');
            // $("#classgroup")[0].selectedIndex = 0;

            var formw = document.querySelector('#classsetupform')
            imps = formw.querySelectorAll('input[type="text"], select');
            imps.forEach(element => {
              element.value = ''
              //$(element).prop('disabled', 'disabled');
              $(element).prop('selected','selected').val('').change();
            });
            /************Load New values*******************/  
           // $("#classtype").val(json.formarray.class_type).change();
            $('#classtype option[value="' + json.formarray.classtype + '"]').prop('selected','selected').val(json.formarray.classtype).change();
            $("#classname").val(json.formarray.classname);
            //$("#classgroup").val(json.formarray.class_group).change();
            $('#classgroup option[value="' + json.formarray.classgroup + '"]').prop('selected','selected').val(json.formarray.classgroup).change();
            //pass class id in hidden field
            $("#classid").val(json.formarray.classid);
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
      <form class="needs-validation was-validated" name="classsetupform" id="classsetupform">
        <?= csrf_field() ?>
        <div class="row justify-content-center">
            <h2>CLASS SETUP</h2>
        </div>
        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Class Type: </label> &ast;<small id="classTypeError"> &lbrack; e.g: Secondary &rbrack;</small>
                <div class="form-group">
                  <!-- hidden fields -->
                  <input type="hidden" name="classid" id="classid" value="">
                  <input type="hidden" name="posturl" id="posturl" value="<?= site_url('setup/postclass'); ?>">
                  <input type="hidden" name="editurl" id="editurl" value="<?= site_url('setup/updateclass'); ?>">
                  <input type="hidden" name="classdatatableurl" id="classdatatableurl" value="<?= site_url('setup/classtable'); ?>">                   
                  <select class="selectpicker form-control" id="classtype" name="classtype" required>
                      <option disabled selected>--Choose One--</option>
                      <option value="PRY">Pre-Nursery</option>
                      <option value="NUR">Nursery</option>
                      <option value="JSS">Junior Secondary</option>
                      <option value="SS">Senior Secondary</option>
                  </select>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Class Name: </label> &ast;<small> &lbrack; e.g: 1 or 2 or 3 &rbrack;</small>
              <input type="number" id="classname" name="classname" placeholder="Class Name" class="form-control" required>
            </div>
          </div>                                        
        </div>
        <div class="row row-form">
          <div class="col-lg-12">
            <div class="form-group">
                <label for="t-text">Class Group: </label> &ast;<small id="classGroupError"> &lbrack; e.g: A or B or ... &rbrack;</small>
                <div class="form-group">
                    <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                        <option disabled selected>--Choose One--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select>
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
          <h3 style="margin-bottom: 20px;">Class List</h3>
          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="classlisttable" name="classlisttable" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Class Type</th>
                    <th>Class Name</th>
                    <th>Class Group</th>
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
<script type="text/javascript">  </script>