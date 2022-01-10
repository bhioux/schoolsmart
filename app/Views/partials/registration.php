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
        <div class="col-lg-8 layout-spacing">
          <form class="needs-validation was-validated" name="studentprofileform" id="studentprofileform">

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- START CRUD PROPERTY SETTIGS  -->
                            <input type="hidden" name="studentprofileid" id="studentprofileid" value="">     
                            <input type="hidden" name="recordid" id="recordid" value="">     
                            <input type="hidden" name="colname" id="colname" value="studentprofileid">
                            <!-- END CRUD PROPERTY SETTIGS  -->
                            <label for="t-text">Surname: </label> &ast;
                            <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Othernames: </label> &ast;
                            <input type="text" id="othernames" name="othernames" placeholder="Othernames" class="form-control" required>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Class: </label> &ast;
                            <input type="text" id="class" name="class" placeholder="Class" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Date of Birth: </label> &ast;
                            <input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required>
                            <!-- <input type="text" id="age" age="name" placeholder="Age" class="form-control" required> -->
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Place of Birth: </label> &ast;
                            <input type="text" id="placeofborth" name="placeofborth" placeholder="Place of Birth" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Ethnicity: </label> &ast;
                            <input type="text" id="ethnicity" name="ethnicity" placeholder="Ethnicity" class="form-control" required>
                        </div>
                    </div>                                      
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Home Town: </label> &ast;
                            <input type="text" id="hometown" name="hometown" placeholder="Home Town" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Local Government: </label> &ast;
                            <input type="text" id="lga" name="lga" placeholder="Local Government" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">State of Origin: </label> &ast;
                            <input type="text" id="stateoforigin" name="stateoforigin" placeholder="State of Origin" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Nationality: </label> &ast;
                            <input type="text" id="nationality" name="nationality" placeholder="Nationality" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">National Identification Number: </label> &ast;
                            <input type="text" id="nin" name="nin" placeholder="National Identification Number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Email Address: </label> &ast;
                            <input type="email" id="emailaddress" name="emailaddress" placeholder="Email Address" class="form-control" required>
                        </div>
                    </div>                                      
                </div>

                <div class="row row-form">
                    <div class="col-sm-4">
                        <label for="t-text">Gender:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="gender" name="gender" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Height: </label> &ast;
                            <input type="text" id="height" name="height" placeholder="Height" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Weight: </label> &ast;
                            <input type="text" id="weight" name="weight" placeholder="Weight" class="form-control" required>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Father's Name: </label> &ast;
                            <input type="text" id="fathername" name="fathername" placeholder="Father's Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Father's Occupation: </label> &ast;
                            <input type="text" id="fatheroccupation" name="fatheroccupation" placeholder="Father's Occupation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Father's Perm Addresss: </label> &ast;
                            <input type="text" id="fatherpermaddress" name="fatherpermaddress" placeholder="Father's Perm Addresss" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Father's Phone Number: </label> &ast;
                            <input type="text" id="fatherphonenumber" name="fatherphonenumber" placeholder="Father's Phone Number" class="form-control" required>
                        </div>
                    </div>
                </div>


                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Mother's Name: </label> &ast;
                            <input type="text" id="mothername" name="mothername" placeholder="Mother's Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Mother's Occupation: </label> &ast;
                            <input type="text" id="motheroccupation" name="motheroccupation" placeholder="Mother's Occupation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Mother's Perm Addresss: </label> &ast;
                            <input type="text" id="motherpermaddress" name="motherpermaddress" placeholder="Mother's Perm Addresss" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Mother's Phone Number: </label> &ast;
                            <input type="text" id="motherphonenumber" name="motherphonenumber" placeholder="Mother's Phone Number" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Guardian's Name: </label> &ast;
                            <input type="text" id="guardianname" name="guardianname" placeholder="Guardian's Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Guardian's Occupation: </label> &ast;
                            <input type="text" id="guardianoccupation" name="guardianoccupation" placeholder="Guardian's Occupation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Guardian's Perm Addresss: </label> &ast;
                            <input type="text" id="guardianpermaddress" name="guardianpermaddress" placeholder="Guardian's Perm Addresss" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Guardian's Phone Number: </label> &ast;
                            <input type="text" id="guardianphonenumber" name="guardianphonenumber" placeholder="Guardian's Phone Number" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-sm-6">
                        <label for="t-text">Type of Family:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="familytype" name="familytype" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Size of Family: </label> &ast;
                            <input type="text" id="familysize" name="familysize" placeholder="Size of Family" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Position in the Family: </label> &ast;
                            <input type="text" id="positioninfamily" name="positioninfamily" placeholder="Position in the Family" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">No of Brother's: </label> &ast;
                            <input type="text" id="noofbrothers" name="noofbrothers" placeholder="No of Brother's" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">No of Sister's: </label> &ast;
                            <input type="text" id="noofsisters" name="noofsisters" placeholder="No of Sister's" class="form-control" required>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-sm-12">
                        <label for="t-text">Parent/Guardian's Religion:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="parentreligion" name="parentreligion" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Islam">Islam</option>
                                <option value="Traditional">Traditional</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row justify-content-center">
                    <h4 class="center-align"><b>MEDICAL REPORT</b></h4>
                </div>
                
                <div class="row row-form"> 
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Disability: </label> &ast;
                            <input type="text" id="disability" name="disability" placeholder="Disability" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="t-text">Blood Group:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="bloodgroup" name="bloodgroup" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O+</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="t-text">Genotype:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="genotype" name="genotype" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="AA">AA</option>
                                <option value="AS">AS</option>
                                <option value="AC">AC</option>
                                <option value="SS">SS</option>
                                <option value="SC">SC</option>
                                <option value="CC">CC</option>
                            </select>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Vision: </label> &ast;
                            <input type="text" id="vision" name="vision" placeholder="Vision" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Hearing: </label> &ast;
                            <input type="text" id="hearing" name="hearing" placeholder="Hearing" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Speech: </label> &ast;
                            <input type="text" id="speech" name="speech" placeholder="Speech" class="form-control" required>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="t-text">General Vitality: </label> &ast;
                            <input type="text" id="generalvitality" name="generalvitality" placeholder="General Vitality" class="form-control" required>
                        </div>
                    </div>                                      
                </div>
                
                <br>
                <div class="row justify-content-center">
                    <h4 class="center-align"><b>CLASS INFORMATION</b></h4>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Class Given: </label> &ast;
                            <input type="text" id="classgiven" name="classgiven" placeholder="Class Given" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
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


            <!-- `surname`, `othernames`, `class`, `basicFlatpickr`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `emailaddress`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `mothername`, `motheroccupation`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup` -->
             

            </form>
        </div>
        <div class="col-lg-4 layout-spacing">
            <div class="main-container sidebar-closed sbar-open" id="container">
            <!--  BEGIN CONTENT AREA  -->        
        
                <div class="col-xl-12 col-lg-12 col-sm-12 ">

                    <h3 style="margin-bottom: 20px;">Registration List</h3>

                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Appln. No.</th>
                                        <th>Name</th>
                                        <th class="no-content">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2000/2001</td>
                                        <td>Primary 2</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2001/2002</td>
                                        <td>Primary 3</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2002/2003</td>
                                        <td>Primary 4</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2003/2004</td>
                                        <td>Primary 5</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2004/2005</td>
                                        <td>Primary 6</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2000/2001</td>
                                        <td>Primary 2</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2001/2002</td>
                                        <td>Primary 3</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2002/2003</td>
                                        <td>Primary 4</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>
                                    <tr>
                                        <td>2004/2005</td>
                                        <td>Primary 6</td>
                                        <td><a href="http://"><b><em>View</em></b></a></td>
                                    </tr>  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Appln. No.</th>
                                        <th>Name</th>
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
        $("form[name='studentprofileform']").validate({
            rules: {

                surname: "required",
                othernames: "required",
                class: "required",
                basicFlatpickr: "required",
                placeofborth: "required",
                ethnicity: "required",
                hometown: "required",
                lga: "required",
                stateoforigin: "required",
                nationality: "required",
                nin: "required",
                emailaddress: {
                    required: true,
                    email: true
                },
                gender: "required",
                height: "required",
                weight: "required",
                fathername: "required",
                fatheroccupation: "required",
                fatherpermaddress: "required",
                fatherphonenumber: "required",
                mothername: "required",
                motheroccupation: "required",
                motherpermaddress: "required",
                motherphonenumber: "required",
                guardianname: "required",
                guardianoccupation: "required",
                guardianpermaddress: "required",
                guardianphonenumber: "required",
                familytype: "required",
                familysize: {
                    required: true,
                    digit: true
                },
                positioninfamily: "required",
                noofbrothers: {
                    required: true,
                    digit: true
                },
                noofsisters: {
                    required: true,
                    digit: true
                },
                parentreligion: "required",
                disability: "required",
                bloodgroup: "required",
                genotype: "required",
                vision: "required",
                hearing: "required",
                speech: "required",
                generalvitality: "required",
                classgiven: "required",
                classgroup: "required"

            },
            
            messages: {

                surname:                "Please enter your Surname",
                othernames:             "Please enter your othernames",
                class:                  "Please enter your Class",
                basicFlatpickr:         "Please enter your date of birth",
                placeofborth:           "Please enter a value",
                ethnicity:              "Please enter a value",
                hometown:               "Please enter your hometown",
                lga:                    "Please enter your Local government of Origin",
                stateoforigin:          "Please enter your State of Origin",
                nationality:            "Please enter your Nationality",
                nin:                    "Please enter your National Identification Number",
                emailaddress:           "Please enter your Email Address",
                gender:                 "Please enter your Gender", 
                height:                 "Please enter a value", 
                weight:                 "Please enter a value", 
                fathername:             "Please enter a value", 
                fatheroccupation:       "Please enter a value", 
                fatherpermaddress:      "Please enter a value", 
                fatherphonenumber:      "Please enter a value", 
                mothername:             "Please enter a value", 
                motheroccupation:       "Please enter a value", 
                motherpermaddress:      "Please enter a value", 
                motherphonenumber:      "Please enter a value", 
                guardianname:           "Please enter a value", 
                guardianoccupation:     "Please enter a value", 
                guardianpermaddress:    "Please enter a value", 
                guardianphonenumber:    "Please enter a value", 
                familytype:             "Please enter a value", 
                familysize:             "Please enter a value", 
                positioninfamily:       "Please enter a value", 
                noofbrothers:           "Please enter a value", 
                noofsisters:            "Please enter a value", 
                parentreligion:         "Please enter a value", 
                disability:             "Please enter a value", 
                bloodgroup:             "Please enter a value", 
                genotype:               "Please enter a value", 
                vision:                 "Please enter a value", 
                hearing:                "Please enter a value", 
                speech:                 "Please enter a value", 
                generalvitality:        "Please enter a value", 
                classgiven:             "Please enter a value", 
                classgroup:             "Please enter a value" 
            },
        
        submitHandler: function(form) {
          form.submit();
        }
      });
        validator.resetForm();
    });

</script>