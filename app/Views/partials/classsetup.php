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
      <form class="needs-validation was-validated" name="classsetupform" id="classsetupform">
        <div class="row justify-content-center">
            <h2>CLASS SETUP</h2>
          <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
        </div>
        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Class Type: </label> &ast;
                <div class="form-group">
                    <select class="selectpicker form-control" id="classtype" name="classtype" required>
                        <option disabled selected>--Choose One--</option>
                        <option value="prenursery">Pre-Nursery</option>
                        <option value="nursery">Nursery</option>
                        <option value="primary">Primary</option>
                    </select>
                </div>
              <!-- <input type="text" id="subjectname" name="subjectname" placeholder="Name of Subject" class="form-control" required> -->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Class Name: </label> &ast;<small> &lbrack; e.g: Primary 1 or Primary 2 &rbrack;</small>
              <input type="text" id="classname" name="classname" placeholder="Class Name" class="form-control" required>
            </div>
          </div>                                        
        </div>

        
        <div class="row row-form">
          <div class="col-lg-12">
            <div class="form-group">
                <label for="t-text">Class Group: </label> &ast;
                <div class="form-group">
                    <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                        <option disabled selected>--Choose One--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
              <!-- <textarea class="form-control" name="classgroup" id="classgroup" placeholder="Class Group" rows="3" required></textarea> -->
              <!-- <input type="text" id="subjectdesc" name="subjectdesc" placeholder="Subject Description" class="form-control" required> -->
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

          <h3 style="margin-bottom: 20px;">Staff List</h3>

          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Class Type</th>
                    <th>Full Class Name</th><!--Class Name + Group-->
                    <!-- <th>Class Group.</th> -->
                    <th class="no-content">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2000/2001</td>
                    <td>Primary 2</td>
                    <!-- <td>A</td> -->
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2001/2002</td>
                    <td>Primary 3</td>
                    <!-- <td>B</td> -->
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2002/2003</td>
                    <td>Primary 4</td>
                    <!-- <td>C</td> -->
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2003/2004</td>
                    <td>Primary 5</td>
                    <!-- <td>A</td> -->
                   <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2003/2004</td>
                    <td>Primary 6</td>
                    <!-- <td>E</td> -->
                   <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Class Type</th>
                    <th>Full Class Name</th>
                    <!-- <th>Class Group.</th> -->
                    <th>Action</th>
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
    $("form[name='classsetupform']").validate({
      rules: {
        classtype: "required",
        classname: "required",
        classgroup: "required"
      },
      
      messages: {
        classtype:              "Please enter a value",
        classname:              "Please enter a value",
        classgroup:             "Please enter a value"  
      },
    
      submitHandler: function(form) {
        form.submit();
      }
    });
      validator.resetForm();
  });
  
</script>