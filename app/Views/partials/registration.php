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
                url:'<?php echo site_url('student/editregistration'); ?>',
                data: { studentid: obj.title, [csrfName]:  csrfHash },
                type:'POST',
                dataType: 'json',
                success: function( json ) {
                  console.log(json)

                 
                  
                    //alert(json.formarray.authorshipposition)

                    /************Clear All values*******************/
                    var formw = document.querySelector('#frmstprofile')
                    imps = formw.querySelectorAll('input[type="text"], select');
                    imps.forEach(element => {
                      element.value = ''
                      $(element).prop('disabled', 'disabled');
                      $(element).prop('selected','selected').val('').change();
                    });
                    


                    /************Load New values*******************/
                    // $("#experienceid").val(json.formarray.experienceid);

                    $("#studentid").val(json.formarray.studentid);
                    $("#regno").val(json.formarray.regno);
                    $("#passport").val(json.formarray.passport);
                    $("#surname").val(json.formarray.surname);
                    $("#othernames").val(json.formarray.othernames);
                    $("#basicFlatpickr").val(json.formarray.dob);
                    //$("#dateset").val(json.formarray.dob);
                    //$('#class').val($(this).find('option:first').val(json.formarray.class));
                    //$('#dob option[value="' + json.formarray.dob + '"]').prop('selected','selected').val(json.formarray.dob).change();
                    $('#class option[value="' + json.formarray.class + '"]').prop('selected','selected').val(json.formarray.class).change();
                    $("#hometown").val(json.formarray.hometown);

                    $('#lga option[value="' + json.formarray.lga + '"]').prop('selected','selected').val(json.formarray.lga).change();
                    $('#stateoforigin option[value="' + json.formarray.stateoforigin + '"]').prop('selected','selected').val(json.formarray.stateoforigin).change();
                    //$('#nationality option[value="' + json.formarray.nationality + '"]').prop('selected','selected').val(json.formarray.nationality).change();
                    $("#nationality").val(json.formarray.nationality);

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
                    $("#email").val(json.formarray.email);
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
                    
                    //$('input[type="text"], select').val('')
                    //document.querySelector('#generalvitality').value = '';
                    $("#btnsubmit").val('Edit').text('Update')

                    var formw = document.querySelector('#frmstprofile')
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
      <form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">
        <?= csrf_field() ?>
        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="t-text">Registration No: </label> &ast;
              <input type="text" id="regno" name="regno" placeholder="Registration No" class="form-control" readonly required>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- <div class="form-group">
              <label for="t-text">Date of Birth: </label> &ast;
              <input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
              <input type="text" id="age" age="name" placeholder="Age" class="form-control" required>
            </div> -->
          </div>
        </div>

        <div class="row row-form">
          <div class="col-lg-6">
            <div class="form-group">
              <!-- START CRUD PROPERTY SETTIGS  -->

              <input type="hidden" name="studentid" id="studentid" value="">
              <input type="hidden" name="posturl" id="posturl" value="<?= site_url('student/postregistration'); ?>">
              <input type="hidden" name="editurl" id="editurl" value="<?= site_url('student/updateregistration'); ?>">   
              <input type="hidden" name="regdatatableurl" id="regdatatableurl" value="<?= site_url('student/registrationtable'); ?>">   
              <input type="hidden" name="recordid" id="recordid" value="">
              <input type="hidden" name="hashurl" id="hashurl" value="<?= site_url('/refreshcsrf'); ?>">
              <input type="hidden" name="refreshedhash" id="refreshedhash" value=""> 
              <input type="hidden" name="refhashcode" id="refhasname" value="<?= csrf_token() ?>"> 
              <input type="hidden" name="refhasname" id="refhashcode" value="<?= csrf_hash() ?>"> 
              <!-- END CRUD PROPERTY SETTIGS  -->
              <label for="t-text">Surname: </label> &ast;
              <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control" required>
            </div>
          </div>
          <!-- <div class="col-lg-4">
            <div class="form-group">
              <label for="t-text">Firstname: </label> &ast;
              <input type="text" id="firstname" name="firstname" placeholder="Firstname" class="form-control" required>
            </div>
          </div>   -->
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
              <input id="basicFlatpickr" name="dob" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
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
          <div class="col-lg-12">
            <div class="form-group">
              <label for="t-text">Email Address: </label> &ast;
              <input type="email" id="email" name="email" placeholder="Email Address" class="form-control" required>
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
            <!-- <input type="submit" class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit" value="Submit">&nbsp; &nbsp; -->
            <button type="submit" value="Add" class="mt-4 btn btn-secondary" name="btnsubmit" id="btnsubmit">Submit</button>
            <button class="mt-4 btn btn-secondary" name="btnreset" id="btnreset">Reset</button>
          </div>                                        
        </div>


        <!-- 
        `studentprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`
        -->             

      </form>
    </div>
    <div class="col-lg-4 layout-spacing">
      <div class="main-container sidebar-closed sbar-open" id="container">
        <!--  BEGIN CONTENT AREA  -->        
    
        <div class="col-xl-12 col-lg-12 col-sm-12 ">

          <h3 style="margin-bottom: 20px;">Registration List</h3>

          <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
              <table id="studentprofiletable" class="table table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th>Appln. No.</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th class="no-content">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>    
        <!--  END CONTENT AREA  -->
      </div>
    </div>
  </div>
</div>