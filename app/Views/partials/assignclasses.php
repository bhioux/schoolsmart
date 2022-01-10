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
    <div class="col-lg-5 layout-spacing">
      <form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">

        <div class="row justify-content-center">
            <h2>ASSIGN CLASSES</h2>
          <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
        </div>

        <div class="row row-form">
          <div class="col-lg-12">
            <div class="form-group">
                <label for="t-text">Select Staff: </label> &ast;
                <div class="form-group">
                    <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                        <option disabled selected>--Choose Teacher--</option>
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

        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Select Class: </label> &ast;
              <div class="form-group">
                <select class="selectpicker form-control" id="classtype" name="classtype" required>
                    <option disabled selected>--Choose Class--</option>
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
              <label for="t-text">Select Subject: </label> &ast;<!-- <small> &lbrack; e.g: Primary 1 or Primary 2 &rbrack;</small> -->
                <div class="form-group">
                  <select class="selectpicker form-control" id="classtype" name="classtype" required>
                    <option disabled selected>--Choose Subject--</option>
                    <option value="prenursery">Mathematics</option>
                    <option value="nursery">English</option>
                    <option value="primary">Cultural and Creative Arts</option>
                  </select>
                </div>
            </div>
          </div>                                        
        </div>

        <div class="row row-form1">
          <div class="col text-right">
            <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Assign Class</button> &nbsp; &nbsp;
            <button class="mt-4 btn btn-secondary" name="btnreset" id="btnreset">Reset</button>
          </div>                                        
        </div>


        <!-- 
        `studentprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`
        -->             

      </form>
    </div>
    <div class="col-lg-7 layout-spacing">
      <div class="main-container sidebar-closed sbar-open" id="container">
        <!--  BEGIN CONTENT AREA  -->        
    
        <div class="col-xl-12 col-lg-12 col-sm-12 ">

          <h3 style="margin-bottom: 20px;">Assigned Class List</h3>

          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="zero-config" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th width="10%">S/No</th>
                    <th width="35%">Staff Name</th>
                    <th width="20%">Classes Assigned</th>
                    <th width="20%">Subject Assigned</th>
                    <th width="15%" class="no-content text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>2000/2001</td>
                    <td>Primary 2</td>
                    <td>Mathematics</td>
                    <td class="text-right"><button class="btn btn-warning mb-2 mr-2 btn-rounded"><a id="" href="http://futaschoolpry.test/updateprofile">Edit</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>2001/2002</td>
                    <td>Primary 3</td>
                    <td>English</td>
                    <td class="text-right"><button class="btn btn-warning mb-2 mr-2 btn-rounded"><a id="" href="http://futaschoolpry.test/updateprofile">Edit</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>2002/2003</td>
                    <td>Primary 4</td>
                    <td>Cultural and Creative Arts</td>
                    <td class="text-right"><button class="btn btn-warning mb-2 mr-2 btn-rounded"><a id="" href="http://futaschoolpry.test/updateprofile">Edit</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>2003/2004</td>
                    <td>Primary 5</td>
                    <td>English</td>
                    <td class="text-right"><button class="btn btn-warning mb-2 mr-2 btn-rounded"><a id="" href="http://futaschoolpry.test/updateprofile">Edit</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>2003/2004</td>
                    <td>Primary 6</td>
                    <td>Mathematics</td>
                    <td class="text-right"><button class="btn btn-warning mb-2 mr-2 btn-rounded"><a id="" href="http://futaschoolpry.test/updateprofile">Edit</a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></td>
                  </tr>  
                </tbody>
                <tfoot>
                  <tr>
                    <th width="10%">S/No</th>
                    <th width="35%">Staff Name</th>
                    <th width="20%">Classes Assigned</th>
                    <th width="20%">Subject Assigned</th>
                    <th width="15%" class="no-content text-right">Action</th>
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