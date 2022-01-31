<?php
//var_dump($guardians); //exit;
?>

<script type="text/javascript">
    /****************UTILITY FUNCTIONS*****************************/
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

        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';  

        $.post({
            url:'<?php echo site_url('staff/editstaffsetup'); ?>',
            data: { staffid: obj.title, [csrfName]:  csrfHash },
            type:'POST',
            dataType: 'json',
            success: function( json ) {
                console.log(json)

                
                
                //alert(json.formarray.authorshipposition)

                /************Clear All values*******************/
                // $("#passport").val('');
                // $("#passport").val('');
                $("#surname").val('');
                $("#othernames").val('');
                $("#nin").val('');
                $("#dob").val('');
                $("#hometown").val('');
                $("#lga").prop('checked', false);
                $("#lga").val('');

                // $("#lga").prop('checked', false);
                $("#permanentaddress").val('');

                $("#stateoforigin").prop('checked', false);
                $("#stateoforigin").val('');
                $("#email").val('');

                // $("#nationality").prop('checked', false);
                $("#phonenmber").val('');
                $("#position").val('');
                $("#bio").val('');

                $("#gender").prop('checked', false);
                $("#gender").val('');

                $("#ethnicity").val('');
                $("#religion").val('');
                $("#height").val('');
                $("#weight").val('');
                $("#disability").val('');
                $("#bloodgroup").val('');
                $("#genotype").val('');
                $("#vision").val('');
                $("#hearing").val('');
                $("#speech").val('');
                $("#generalvitality").val('');

                $("#nationality").prop('checked', false);
                $("#nationality").val('');

                $("#nextofkin").val('');
                $("#nextofkinrelationship").val('');
                $("#nextofkinnin").val('');
                $("#nextofkinoccupation").val('');
                $("#nextofkinaddress").val('');
                $("#nextofkinphonenumber").val('');

                $("#employername").val('');
                $("#officeaddress").val('');
                $("#country1").val('');
                $("#jobtitle").val('');
                $("#startedon").val('');
                $("#stoppedon").val('');
                $("#descriptionofduty").val('');

                $("#country2").val('');
                $("#nameofschool").val('');
                $("#attendedfrom").val('');
                $("#attendedto").val('');
                $("#courseofstudy").val('');
                $("#qualification").val('');
                $("#classofaward").val('');
                $("#dateofaward").val('');

                $("#classesassigned").val('');
                $("#subjectsassigned").val('');
                // $("#phonenmber").val('');


                /************Load New values*******************/
                // $("#experienceid").val(json.formarray.experienceid);

                $("#studentid").val(json.formarray.studentid);
                $("#passport").val(json.formarray.passport);
                $("#surname").val(json.formarray.surname);
                $("#othernames").val(json.formarray.othernames);
                //$("#dob").val(json.formarray.dob);
                //$('#class').val($(this).find('option:first').val(json.formarray.class));
                $('#dob option[value="' + json.formarray.dob + '"]').prop('selected','selected').val(json.formarray.dob).change();
                $('#class option[value="' + json.formarray.class + '"]').prop('selected','selected').val(json.formarray.class).change();
                $("#hometown").val(json.formarray.hometown);

                $('#lga option[value="' + json.formarray.lga + '"]').prop('selected','selected').val(json.formarray.lga).change();
                $('#stateoforigin option[value="' + json.formarray.stateoforigin + '"]').prop('selected','selected').val(json.formarray.stateoforigin).change();
                $('#nationality option[value="' + json.formarray.nationality + '"]').prop('selected','selected').val(json.formarray.nationality).change();

                $("#nin").val(json.formarray.nin);
                $('#gender option[value="' + json.formarray.gender + '"]').prop('selected','selected').val(json.formarray.gender).change();

                $("#height").val(json.formarray.height);
                $("#weight").val(json.formarray.weight);
                $("#fathername").val(json.formarray.fathername);

                    // 'studentid', 'passport', 'surname', 'othernames', 'dob', 'class', 'hometown', 'lga', 'stateoforigin', 'nationality', 'nin', 'gender', 'height', 'weight', 'fathername', 'fatheroccupation', 'mothername', 'motheroccupation', 'fatherpermaddress', 'fatherphonenumber', 'motherpermaddress', 'motherphonenumber', 'guardianname', 'guardianoccupation', 'guardianpermaddress', 'guardianphonenumber', 'familytype', 'familysize', 'positioninfamily', 'noofbrothers', 'noofsisters', 'parentreligion', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'classgiven', 'classgroup', 'last_updated'


                $("#fatheroccupation").val(json.formarray.fatheroccupation);
                $("#mothername").val(json.formarray.mothername);
                $("#motheroccupation").val(json.formarray.motheroccupation);
                $("#fatherpermaddress").val(json.formarray.fatherpermaddress);
                $("#fatherphonenumber").val(json.formarray.fatherphonenumber);
                $("#motherpermaddress").val(json.formarray.motherpermaddress);
                $("#motherphonenumber").val(json.formarray.motherphonenumber);
                $("#guardianname").val(json.formarray.guardianname);
                $("#guardianoccupation").val(json.formarray.guardianoccupation);
                $("#guardianpermaddress").val(json.formarray.guardianpermaddress);
                $("#guardianphonenumber").val(json.formarray.guardianphonenumber);
                $("#familytype").val(json.formarray.familytype);
                $("#familysize").val(json.formarray.familysize);
                $("#positioninfamily").val(json.formarray.positioninfamily);
                $("#noofbrothers").val(json.formarray.noofbrothers);
                $("#noofsisters").val(json.formarray.noofsisters);
                $("#parentreligion").val(json.formarray.parentreligion);
                $("#disability").val(json.formarray.disability);

                $('#bloodgroup option[value="' + json.formarray.bloodgroup + '"]').prop('selected','selected').val(json.formarray.bloodgroup).change();
                $('#genotype option[value="' + json.formarray.genotype + '"]').prop('selected','selected').val(json.formarray.genotype).change();


                $("#vision").val(json.formarray.vision);
                $("#hearing").val(json.formarray.hearing);
                $("#speech").val(json.formarray.speech);
                $("#generalvitality").val(json.formarray.generalvitality);
                
                $('#classgiven option[value="' + json.formarray.classgiven + '"]').prop('selected','selected').val(json.formarray.classgiven).change();
                $('#classgroup option[value="' + json.formarray.classgroup + '"]').prop('selected','selected').val(json.formarray.classgroup).change();
                //$("#classgroup").val(json.formarray.classgroup).change();

                // $("#experienceinstitution").val(json.formarray.experienceinstitution);
                // $("#experiencedesignation").val(json.formarray.experiencedesignation);
                // $("#experiencedate").val(json.formarray.experiencedate);
                // $("#experiencespecialization").val(json.formarray.experiencespecialization);
                // $("#experienceduties").val(json.formarray.experienceduties);
                // $('#experiencesession option[value="' + json.formarray.experiencesession + '"]').prop('selected','selected');
                // $("#experiencesession").val(json.formarray.experiencesession).change();

                // var currentjob = json.formarray.current;
                // //alert(currentjob)
                // if(currentjob==1){
                //     $("#yes").prop('checked', true)
                // }else if(currentjob==0){
                //     $("#no").prop('checked', true);
                // }else{
                //     $("#yes").prop('checked', false)
                //     $("#no").prop('checked', false);
                // }
                //$("#btnsubmit").val();
                $("#btnsubmit").val('Edit').text('Update')

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
