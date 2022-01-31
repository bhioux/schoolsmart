<!-- <style>
   .uptab{
        writing-mode: sideways-lr; 
        text-orientation: upright;
    }

    #reportcard {
        background: #fff;
        text-orientation:upright;
    }

    .row-form {
        margin: 0;
        padding: 0;
    }

    .row-form1 {
        margin: 0 0 30px 0;
        padding: 0;
    }

</style> -->

<?php
//var_dump($guardians); //exit;
?>
<!-- <div class="container-fluid"> -->
<div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

                <nav class="breadcrumb-one float-left">
                    <a href="<?= base_url() ?>/studentprofile">Back to Profile</a>
                </nav>

                <nav class="breadcrumb-one float-right" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="logout">Logout</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"><span>UI Kit</span></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">
        <div class="col-md-6 offset-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <p>Passport Photograph</p>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="passport" required>
                        <label class="custom-file-label">Select Passport for Upload</label>
                    </div>
                </div>
            </div>
        </div>
        <br>

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
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="t-text">Home Addresss: </label> &ast; <small>&nbsp;(Post office box is unacceptable)</small>
                    <textarea class="form-control" name="guardianpermaddress" id="guardianpermaddress" placeholder="Home Addresss" rows="2" required></textarea>
                    <!-- <input type="text" id="previousclass" name="previousclass" placeholder="Official Addresss" class="form-control" required> -->
                </div>
            </div>                                    
        </div>

        <div class="row row-form"> 
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="t-text">Phone Number: </label> &ast;
                    <input type="text" id="guardianphonenumber" name="guardianphonenumber" placeholder="Phone Number" class="form-control" required>
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
            <div class="col-sm-6">
                <label for="t-text">Gender:</label>&ast;
                <div class="form-group">
                    <select class="selectpicker form-control" id="gender" name="gender" required>
                        <option disabled selected>--Choose One--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>      
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="t-text">Date of Birth: </label> &ast;
                    <input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                  <!-- <input type="text" id="age" age="name" placeholder="Age" class="form-control" required> -->
                </div>
            </div>                                      
        </div>

        <div class="row row-form"> 
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="t-text">Place of Birth: </label> &ast;
                    <input type="text" id="placeofborth" name="placeofborth" placeholder="Place of Birth" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="t-text">Ethnicity: </label> &ast;
                    <input type="text" id="ethnicity" name="ethnicity" placeholder="Ethnicity" class="form-control" required>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="t-text">Religion:</label>&ast;
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

        <div class="row row-form"> 
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="t-text">Weight: </label> &ast;
                    <input type="text" id="weight" name="weight" placeholder="Weight" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="t-text">Height: </label> &ast;
                    <input type="text" id="height" name="height" placeholder="Height" class="form-control" required>
                </div>
            </div>                                         
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

        <div class="row row-form1">
            <div class="col text-right">
                <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Submit</button> &nbsp; &nbsp;
                <button class="mt-4 btn btn-primary" name="btnreset" id="btnreset">Reset</button>
            </div>                                        
        </div>

    </form>
</div>

<!-- `passport`, `surname`, `othernames`, `guardianpermaddress`, `guardianphonenumber`, `emailaddress`, `gender`, `basicFlatpickr`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `disability`, `bloodgroup`, `genotype` -->


<script type="text/javascript">
        
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 1000000)
    }, 'File size must be less than {0} MB');

    $(function() {
        "use strict";
        $("form[name='studentprofileform']").validate({
            rules: {

                passport           : {
                    required       : true,
                    extension      : "jpg,jpeg",
                    filesize       : 5
                },

                surname            : "required",
                othernames         : "required",
                guardianpermaddress: "required",
                guardianphonenumber: "required",
                emailaddress       : {
                    required       : true,
                    email          : true
                },
                gender             : "required",
                basicFlatpickr     : "required",
                placeofborth       : "required",
                ethnicity          : "required",
                parentreligion     : "required",
                height             : "required",
                weight             : "required",
                disability         : "required",
                bloodgroup         : "required",
                genotype           : "required"

            },
            
            messages: {
                passport:               "Please Upload a passport with .jpg|.jpeg format",
                surname:                "Please enter your Surname",
                othernames:             "Please enter your othernames",
                guardianpermaddress:    "Please enter a value", 
                guardianphonenumber:    "Please enter a value",
                emailaddress:           "Please enter your Email Address",
                gender:                 "Please enter your Gender",
                basicFlatpickr:         "Please enter your date of birth",
                placeofborth:           "Please enter a value",
                ethnicity:              "Please enter a value",
                parentreligion:         "Please enter a value",
                height:                 "Please enter a value", 
                weight:                 "Please enter a value", 
                disability:             "Please enter a value", 
                bloodgroup:             "Please enter a value", 
                genotype:               "Please enter a value"
            },
        
        submitHandler: function(form) {
          form.submit();
        }
      });
        validator.resetForm();
    });

</script>