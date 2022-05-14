<?php
//var_dump($guardians); //exit;
?>
<div class="container-fluid">
  <div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
      <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">

          <nav class="breadcrumb-one float-left">
            <a href="updateprofile">Home</a>
          </nav>

          <nav class="breadcrumb-one float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="studentprofile">Back</a></li>
              <!-- <li class="breadcrumb-item active" aria-current="page"><span>UI Kit</span></li> -->
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
      <form class="needs-validation was-validated" name="termsetupform" id="termsetupform">

        <div class="row justify-content-center">
            <h2>ASSESSMENT SETUP</h2>
          <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
        </div>

      <div class="col-sm-12">
        <div class="row layout-spacing">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Select Assessment Type: </label> &ast;
                <div class="form-group">
                  <select class="selectpicker form-control" id="term" name="term" required>
                    <option disabled selected>--Choose One--</option>
                    <option value="">Test 1</option>
                    <option value="">Test 2</option>
                    <option value="">Test 3</option>
                    <option value="">Examination</option>
                  </select>
                </div>
              <!-- <input type="text" id="subjectname" name="subjectname" placeholder="Name of Subject" class="form-control" required> -->
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Select Assessment Score: </label> &ast;
                <div class="form-group">
                  <select class="selectpicker form-control" id="session" name="session" required>
                    <option disabled selected>--Choose Session--</option>
                    <!-- <option value="<?php //echo?>">...</option> -->
                    <option value="">10</option>
                    <option value="">20</option>
                    <option value="">40</option>
                    <option value="">50</option>
                  </select>
                </div>
              <!-- <input type="text" id="subjectname" name="subjectname" placeholder="Name of Subject" class="form-control" required> -->
            </div>
          </div>
        </div>
      </div>

        <div class="col-sm-12 layout-spacing">
          <div class="statbox widget box box-shadow">
            <div class="widget-header">                                 
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h4>Assessment Class Level</h4>
                </div>
              </div>
            </div>
              <div class="widget-content widget-content-area">
                <!-- <p>select the date with range.</p> -->
                <div class="form-group mb-0">
                    <select class="selectpicker form-control" id="session" name="session" required>
                        <option disabled selected>--Choose Class Level--</option>
                        <!-- <option value="<?php //echo?>">...</option> -->
                        <option value="">Primary</option>
                        <option value="">Junior Secondary School</option>
                        <option value="">Senior Secondary School</option>
                    </select>
                <!-- <input id="rangeCalendarFlatpickr" name="termduration" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.."> -->
                </div>
              </div>
          </div>
        </div>

        <div class="row row-form1">
          <div class="col text-right">
            <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Submit</button> &nbsp; &nbsp;
            <button class="mt-4 btn btn-secondary" name="btnreset" id="btnreset">Reset</button>
          </div>                                        
        </div>


        <!-- 
        `studentprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`
        -->             

      </form>
    </div>
    <div class="col-lg-6 layout-spacing">
      <div class="main-container sidebar-closed sbar-open" id="container">
        <!--  BEGIN CONTENT AREA  -->        
    
        <div class="col-xl-12 col-lg-12 col-sm-12 ">

          <h3 style="margin-bottom: 20px;">Assessment View</h3>

          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Score</th>
                    <th>Level</th>
                    <th class="no-content">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test 1</td>
                        <td>10</td>
                        <td>Primary</td>
                        <td><a href="http://"><b><em>View</em></b></a></td>
                    </tr>
                    <tr>
                        <td>Test 1</td>
                        <td>20</td>
                        <td>Junior Secondary School</td>
                        <td><a href="http://"><b><em>View</em></b></a></td>
                    </tr>
                    <tr>
                        <td>Test 2</td>
                        <td>20</td>
                        <td>Junior Secondary School</td>
                        <td><a href="http://"><b><em>View</em></b></a></td>
                    </tr>
                    <tr>
                        <td>Test 3</td>
                        <td>20</td>
                        <td>Senior Secondary School</td>
                        <td><a href="http://"><b><em>View</em></b></a></td>
                    </tr>
                    <tr>
                        <td>Examination</td>
                        <td>50</td>
                        <td>Senior Secondary School</td>
                        <td><a href="http://"><b><em>View</em></b></a></td>
                    </tr>  
                </tbody>
                <tfoot>
                    <tr>
                        <th>Type</th>
                        <th>Score</th>
                        <th>Level</th>
                        <th class="no-content">Action</th>
                    </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>    
        <!--  END CONTENT AREA  -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
        
  // $.validator.addMethod('filesize', function (value, element, param) {
  //     return this.optional(element) || (element.files[0].size <= param * 1000000)
  // }, 'File size must be less than {0} MB');

  $(function() {
    "use strict";
    $("form[name='termsetupform']").validate({
      rules: {
        term:         "required",
        session:      "required",
        termduration: "required"
      },
      
      messages: {
        term:           "Please enter a value",
        session:        "Please enter a value",
        termduration:   "Please enter a value"  
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
    
    validator.resetForm();

  });
</script>