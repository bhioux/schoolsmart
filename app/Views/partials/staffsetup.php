<?php
//var_dump($guardians); //exit;
?>

<script type="text/javascript">
    /****************UTILITY FUNCTIONS*****************************/
    function refreshhash(){
        var gethashurl = $("#hashurl").val();  
        var csrfName =  $("#refhasname").val(); 
        var csrfHash = $("#refhashcode").val();  


        $.post( gethashurl, {  })
        .done(function( data ) {
            $("#refreshedhash").val(data)
            alert( "Data Loaded: " + data );
        });
    }


    function confirmaction()
    {
        if(confirm('Continue with action?')){
            return false;
        }else{
            return false;
        }
    }

    function editaction(obj){
        if(!confirm('Continue with action?')){
            return false;
        }


        refreshhash()            

        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = $("#refhashcode").val() 

        $.post({
            url:'<?php echo site_url('staff/editstaff'); ?>',
            data: { staffid: obj.title, [csrfName]:  csrfHash },
            type:'POST',
            dataType: 'json',
            success: function( json ) {
                console.log(json)               
                
                //alert(json.formarray.authorshipposition)

                /************Clear All values*******************/

                var formw = document.querySelector('#frmstaffprofile')
                imps = formw.querySelectorAll('input[type="text"], select');
                imps.forEach(element => {
                    element.value = ''
                    $(element).prop('disabled', 'disabled');
                    $(element).prop('selected','selected').val('').change();
                });
                


                /************Load New values*******************/
                // $("#experienceid").val(json.formarray.experienceid);

                $("#staffid").val(json.formarray.staffid);
                $("#empno").val(json.formarray.empno);
                //$("#passport").val(json.formarray.passport);
                $("#surname").val(json.formarray.surname);
                $("#othernames").val(json.formarray.othernames);
                $("#dob").val(json.formarray.dob);                
                $("#hometown").val(json.formarray.hometown);
                $("#lga").val(json.formarray.lga);

                // $('#lga option[value="' + json.formarray.lga + '"]').prop('selected','selected').val(json.formarray.lga).change();
                $('#stateoforigin option[value="' + json.formarray.stateoforigin + '"]').prop('selected','selected').val(json.formarray.stateoforigin).change();
                $("#permanentaddress").val(json.formarray.permanentaddress);
                $("#nin").val(json.formarray.nin);

                $("#email").val(json.formarray.email); 
                $("#phonenumber").val(json.formarray.phonenumber);
                $("#position").val(json.formarray.position);
                $('#sex option[value="' + json.formarray.gender + '"]').prop('selected','selected').val(json.formarray.gender).change();
               
                $("#ethnicity").val(json.formarray.ethnicity);
                $('#religion option[value="' + json.formarray.religion + '"]').prop('selected','selected').val(json.formarray.religion).change();

                // 'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'


                $("#weight").val(json.formarray.weight);
                $("#height").val(json.formarray.height);
                $("#disability").val(json.formarray.disability);

                // $('#disability option[value="' + json.formarray.disability + '"]').prop('selected','selected').val(json.formarray.disability).change();
                $('#bloodgroup option[value="' + json.formarray.bloodgroup + '"]').prop('selected','selected').val(json.formarray.bloodgroup).change();
                $('#genotype option[value="' + json.formarray.genotype + '"]').prop('selected','selected').val(json.formarray.genotype).change();
                $('#vision option[value="' + json.formarray.vision + '"]').prop('selected','selected').val(json.formarray.vision).change();
                $('#hearing option[value="' + json.formarray.hearing + '"]').prop('selected','selected').val(json.formarray.hearing).change();
                $('#speech option[value="' + json.formarray.speech + '"]').prop('selected','selected').val(json.formarray.speech).change();
                $('#generalvitality option[value="' + json.formarray.generalvitality + '"]').prop('selected','selected').val(json.formarray.generalvitality).change();
                $('#nationality option[value="' + json.formarray.nationality + '"]').prop('selected','selected').val(json.formarray.nationality).change();

                // $("#nationality").val(json.formarray.nationality);
                $("#nextofkin").val(json.formarray.nextofkin);
                $("#nextofkinrelationship").val(json.formarray.nextofkinrelationship);
                $("#nextofkinnin").val(json.formarray.nextofkinnin);
                $("#nextofkinoccupation").val(json.formarray.nextofkinoccupation);
                $("#nextofkinaddress").val(json.formarray.nextofkinaddress);
                $("#nextofkinphonenumber").val(json.formarray.nextofkinphonenumber);
                $("#startedon").val(json.formarray.startedon);
                $("#courseofstudy").val(json.formarray.courseofstudy);
                $("#qualification").val(json.formarray.qualification);
                $("#dateofaward").val(json.formarray.dateofaward);

                $("#btnsubmit").val('Edit').text('Update')

                var formw = document.querySelector('#frmstaffprofile')
                imps = formw.querySelectorAll('input[type="text"], select');
                imps.forEach(element => {
                    $(element).attr('disabled', false);
                });
                
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
            <form class="needs-validation was-validated" name="frmstaffprofile" id="frmstaffprofile">

                <div class="row justify-content-center">
                    <h2>STAFF SETUP</h2>
                <!-- <h4 class="center-align"><b>MEDICAL REPORT</b></h4> -->
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" name="staffid" id="staffid" value="">
                            <input type="hidden" name="empno" id="empno" value="">
                            <input type="hidden" name="posturl" id="posturl" value="<?= site_url('staff/poststaff'); ?>">
                            <input type="hidden" name="editurl" id="editurl" value="<?= site_url('staff/updatestaff'); ?>">   
                            <input type="hidden" name="regdatatableurl" id="regdatatableurl" value="<?= site_url('staff/stafftable'); ?>">   
                            <input type="hidden" name="hashurl" id="hashurl" value="<?= site_url('/refreshcsrf'); ?>">
                            <input type="hidden" name="refreshedhash" id="refreshedhash" value=""> 
                            <input type="hidden" name="refhashcode" id="refhasname" value="<?= csrf_token() ?>"> 
                            <input type="hidden" name="refhasname" id="refhashcode" value="<?= csrf_hash() ?>"> 
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
                            <input id="dob" name="dob" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required>
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
                            <!-- <input type="text" id="stateoforigin" name="stateoforigin" placeholder="State of Origin" class="form-control" required> -->
                            <select class="selectpicker form-control" id="stateoforigin" name="stateoforigin" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="ondo">Ondo</option>
                                <option value="ekiti">Ekiti</option>
                                <option value="osun">Osun</option>
                                <option value="ogun">Ogun</option>
                                <option value="lagos">Lagos</option>
                                <option value="oyo">Oyo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Nationality: </label> &ast;
                            <!-- <input type="text" id="nationality" name="nationality" placeholder="Nationality" class="form-control" required> -->
                            <select class="selectpicker form-control" id="nationality" name="nationality" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="nigerian">Nigerian</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Permanent Home Address: </label> &ast;
                            <input type="text" id="permanentaddress" name="permanentaddress" placeholder="Permanent Home Address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Email: </label> &ast;
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Phone Number: </label> &ast;
                            <input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Designation: </label> &ast;
                            <input type="text" id="position" name="position" placeholder="Designation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Ethnicity: </label> &ast;
                            <input type="text" id="ethnicity" name="ethnicity" placeholder="Ethnicity" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Religion: </label> &ast;
                            <!-- <input type="text" id="religion" name="religion" placeholder="Religion" class="form-control" required> -->
                            <select class="selectpicker form-control" id="religion" name="religion" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="christianity">Christianity</option>
                                <option value="islamic">Islamic</option>
                                <option value="traditional">Traditional</option>
                                <option value="others">Others</option>
                            </select>
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
                            <input type="text" id="nextofkin" name="nextofkin" placeholder="Next of Kin Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Relationship: </label> &ast;
                            <input type="text" id="nextofkinrelationship" name="nextofkinrelationship" placeholder="Next of Kin Relationship" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin NIN: </label> &ast;
                            <input type="text" id="nextofkinnin" name="nextofkinnin" placeholder="Next of Kin National ID No." class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Occupation: </label> &ast;
                            <input type="text" id="nextofkinoccupation" name="nextofkinoccupation" placeholder="Next of Kin Occupation" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Perm Addresss: </label> &ast;
                            <textarea class="form-control" name="nextofkinaddress" id="nextofkinaddress" placeholder="Next of Kin Perm Addresss" rows="2" required></textarea>
                            <!-- <input type="text" id="addressnok" name="addressnok" placeholder="Next of Kin Perm Addresss" class="form-control" required> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Next of Kin Phone Number: </label> &ast;
                            <input type="text" id="nextofkinphonenumber" name="nextofkinphonenumber" placeholder="Next of Kin Phone Number" class="form-control" required>
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
                            <!-- <input type="text" id="vision" name="vision" placeholder="Vision" class="form-control" required> -->
                            <select class="selectpicker form-control" id="vision" name="vision" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="excellenet">Excellent</option>
                                <option value="very good">Very good</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="bad">Bad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Hearing: </label> &ast;
                            <!-- <input type="text" id="hearing" name="hearing" placeholder="Hearing" class="form-control" required> -->
                            <select class="selectpicker form-control" id="hearing" name="hearing" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="excellenet">Excellent</option>
                                <option value="very good">Very good</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="bad">Bad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Speech: </label> &ast;
                            <!-- <input type="text" id="speech" name="speech" placeholder="Speech" class="form-control" required> -->
                            <select class="selectpicker form-control" id="speech" name="speech" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="excellenet">Excellent</option>
                                <option value="very good">Very good</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="bad">Bad</option>
                            </select>
                        </div>
                    </div>                                        
                </div>

                <div class="row row-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="t-text">General Vitality: </label> &ast;
                            <!-- <input type="text" id="generalvitality" name="generalvitality" placeholder="General Vitality" class="form-control" required> -->
                            <select class="selectpicker form-control" id="generalvitality" name="generalvitality" required>
                                <option disabled selected>--Choose One--</option>
                                <option value="excellenet">Excellent</option>
                                <option value="very good">Very good</option>
                                <option value="good">Good</option>
                                <option value="fair">Fair</option>
                                <option value="poor">Poor</option>
                                <option value="bad">Bad</option>
                            </select>
                        </div>
                    </div>                                      
                </div>

                <br>
                <div class="row justify-content-center">
                <h4 class="center-align"><b>EMPLOYMENT REPORT</b></h4>
                </div>

                <div class="row row-form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Date of Employment: </label> &ast;
                            <input type="date" id="startedon" name="startedon" placeholder="Date of Employment" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Highest Qualification: </label> &ast;
                            <input type="text" id="qualification" name="qualification" placeholder="Qualification" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row row-form">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="t-text">Course of Study: </label> &ast;
                            <input type="text" id="courseofstudy" name="courseofstudy" placeholder="Course of Study" class="form-control" required>
                        </div>
                    </div>  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="t-text">Date of Graduation: </label> &ast;
                            <input id="dateofaward" name="dateofaward" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required>
                            <!-- <input type="text" id="age" age="name" placeholder="Age" class="form-control" required> -->
                        </div>
                    </div>
                </div>

                <div class="row row-form1">
                    <div class="col text-right">
                        <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit" value="Submit">Submit</button> &nbsp; &nbsp;
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
                            <table id="staffprofiletable" class="table table-hover" style="width:100%">
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
