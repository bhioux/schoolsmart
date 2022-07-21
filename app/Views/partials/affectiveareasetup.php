<?php
    use App\Libraries\Util;
    $utillib = new Util();
    $junior = ['punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithstaffs', 'relationshipwithothers', 'leadership'];
    $hidden = 'style="display:none;visibility:hidden"';
    // dd($utillib->selectaffectiverating(""));
?>

<script>
    // Disable other fields
    // var formw = document.querySelector('#frmrating');
    // imps = formw.querySelectorAll('#punctuality, #neatness, #politeness, #honesty, #relationshipwithstaffs');
    // imps.forEach(element => {
    // element.value = ''
    // $(element).prop('disabled','true');
    // });

    


    function editAction1(obj){
        //alert(9990)
        targeturl = $("#loadstudentrecordurl").val();
        alert(obj.title)
        $.ajax({
                url: targeturl, // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: true,
                data: { regNo: obj.title },
                type: 'get',
                //method: 'POST',
                success: function (data) {
                    //alert("Record successfully added");
                    //parsedData = JSON.parse(data)
                    alert(data.data.surname)
                    console.log(data.data)
                    //return false;
                    if(data.success == 1){

                        // 'studentid', 'surname', 'othernames', 'class', 'regno', 'session', 'term', 'affectiverecordid', 
                        // 'punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithothers', 'leadership', 'emotionalstability', 'health', 'attitudetoschoolwork', 'attentiveness', 'persevearance', 'attendance', 'reliability', 'selfcontrol', 'cooperation', 'responsibility', 'innitiative', 'orgability', 'verbalfluency', 'games', 'sports', 'drawingpainting', 'musicalskills', 'handlingtools'

                        $("#punctuality").prop('selected','selected').val(data.data.punctuality).change();
                        $("#neatness").prop('selected','selected').val(data.data.neatness).change();
                        $("#politeness").prop('selected','selected').val(data.data.politeness).change();
                        $("#honesty").prop('selected','selected').val(data.data.honesty).change();
                        $("#relationshipwithothers").prop('selected','selected').val(data.data.relationshipwithothers).change();
                        $("#leadership").prop('selected','selected').val(data.data.leadership).change();
                        $("#emotionalstability").prop('selected','selected').val(data.data.emotionalstability).change();
                        $("#health").prop('selected','selected').val(data.data.health).change();
                        $("#attitudetoschoolwork").prop('selected','selected').val(data.data.attitudetoschoolwork).change();
                        $("#attentiveness").prop('selected','selected').val(data.data.attentiveness).change();
                        $("#persevearance").prop('selected','selected').val(data.data.persevearance).change();
                        $("#attendance").prop('selected','selected').val(data.data.attendance).change();
                        $("#reliability").prop('selected','selected').val(data.data.reliability).change();
                        $("#selfcontrol").prop('selected','selected').val(data.data.selfcontrol).change();
                        $("#cooperation").prop('selected','selected').val(data.data.cooperation).change();
                        $("#responsibility").prop('selected','selected').val(data.data.responsibility).change();
                        $("#innitiative").prop('selected','selected').val(data.data.innitiative).change();
                        $("#orgability").prop('selected','selected').val(data.data.orgability).change();
                        $("#verbalfluency").prop('selected','selected').val(data.data.verbalfluency).change();
                        $("#games").prop('selected','selected').val(data.data.games).change();
                        $("#sports").prop('selected','selected').val(data.data.sports).change();
                        $("#drawingpainting").prop('selected','selected').val(data.data.drawingpainting).change();
                        $("#musicalskills").prop('selected','selected').val(data.data.musicalskills).change();
                        $("#handlingtools").prop('selected','selected').val(data.data.handlingtools).change();
                        // $("#btnsubmit").removeAttr("disabled");
                        // $("#btnsubmit").html(btnsubmit);
                        $("#studentnamelabel").html(data.data.surname + " " + data.data.othernames);
                        $("#studentidlabel").html(data.data.studentno);
                        $("#studentclasslabel").html(data.data.class)
                        console.log( "Data Loaded: " + data );
                        // $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-success').html('success <strong>Success </strong>Record saved!')

                        // var formw = document.querySelector('#frmstaffprofile');
                        // imps = formw.querySelectorAll('input[type="text"], select');
                        // imps.forEach(element => {
                        // element.value = ''
                        // $(element).prop('selected','selected').val('').change();
                        // });

                        // $("#staffid").val('');
                        // $("#btnsubmit").val('Submit').text(btnsubmit);
                        console.log('Data about to be refreshed');
                        staffprofiletable.ajax.reload();
                        console.log('Data refreshed');

                    }else{
                        alert("<strong>Error </strong>Save faileds!" );
                        //console.log("Invalid file format")
                        $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html("'<strong>Error </strong>Save failed!'")
                        // $("#btnsubmit").removeAttr("disabled");
                        // $("#btnsubmit").html(btnsubmit);
                        console.log(data + 'Data error');
                        //return false;
                    }
                    
                },
                error: function (error) {
                    alert("<strong>Error </strong>Save faileded!" + error );
                    // parsedData = JSON.parse(data)
                    console.log(error)
                    // $("#btnsubmit").removeAttr("disabled");
                    // $("#btnsubmit").html(btnsubmit);
                    console.log( "error occured: " + error.message );
                    //notify.update({ type: 'danger', message: '<strong>Error </strong>' + error.message });
                    $("#notifier").removeClass('alert alert-danger alert-warning alert-success').addClass('alert alert-danger').html('<strong>Error </strong>' + error.message)
                    return false
                }
            });
    }

    function showform(obj){
        //$("#placeholder").attr('hidden', false);
        //$("#realform").attr('hidden', true);
        event.preventDefault()
        alert(obj.title)
        
        var studentno  = obj.title;
        var classId = $('#classgroup option:selected').text();
        if($('#classgroup').children("option:selected").val() == ''){
            alert("Please make sure Class ");
            return false;
        }else{
            alert(classId);
            var studenbyclassturl = $("#studentlisttableurl").val() + '?sentClassId=' + classId;
            //studentlisttable.ajax.url(studenbyclassturl).load();   
            var affectiveareatableurl = $("#affectiveareatableurl").val() + '?sentClassId=' + classId;
            //affectivearealisttable.ajax.url(affectiveareatableurl).load();  
        }
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

<form >


<div class="row invoice layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row inv--head-section justify-content-md-center">
                <div class="col-lg-12">
                <h3 class="in-heading">AFFECTIVE AREA SETUP</h3>
                    <div class="form-group"> 
                        <!-- loadstudentrecord -->
                        <div class="form-group">
                            <input type="hidden" name="posturl" id="posturl" value="<?= site_url('gradebook/postgradebook'); ?>">
                            <input type="hidden" name="editurl" id="editurl" value="<?= site_url('gradebook/updategradebook'); ?>"> 
                            <input type="hidden" name="editratingsurl" id="editratingsurl" value="<?= site_url('setup/editratingsurl'); ?>"> 
                            <input type="hidden" name="studentlisttableurl" id="studentlisttableurl" value="<?= site_url('setup/affectiveAreatable') ?>" />
                            <input type="hidden" name="loadstudentrecordurl" id="loadstudentrecordurl" value="<?= site_url('setup/loadstudentrecord') ?>" />
                            <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                                <option value='' selected>--Choose Class To Load Students--</option>
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
            <!-- </div> -->
        </div>
        <div class="app-hamburger-container">
            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
        </div>
        <div class="doc-container">
            <div class="tab-title">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <!-- <div class="search">
                            <input type="text" class="form-control" placeholder="Search">
                        </div> -->
                        <!-- <div class="col-md-12 col-sm-12 col-12">
                            <h4 class="title-heading"><strong>STUDENT NAMES</strong></h4>
                        </div>
                        <br> -->
                        <div class="widget-content widget-content-area br-6">
                            <h4 class="title-heading"><strong><u>STUDENT NAMES</u></strong></h4>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="studentlisttable" class="table table-hover table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <!--<tbody>
                                        <tr class="list-actions" id="invoice-00001" data-invoice-id="00001">
                                            <td>1</td>
                                            <td>Johnson Oladunni</td>
                                        </tr>
                                        <tr class="list-actions" id="invoice-00002" data-invoice-id="00002">
                                            <td>2</td>
                                            <td>Johnson Olufemi</td>
                                        </tr>
                                    </tbody>-->
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="invoice-container">
                <div class="invoice-inbox">

                    <div clas="inv-not-selected" id="placeholder">
                        <p>Select a class from above to setup the Affective Area.</p>
                    </div>
                    
                    <div id="realform" class="active">
                        
                        
                        <div clas="invoice-00002" id="invoice2">
                            <form name="frmrating" id="frmrating">
                                <div class="content-section  animated">

                                    <div class="row inv--product-table-section">
                                        <div class="col-lg-5">
                                            <div class="row inv--head-section">
                                                <div class="col-12 layout-spacing">
                                                    <h6>
                                                        <span><b>Student ID:</b></span> 
                                                        <span id="studentidlabel"></span>
                                                    </h6>
                                                    <h6>
                                                        <span><b>Student Name:</b></span> 
                                                        <span id="studentnamelabel"></span>
                                                    </h6>
                                                    <h6>
                                                        <span><b>Class:</b></span> 
                                                        <span id="studentclasslabel"></span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="table-responsive mb-4 mt-4">
                                                <table id="assessment1" style="width:100%" class="table table-responsive table-stripped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th width="50%" scope="col">Affective Area</th>
                                                            <th width="50%" scope="col">Ratings</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Punctuality</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="punctuality" name="punctuality" <?= (in_array('punctuality', $junior)) ? "disabled":'required' ?>>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Neatness</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="neatness" name="neatness" <?= (in_array('punctuality', $junior)) ? "disabled":'required' ?>>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Politeness</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="politeness" name="politeness" required>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Honesty</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="honesty" name="honesty" required>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Relationship with Staffs</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="relationshipwithstaffs" name="relationshipwithstaffs" required>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Relationship with others</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="relationshipwithothers" name="relationshipwithothers" required>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Leadership</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="leadership" name="leadership" required>
                                                                        <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Emotional Stability</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="emotionalstability" name="emotionalstability" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Health</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="health" name="health" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Attitude to School Work</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="attitudetoschoolwork" name="attitudetoschoolwork" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Attentiveness</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="attentiveness" name="attentiveness" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Perseverance</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="perseverance" name="perseverance" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>attendance in class</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="attendanceinclass" name="attendanceinclass" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>reliability</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="reliability" name="reliability" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>selfcontrol</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="selfcontrol" name="selfcontrol" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>cooperation</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="cooperation" name="cooperation" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>responsibility</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="responsibility" name="responsibility" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>initiative</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="initiative" name="initiative" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>organisational ability</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="organisationalability" name="organisationalability" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>fluency</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="fluency" name="fluency" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>games</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="games" name="games" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>sports</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="sports" name="sports" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>drawing and painting</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="drawingandpainting" name="drawingandpainting" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>musical skills</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="musicalskills" name="musicalskills" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>handling of tools</td>
                                                            <td class="text-right">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="handlingoftools" name="handlingoftools" required>
                                                                    <?= $utillib->selectaffectiverating("") ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th width="50%" scope="col">Observable Traits'</th>
                                                            <th width="50%" scope="col">Ratings</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            
                                            <div class="col text-right">
                                                <!-- <input type="submit" id="btnsubmit" name="btnsubmit" value="Save Ratings" class="btn btn-primary mb-4 mr-2 btn-lg" /> -->
                                                <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary mb-4 mr-2 btn-lg">Save Ratings</button>
                                            </div>

                                        </div>
                                        <div class="col-lg-7 border-left">
                                            <div class="main-container sidebar-closed sbar-open" id="container">
                                                <!--  BEGIN CONTENT AREA  -->        
                                            
                                                <div class="col-xl-12 col-lg-12 col-sm-12 ">

                                                <h3 style="margin-bottom: 20px;">Affective Area Score List</h3>

                                                <div class="widget-content widget-content-area br-6">
                                                    <div class="table-responsive mb-4 mt-4">
                                                    <table id="studentprofiletable" class="table table-hover" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Appln. No.</th>
                                                            <th>Name</th>
                                                            <th>Remarks</th>
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
                            </form>
                        </div> 
                    </div>


                </div>

                <!-- <div class="inv--thankYou">
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

</form>




<script type="text/javascript">
    $('.selectedstudent').on('click', function (e) {
        alert(e.target)
        e.preventDefault();
       
        var $href = $(this).attr('href');
        $(this).addClass('active');

        $('#' + $href).addClass('active'); // this is what you need to do
    });
</script>