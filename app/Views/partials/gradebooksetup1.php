<script type="text/javascript">
        /****************UTILITY FUNCTIONS*****************************/
        function refreshhash(){
            var gethashurl = $("#hashurl").val();  

            var csrfName = $("#refhashcode").val(); 
            var csrfHash = $("#refhasname").val();   


            $.post( gethashurl, { [csrfName]:  csrfHash })
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

            var csrfName = '<?= csrf_token() ?>';
            var csrfHash = $("#refhasname").val();

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
                      $(element).prop('selected','selected').val('').change();
                    });
                    


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
                    
                    //$('input[type="text"], select').val('')
                    //document.querySelector('#generalvitality').value = '';
                    $("#btnsubmit").val('Edit').text('Update')

                    return false;
                }
            });
            return false;
        }
    </script>


<div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                <nav class="breadcrumb-one float-left">
                    <a href="staffprofile">Back to Profile</a>
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

<div class="row invoice layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="app-hamburger-container">
            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
        </div>
        <div class="doc-container">
            <div class="tab-title">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="search">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                    <div class="f-m-body">
                                        <div class="f-head">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                        </div>
                                        <div class="f-body">
                                            <p class="invoice-number">Assessment #1</p>
                                            <p class="invoice-customer-name">Setup Assessment 1</p>
                                            <p class="invoice-generated-date"><small>Click to Setup</small></p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="nav-link list-actions" id="invoice-00002" data-invoice-id="00002">
                                    <div class="f-m-body">
                                        <div class="f-head">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                        </div>
                                        <div class="f-body">
                                            <p class="invoice-number">Assessment #2</p>
                                            <p class="invoice-customer-name"><span>Setup Assessment 2</p>
                                            <p class="invoice-generated-date"><small>Click to Setup</small></p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="nav-link list-actions" id="invoice-00003" data-invoice-id="00003">
                                    <div class="f-m-body">
                                        <div class="f-head">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                        </div>
                                        <div class="f-body">
                                            <p class="invoice-number">Examination</p>
                                            <p class="invoice-customer-name">Setup Examination</p>
                                            <p class="invoice-generated-date"><small>Click to Setup</small></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="invoice-container">
                <div class="invoice-inbox">

                    <div class="inv-not-selected">
                        <p>Open a Gradebook for Setup.</p>
                    </div>

                    <div class="invoice-header-section">
                        <h4 class="inv-number"></h4>
                        <div class="invoice-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        </div>
                    </div>

                    <!-- START ASSESSMENT SETUP -->
                    
                    <div id="ct" class="">
                        
                        <div class="invoice-00001">
                            <div class="content-section  animated animatedFadeInUp fadeInUp">
                                <form method="post" id="assessment1" name="assessment1">
                                <?= csrf_field() ?>
                                <div class="row inv--product-table-section">
                                    <div class="col-lg-9">
                                        <div class="row inv--head-section">
                                            <div class="col-12 layout-spacing">
                                                <h3 class="in-heading">ASSESSMENT 1</h3>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="t-text">Class: </label> &ast;
                                                    <input type="hidden" name="gradebookid" id="gradebookid" value="">
                                                    <input type="hidden" name="posturl" id="posturl" value="<?= site_url('gradebook/postgradebook'); ?>">
                                                    <input type="hidden" name="editurl" id="editurl" value="<?= site_url('gradebook/updategradebook'); ?>">   
                                                    <input type="hidden" name="gradebooktableurl" id="gradebooktableurl" value="<?= site_url('gradebook/gradebooktable'); ?>">   
                                                    <input type="hidden" name="hashurl" id="hashurl" value="<?= site_url('/refreshcsrf'); ?>">   
                                                    <input type="hidden" name="assessment1" id="assessment1" value="assessment1">
                                                    <input type="hidden" name="gTerm" id="gTerm" value="<?= $termrecs->termid ?>">
                                                    <input type="hidden" name="gSession" id="gSession" value="<?= $sessionrecs->sessionid ?>">
                                                    <input type="hidden" name="refreshedhash" id="refreshedhash" value=""> 
                                                    <input type="hidden" name="refhashcode" id="refhashcode" value="<?= csrf_token() ?>"> 
                                                    <input type="hidden" name="refhasname" id="refhasname" value="<?= csrf_hash() ?>"> 
                                                    <!--  -->
                                                    <div class="form-group">

                                                        <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                                                            <option value='' selected>--Choose One--</option>
                                                            <!-- <option value="A">Primary 4b</option> -->
                                                            <?php
                                                                foreach($classes as $class){
                                                            ?>
                                                                   <option value="<?= $class->classtype.$class->classname.$class->classgroup ?>">
                                                                   <?= $class->classtype.$class->classname.$class->classgroup ?>
                                                                   </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="t-text">Subject: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="sybjectgroup" name="sybjectgroup" required>
                                                            <option value='' selected>--Choose One--</option>
                                                            <option value="A">Mathematics</option>
                                                            <?php
                                                                foreach($subjects as $subject){
                                                            ?>
                                                                   <option value="<?= $subject->subjectcode ?>">
                                                                    <?= $subject->subjectname ?>
                                                                   </option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="t-text">Assessment Type: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="assesstype" name="assesstype" required>
                                                            <option value='' selected>--Choose One--</option>
                                                            <option value="ca1">CA1</option>
                                                            <option value="ca2">CA2</option>
                                                            <option value="ca3">CA3</option>
                                                            <option value="exam">EXAM</option>                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="t-text">Action: </label> &ast;
                                                    <div class="form-group">
                                                        <input type="button" class="btn btn-primary" id="btnSelect" name="btnSelect" value="Select" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="table table-hover">
                                            <table id="gradebooktable" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" scope="col">S/N</th>
                                                        <th width="20%" scope="col">Registration No</th>
                                                        <th width="55%" scope="col">Class List</th>
                                                        <th width="15%" scope="col">Assessment 1</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary mb-4 mr-2 btn-lg" id="btnsubmit" name="btnAssessment1" value="Submit">Update Table</button>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Class Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">Class Name: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Primary #</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Students in Class:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Male Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Female Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 order-sm-1 order-0">
                                                <div class="inv--payment-info text-sm-left">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Subject Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Subject: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mathematics</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Subject Type: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Core</p>
                                                        </div>
                                                        <!-- <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 border-left">
                                        <div class="row inv--head-section">
                                            
                                            <div class="col-sm-6 col-12 text-sm-right" style="margin-left: 50px;">
                                                <div class="company-info">
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> -->
                                                    <h5 class="text-sm-right"><em><b>INSTRUCTIONS</b></em></h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div> 

                        <div class="invoice-00002">
                            <div class="content-section  animated animatedFadeInUp fadeInUp">
                            <form action="" method="post" id="assessment2" name="assessment2">
                                <div class="row inv--product-table-section">
                                    <div class="col-lg-9">
                                        <div class="row inv--head-section">
                                            <div class="col-12 layout-spacing">
                                                <h3 class="in-heading">ASSESSMENT 2</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="t-text">Select Class: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="gClass" name="gClass" required>
                                                            <option disabled selected>--Choose One--</option>
                                                            <option value="A">Primary 4b</option>
                                                            <option value="B">Primary 2a</option>
                                                            <option value="C">Primary 5c</option>
                                                            <option value="D">Primary 1a</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="t-text">Select Subject: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="gSubject" name="gSubject" required>
                                                            <option disabled selected>--Choose One--</option>
                                                            <option value="A">Mathematics</option>
                                                            <option value="B">Mathematics</option>
                                                            <option value="C">Mathematics</option>
                                                            <option value="D">Mathematics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table table-hover">
                                            <table id="assessment1" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" scope="col">S/N</th>
                                                        <th width="20%" scope="col">Registration No</th>
                                                        <th width="55%" scope="col">Class List</th>
                                                        <th width="15%" scope="col">Assessment 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Tiger Nixon Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-1-ass1" name="row-1-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Garrett Winters Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-2-ass1" name="row-2-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Ashton Cox Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-3-ass1" name="row-3-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Cedric Kelly Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-4-ass1" name="row-4-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Airi Satou Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-5-ass1" name="row-5-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Brielle Williamson Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-6-ass1" name="row-6-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Jennifer Chang Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Quinn Flynn Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Charde Marshall Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Haley Kennedy Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-2-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="10%" scope="col">S/N</th>
                                                        <th width="20%" scope="col">Registration No</th>
                                                        <th width="55%" scope="col">Class List</th>
                                                        <th width="15%" scope="col">Assessment 2</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col text-right">
                                            <button class="btn btn-primary mb-4 mr-2 btn-lg">Update Table</button>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Class Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">Class Name: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Primary #</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Students in Class:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Male Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Female Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 order-sm-1 order-0">
                                                <div class="inv--payment-info text-sm-left">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Subject Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Subject: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mathematics</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Subject Type: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Core</p>
                                                        </div>
                                                        <!-- <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 border-left">
                                        <div class="row inv--head-section">
                                            
                                            <div class="col-sm-6 col-12 text-sm-right" style="margin-left: 50px;">
                                                <div class="company-info">
                                                    <h5 class="text-center"><em><b>INSTRUCTIONS</b></em></h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                        <div class="invoice-00003">
                            <div class="content-section  animated animatedFadeInUp fadeInUp">
                            <form action="" method="post" id="assessment3" name="assessment3">
                                <div class="row inv--product-table-section">
                                    <div class="col-lg-9">
                                        <div class="row inv--head-section">
                                            <div class="col-12 layout-spacing">
                                                <h3 class="in-heading">EXAMINATION</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="t-text">Select Class: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                                                            <option disabled selected>--Choose One--</option>
                                                            <option value="A">Primary 4b</option>
                                                            <option value="B">Primary 2a</option>
                                                            <option value="C">Primary 5c</option>
                                                            <option value="D">Primary 1a</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="t-text">Select Subject: </label> &ast;
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                                                            <option disabled selected>--Choose One--</option>
                                                            <option value="A">Mathematics</option>
                                                            <option value="B">Mathematics</option>
                                                            <option value="C">Mathematics</option>
                                                            <option value="D">Mathematics</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table table-hover">
                                            <table id="assessment1" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" scope="col">S/N</th>
                                                        <th width="20%" scope="col">Registration No</th>
                                                        <th width="55%" scope="col">Class List</th>
                                                        <th width="15%" scope="col">Examination</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Tiger Nixon Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-1-ass1" name="row-1-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Garrett Winters Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-2-ass1" name="row-2-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Ashton Cox Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-3-ass1" name="row-3-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Cedric Kelly Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-4-ass1" name="row-4-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Airi Satou Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-5-ass1" name="row-5-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Brielle Williamson Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-6-ass1" name="row-6-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Jennifer Chang Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Quinn Flynn Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Charde Marshall Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-7-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Haley Kennedy Garrett Tiger</td>
                                                        <td class="text-right"><input type="text" id="row-2-ass1" name="row-7-ass1" class="form-control" value="61"></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="10%" scope="col">S/N</th>
                                                        <th width="20%" scope="col">Registration No</th>
                                                        <th width="55%" scope="col">Class List</th>
                                                        <th width="15%" scope="col">Examination</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col text-right">
                                            <!-- <button class="mt-4 btn btn-primary" name="btnsubmit" id="btnsubmit">Update Table</button> &nbsp; &nbsp; -->
                                            <button class="btn btn-primary mb-4 mr-2 btn-lg" name="btnsubmit" id="btnsubmit">Update Table</button>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-6 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Class Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">Class Name: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Primary #</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Students in Class:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Male Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class=" inv-subtitle">No. of Female Students:</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">###</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-12 order-sm-1 order-0">
                                                <div class="inv--payment-info text-sm-left">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">Subject Info:</h6>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Subject: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mathematics</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Subject Type: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Core</p>
                                                        </div>
                                                        <!-- <div class="col-sm-6 col-6">
                                                            <p class="">Name of Teacher: </p>
                                                        </div>
                                                        <div class="col-sm-6 col-6">
                                                            <p class="">Mr. Johnson Oluwagbemi</p>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 border-left">
                                        <div class="row inv--head-section">
                                            
                                            <div class="col-sm-6 col-12 text-sm-right" style="margin-left: 50px;">
                                                <div class="company-info">
                                                    <h5 class="text-center"><em><b>INSTRUCTIONS</b></em></h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <!-- END ASSESSMENT SETUPS -->

                </div>

<!--                 <div class="inv--thankYou">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <p class="">Thank you for doing Business with us.</p>
                        </div>
                    </div>
                </div> -->

            </div>
            
        </div>

    </div>
</div>