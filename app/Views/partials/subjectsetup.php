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
      <form class="needs-validation was-validated" name="subjectsetupform" id="subjectsetupform">

        <div class="row justify-content-center">
            <h2>SUBJECT SETUP</h2>
          <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
        </div>

        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
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

          <h3 style="margin-bottom: 20px;">Subject List</h3>

          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Subject Desc.</th>
                    <th class="no-content">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2000/2001</td>
                    <td>Primary 2</td>
                    <td>Junior-Spezialist*in für die Bereiche Monitoring, Evaluierung und Wissensmanagement, Abuja, Nigeria
                    Deutsche Gesellschaft für Internationale Zusammenarbeit </td>
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2001/2002</td>
                    <td>Primary 3</td>
                    <td>Junior-Spezialist*in für die Bereiche Monitoring, Evaluierung und Wissensmanagement, Abuja, Nigeria
                    Deutsche Gesellschaft für Internationale Zusammenarbeit </td>
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2002/2003</td>
                    <td>Primary 4</td>
                    <td>Junior-Spezialist*in für die Bereiche Monitoring, Evaluierung und Wissensmanagement, Abuja, Nigeria
                    Deutsche Gesellschaft für Internationale Zusammenarbeit </td>
                    <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>
                  <tr>
                    <td>2003/2004</td>
                    <td>Primary 5</td>
                    <td>Junior-Spezialist*in für die Bereiche Monitoring, Evaluierung und Wissensmanagement, Abuja, Nigeria
                    Deutsche Gesellschaft für Internationale Zusammenarbeit </td>
                   <td><a href="http://"><b><em>View</em></b></a></td>
                  </tr>  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Subject Desc.</th>
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

subjectname
subjectcode
subjectdescription


<script type="text/javascript">
        
  // $.validator.addMethod('filesize', function (value, element, param) {
  //     return this.optional(element) || (element.files[0].size <= param * 1000000)
  // }, 'File size must be less than {0} MB');

  $(function() {
    "use strict";
    $("form[name='subjectsetupform']").validate({
      rules: {
        subjectname:        "required",
        subjectcode:        "required",
        subjectdescription: "required"
      },
      
      messages: {
        subjectname:              "Please enter a value",
        subjectcode:              "Please enter a value",
        subjectdescription:       "Please enter a value"  
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
    
    validator.resetForm();

  });
</script>