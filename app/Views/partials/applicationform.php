<style>
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

</style>

    <?php
    //var_dump($guardians); //exit;
    ?>

    <!--  name, dob, age, hometown, lga, stateoforigin, nationality, religion, previousschool, previousclass, classsought, wardenname, wardenaddress, 
        officialaddress, wardenphone, radio1, name1, class1, name2, class2, name3, class3,     -->
        

    <div class="container">
        <div class="row justify-content-center">
            <div class="widget-header">
                <!-- <div class="row"> -->
                    <br>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Application Form for <span>&nbsp;&nbsp;&nbsp;<?php //echo?></span> Academic Session </h5>
                        <h5>Application Number: &nbsp;&nbsp;<?php //echo?></span></h5>
                        <!-- <h1 class="h4 text-gray-900 mb-4" id="errmsg"style="color:red;"></h1> -->
                    </div>                 
                <!-- </div> -->
            </div>
        </div>

        <form class="needs-validation was-validated" name="applicationform" id="applicationform">

            <legend>PART A</legend>

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
                            <label class="custom-file-label">Select File for Upload</label>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row row-md mg-lg-y-10"></div>

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
                        <input type="text" id="othernames" name="othername" placeholder="Othername" class="form-control" required>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Date of Birth: </label> &ast;
                        <input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
                        <!-- <input type="text" id="age" age="name" placeholder="Age" class="form-control" required> -->
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Age: </label> &ast; <small>(As at 30<sup>th</sup> September, <?php echo date("Y"); ?>)</small>
                        <input type="text" id="age" name="age" placeholder="Age" class="form-control" required>
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
                <div class="col-lg-12 ">  
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="t-text">State of Origin:</label>&ast;
                            <div class="form-group">
                                <select class="selectpicker form-control" id="stateoforigin" name="stateoforigin">
                                    <option disabled selected>--Select State--</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno">Borno</option>
                                    <option value="Cross Rive">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="FCT">Federal Capital Territory &dash; Abuja</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo</option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina">Katsina</option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="t-text">Nationality: </label> &ast;
                                <input type="text" id="nationality" name="nationality" placeholder="Nationality" class="form-control" required>
                            </div>
                        </div>  
                        <div class="col-sm-4">
                            <label for="t-text">Religion:</label>&ast;
                            <div class="form-group">
                                <select class="selectpicker form-control" id="religion" name="religion">
                                    <option disabled selected>--Select Religion--</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Traditional">Traditional</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="t-text">Previous School: </label> &ast;
                        <input type="text" id="previousschool" name="previousschool" placeholder="Previous School" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row row-form">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Previous Class: </label> &ast;
                        <input type="text" id="previousclass" name="previousclass" placeholder="Previous Class" class="form-control" required>
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Class to which admission is sought: </label> &ast;
                        <input type="text" id="classsought" name="classsought" placeholder="Class Sought" class="form-control" required>
                    </div>
                </div>                                        
            </div>
        
            <hr class="mg-y-10 mg-lg-y-0">
            <legend class="mg-b-0">PART B</legend>
            <br>

            <div class="row row-form">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="t-text">Name of Parent/Guardian: </label> &ast;
                        <input type="text" id="guardianname" name="guardianname" placeholder="Parent/Guardian Name" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row row-form">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="t-text">Permanent Home Address: </label> &ast;
                        <textarea class="form-control" name="guardianhomeaddress" id="guardianhomeaddress" placeholder="Permanent Home Address" rows="3" required></textarea>
                        <!-- <input type="text" id="previousschool" name="previousschool" placeholder="Permanent Home Address" class="form-control" required> -->
                    </div>
                </div>
            </div>

            <div class="row row-form">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Official Addresss: </label> &ast; <small>&nbsp;(Post office box is unacceptable)</small>
                        <textarea class="form-control" name="guardianofficeaddress" id="guardianofficeaddress" placeholder="Official Addresss" rows="2" required></textarea>
                        <!-- <input type="text" id="previousclass" name="previousclass" placeholder="Official Addresss" class="form-control" required> -->
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="t-text">Phone Number: </label> &ast;
                        <input type="text" id="guardianphonenumber" name="guardianphonenumber" placeholder="Parent/Guardian Phone No." class="form-control" required>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form">
                <!-- <div class="col-lg-12"> -->
                <div class="col-lg-8 mg-t-20 mg-lg-t-0">
                    <label>
                        <h5><b>Has the applicant any brother or sister in the school &quest; &ast;</b></h5>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="rdiobox">
                        <input name="rdio" type="radio" id="radio1">
                        <span>Yes</span>
                    </label>
                </div><!-- col-3 -->
                <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                    <label class="rdiobox">
                        <input name="rdio" type="radio" id="radio1">
                        <span>No</span>
                    </label>
                </div><!-- col-3 -->
            </div>

            <div class="row row-form">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="t-text">Name: </label> &ast;
                        <input type="text" id="name1" name="name1" placeholder="Name" class="form-control" required>
                    </div>
                </div>  
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="t-text">Class: </label> &ast;
                        <input type="text" id="class1" name="class1" placeholder="Class" class="form-control" required>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="t-text">Name: </label> &ast;
                        <input type="text" id="name2" name="name2" placeholder="Name" class="form-control" required>
                    </div>
                </div>  
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="t-text">Class: </label> &ast;
                        <input type="text" id="class2" name="class2" placeholder="Class" class="form-control" required>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="t-text">Name: </label> &ast;
                        <input type="text" id="name3" name="name3" placeholder="Name" class="form-control" required>
                    </div>
                </div>  
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="t-text">Class: </label> &ast;
                        <input type="text" id="class3" name="class3" placeholder="Class" class="form-control" required>
                    </div>
                </div>                                        
            </div>

            <div class="row row-form1">
                <div class="col text-right">
                    <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Submit</button> &nbsp; &nbsp;
                    <button class="mt-4 btn btn-primary" name="btnreset" id="btnreset">Reset</button>
                </div>                                        
            </div>


        <!-- `passport`,`surname`,`othernames`,`dob`,`age`,`hometown`,`lga`,`stateoforigin`,`nationality`,`religion`,`previousschool`,`previousclass`,`classsought`,`guardianname`,`guardianhomeaddress`,`guardianofficeaddress`,`guardianphonenumber`,`siblingname1`,`siblingclass1`,`siblingname2`,`siblingclass2`,`siblingname3`,`siblingclass3` -->
            

        </form>

    </div>

    <script type="text/javascript">
        
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1000000)
        }, 'File size must be less than {0} MB');

        $(function() {
            "use strict";
            $("form[name='applicationform']").validate({
                rules: {

                    passport: {
                        required: true,
                        extension: "jpg,jpeg",
                        filesize: 5
                    },
                    
                    surname: "required",
                    othernames: "required",
                    basicFlatpickr: "required",
                    age: {
                        required: true,
                        digit: true
                    },

                    hometown: "required",
                    lga: "required",
                    stateoforigin: "required",
                    nationality: "required",
                    religion: "required",
                    previousschool: "required",
                    previousclass: "required",
                    classsought: "required",
                    guardianname: "required",
                    guardianhomeaddress: "required",
                    guardianofficeaddress: "required",
                    guardianphonenumber: "required"
                },
                
                messages: {

                    passport: "Please Upload a passport with .jpg|.jpeg format",
                    surname: "Please enter your Surname",
                    othernames: "Please enter your othernames",
                    basicFlatpickr: "Please enter your date of birth",
                    age: "Please enter your Age as at last birthday",
                    hometown: "Please enter your hometown",
                    lga: "Please enter your Local government of Origin",
                    stateoforigin: "Please enter your State of Origin",
                    nationality: "Please enter your Nationality",
                    religion: "Please enter your Religion",
                    previousschool: "Please enter the name of Previous School",
                    previousclass: "Please enter your previous class",
                    classsought: "Please enter the you want",
                    guardianname: "Please enter your Guardian Name",
                    guardianhomeaddress: "Please enter your Guardian Home Address",
                    guardianofficeaddress: "Please enter your Guardian Office Address",
                    guardianphonenumber: "Please enter your Guardian Phone Number"

                },
            
            submitHandler: function(form) {
              form.submit();
            }
          });
            validator.resetForm();
        });

    </script>