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
            <form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">

                <div class="row justify-content-center">
                    <h2>STAFF SETUP</h2>
                <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
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
                            <label for="t-text">National Identification Number: </label> &ast;
                            <input type="text" id="nin" name="nin" placeholder="National Identification Number" class="form-control" required>
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
                    <div class="col-sm-4">
                        <label for="t-text">Gender:</label>&ast;
                        <div class="form-group">
                            <select class="selectpicker form-control" id="sex" name="sex" required>
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

                <br>
                <div class="row justify-content-center">
                <h4 class="center-align"><b>NEXT-OF-KIN INFORMATION</b></h4>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Name: </label> &ast;
                            <input type="text" id="nok" name="nok" placeholder="Next of Kin Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Relationship: </label> &ast;
                            <input type="text" id="nokjob" name="nokjob" placeholder="Next of Kin Relationship" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin NIN: </label> &ast;
                            <input type="text" id="noknin" name="noknin" placeholder="Next of Kin National ID No." class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Occupation: </label> &ast;
                            <input type="text" id="nokjob" name="nokjob" placeholder="Next of Kin Occupation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Perm Addresss: </label> &ast;
                            <textarea class="form-control" name="addressnok" id="addressnok" placeholder="Next of Kin Perm Addresss" rows="2" required></textarea>
                            <!-- <input type="text" id="addressnok" name="addressnok" placeholder="Next of Kin Perm Addresss" class="form-control" required> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Phone Number: </label> &ast;
                            <input type="text" id="phonenok" name="phonenok" placeholder="Next of Kin Phone Number" class="form-control" required>
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
                            <input type="text" id="genvitality" name="genvitality" placeholder="General Vitality" class="form-control" required>
                        </div>
                    </div>                                      
                </div>

                <div class="row row-form1">
                    <div class="col text-right">
                        <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Submit</button> &nbsp; &nbsp;
                        <button class="mt-4 btn btn-secondary" name="btnreset" id="btnreset">Reset</button>
                    </div>                                        
                </div>

            <!-- `staffid`, `empno`, `surname`, `othernames`, `dob`, `hometown`, `lga`, `stateoforigin`, `permanentaddress`, `nin`, `email`, `phonenmber`, `position`, `bio`, `gender`, `ethnicity`, `religion`, `weight`, `height`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `nationality`, `nextofkin`, `nextofkinrelationship`, `nextofkinnin`, `nextofkinoccupation`, `nextofkinaddress`, `nextofkinphonenumber`, `employername`, `officeaddress`, `country1`, `jobtitle`, `startedon`, `stoppedon`, `descriptionofduty`, `country2`, `nameofschool`, `attendedfrom`, `attendedto`, `courseofstudy`, `qualification`, `classofaward`, `dateofaward`, `classesassigned`, `subjectsassigned`, `lastupdate` -->        

            </form>
        </div>
        <div class="col-lg-4 layout-spacing">
            <div class="main-container sidebar-closed sbar-open" id="container">
                <!--  BEGIN CONTENT AREA  -->        
            
                <div class="col-xl-12 col-lg-12 col-sm-12 ">

                    <h3 style="margin-bottom: 20px;">Staff List</h3>

                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Emp. No.</th>
                                        <th>Staff Name</th>
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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Emp. No.</th>
                                        <th>Staff Name</th>
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
                basicFlatpickr: "required",
                hometown: "required",
                lga: "required",
                stateoforigin: "required",
                permanentaddress: "required",
                nin: {
                    required: true,
                    digit: true
                },

                email: {
                    required: true,
                    email: true
                },

                phonenmber: "required",
                position: "required",
                bio: "required",
                gender: "required",
                ethnicity: "required",
                religion: "required",
                weight: "required",
                height: "required",
                disability: "required",
                bloodgroup: "required",
                genotype: "required",
                vision: "required",
                hearing: "required",
                speech: "required",
                generalvitality: "required",
                nationality: "required",
                nextofkin: "required",
                nextofkinrelationship: "required",
                nextofkinnin: "required",
                nextofkinoccupation: "required",
                nextofkinaddress: "required",
                nextofkinphonenumber: "required",
                employername: "required",
                officeaddress: "required",
                country1: "required",
                jobtitle: "required",
                startedon: "required",
                stoppedon: "required",
                descriptionofduty: "required",
                country2: "required",
                nameofschool: "required",
                attendedfrom: "required",
                attendedto: "required",
                courseofstudy: "required",
                qualification: "required",
                classofaward: "required",
                dateofaward: "required",
                classesassigned: "required",
                subjectsassigned: "required"

            },
            
            messages: {

                surname:                "Please enter a value",
                othernames:             "Please enter a value",
                dob:                    "Please enter a value",
                hometown:               "Please enter a value",
                lga:                    "Please enter a value",
                stateoforigin:          "Please enter a value",
                permanentaddress:       "Please enter a value",
                nin:                    "Please enter a value",
                email:                  "Please enter a value",
                phonenmber:             "Please enter a value",
                position:               "Please enter a value",
                bio:                    "Please enter a value",
                gender:                 "Please enter a value",
                ethnicity:              "Please enter a value",
                religion:               "Please enter a value",
                weight:                 "Please enter a value",
                height:                 "Please enter a value",
                disability:             "Please enter a value",
                bloodgroup:             "Please enter a value",
                genotype:               "Please enter a value",
                vision:                 "Please enter a value",
                hearing:                "Please enter a value",
                speech:                 "Please enter a value",
                generalvitality:        "Please enter a value",
                nationality:            "Please enter a value",
                nextofkin:              "Please enter a value",
                nextofkinrelationship:  "Please enter a value",
                nextofkinnin:           "Please enter a value",
                nextofkinoccupation:    "Please enter a value",
                nextofkinaddress:       "Please enter a value",
                nextofkinphonenumber:   "Please enter a value",
                employername:           "Please enter a value",
                officeaddress:          "Please enter a value",
                country1:               "Please enter a value",
                jobtitle:               "Please enter a value",
                startedon:              "Please enter a value",
                stoppedon:              "Please enter a value",
                descriptionofduty:      "Please enter a value",
                country2:               "Please enter a value",
                nameofschool:           "Please enter a value",
                attendedfrom:           "Please enter a value",
                attendedto:             "Please enter a value",
                courseofstudy:          "Please enter a value",
                qualification:          "Please enter a value",
                classofaward:           "Please enter a value",
                dateofaward:            "Please enter a value",
                classesassigned:        "Please enter a value",
                subjectsassigned:       "Please enter a value"
            },
        
        submitHandler: function(form) {
          form.submit();
        }
      });
        validator.resetForm();
    });

</script>