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
        <div class="row inv--head-section justify-content-md-center">
            <!-- <div class="col-lg-8 col-offset-2"> -->
                <!-- <div class="col-12 layout-spacing justify-content-md-center">
                    <h3 class="in-heading">ASSESSMENT SETUP</h3>
                </div> -->
                <!-- <div class="col-lg-6">
                    <h3 class="in-heading">ASSESSMENT SETUP</h3>
                </div> -->
                <div class="col-lg-6">
                <h3 class="in-heading">OBSERVABLE TRAITS' SETUP</h3>
                <br>
                    <div class="form-group">
                        <?= csrf_field() ?>
                        <label for="t-text">Select Class: </label> &ast;
                        <div class="form-group">
                          <!-- hidden fields -->
                          <input type="hidden" name="studenbyclassturl" id="studenbyclassturl" value="<?= site_url('setup/studentbyclass'); ?>">
                          <input type="hidden" name="affectiveareatableurl" id="affectiveareatableurl" value="<?= site_url('setup/affectivearea'); ?>">   
                            <select class="selectpicker form-control" id="classgroup" name="classgroup" required>
                                <option disabled selected>--Choose One--</option>
                                <?php
                                    foreach($classrecs as $classrec){
                                        $classId =  $classrec->classtype . $classrec->classname . $classrec->classgroup;
                                        $classfullname =  $classrec->classtype . " ". $classrec->classname . $classrec->classgroup;
                                        echo "<option value='$classId'>$classfullname</option>";
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
                                <table id="studentlisttable" name="studentlisttable" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N.</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <ol class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                    <div class="f-m-body">
                                        <div class="f-head">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        </div>
                                        <div class="f-body">
                                            <p class="invoice-number">Student ID #00001</p>
                                            <p class="invoice-customer-name"> Jesse Cory</p>
                                            <p class="invoice-generated-date">Date: 12 Apr 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol> -->
                    </div>
                </div>
            </div>
            <div class="invoice-container">
                <div class="invoice-inbox">

                    <div class="">
                        <div class="invoice-00003">
                            <div class="content-section  animated animatedFadeInUp fadeInUp">
                                <div class="row inv--product-table-section">
                                    <div class="col-lg-5">
                                        <div class="" id="traits" style="display:none;">
                                            <form id="assessmentform">                                        
                                                <div class="row inv--head-section">
                                                    <!-- <div class="col-12 layout-spacing">
                                                        <h3 class="in-heading">Observable Traits' Setup</h3>
                                                    </div>
                                                    <br> -->
                                                    <div class="col-12 layout-spacing">
                                                        <input type="hidden" name="regNo" id="regNo" value="">
                                                        <input type="hidden" name="session" id="session" value="<?= $_SESSION['schoolsession'] ?? 3 ?>">
                                                        <input type="hidden" name="term" id="term" value="<?= $_SESSION['schoolterm'] ?? 2 ?>">
                                                        <input type="hidden" name="classId" id="classId" value="">                                                    
                                                        <input type="hidden" name="studentIdX" id="studentIdX" value=""> 
                                                        <h4><span id="studentId">Student ID:</span></h4>
                                                        <h4><span id="studentName">Student Names:</span></h4>
                                                    </div>
                                                </div>
                                                <div class="table table-hover">
                                                    <table id="assessment1" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="50%" scope="col">Observable Traits'</th>
                                                                <th width="50%" scope="col">Ratings</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Punctuality</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="punctuality" name="punctuality" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Neatness</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="neatness" name="neatness" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Politeness</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="politeness" name="politeness" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Honesty</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="honesty" name="honesty" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship  with Staff</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="relwithstaff" name="relwithstaff" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Relationship with others</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="relwithothers" name="relwithothers" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Leadership</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="leadership" name="leadership" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Emotional Stability</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="emotionalstability" name="emotionalstability" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Health</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="health" name="health" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Attitude to School Work</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="attitude" name="attitude" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Attentiveness</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="attentiveness" name="attentiveness" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Perseverance</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="perseverance" name="perseverance" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Attendance in Class</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="attendance" name="attendance" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Reliability</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="reliability" name="reliability" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>20181241
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Self Control</td>                                                        
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="selfcontrol" name="selfcontrol" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>                                                       
                                                                <td>Cooperation</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="cooperation" name="cooperation" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Responsibility</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="responsibility" name="responsibility" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Initiative</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="initiative" name="initiative" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Organisational Ability</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="orgability" name="orgability" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fluency</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="fluency" name="fluency" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>                                                        
                                                                <td>Games</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="games" name="games" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sports</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="sports" name="sports" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Drawing & Painting</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="drawing" name="drawing" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Musical Skills</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="music" name="music" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>                                                        
                                                                <td>Handling of Tools</td>
                                                                <td class="text-right">
                                                                    <div class="form-group">
                                                                        <select class="form-control" id="handlingtools" name="handlingtools" required>
                                                                            <option hidden>Rate Students</option>
                                                                            <option value="5">5</option>
                                                                            <option value="4">4</option>
                                                                            <option value="3">3</option>
                                                                            <option value="2">2</option>
                                                                            <option value="1">1</option>
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
                                                    <button type="button" id="btnSaveRatings" class="btn btn-primary mb-4 mr-2 btn-lg">Save Ratings</button>
                                                </div>                                            
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 border-left">
                                        <div class="main-container sidebar-closed sbar-open" id="container">
                                            <!--  BEGIN CONTENT AREA  -->        
                                        
                                            <div class="col-xl-12 col-lg-12 col-sm-12 ">

                                            <h3 style="margin-bottom: 20px;">Students Traits' Score List</h3>

                                            <div class="widget-content widget-content-area br-6">
                                                <div class="table-responsive mb-4 mt-4">
                                                <table id="affectivearealisttable" name="affectivearealisttable" class="table table-hover" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Appln. No.</th>
                                                        <th>Name</th>
                                                        <th>Remarks</th>
                                                        <th class="no-content">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            </div>    
                                            <!--  END CONTENT AREA  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="invoice-header-section">
                        <h4 class="inv-number"></h4>
                        <div class="invoice-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        </div>
                    </div> -->
                    
                    <div id="ct" class="" style="">
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
<script type="text/javascript">
    $('a').on('click', function (e) {
        e.preventDefault();
        var $href = $(this).attr('href');
        $(this).addClass('active');

        $('#' + $href).addClass('active'); // this is what you need to do
    });
</script>
<script type="text/javascript">
    function editAction(obj){
        $("#traits").show();
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';  
        var url = '<?php echo site_url('staff/editregistration'); ?>';
        //alert(url);
        $.post({
            url:url,
            data: { studentid: obj.title, [csrfName]:  csrfHash },
            type:'POST',
            dataType: 'json',
            success: function(json) {
                /************Clear All values*******************/
                $("#studentId").val('');
                $("#studentName").val('');
                // /************Load New values*******************/                    
                $("#regNo").val(json.formarray.regno);
                $("#classId").val(json.formarray.class);
                $("#studentIdX").val(json.formarray.studentid);
                $("#studentId").text("Student ID: " + json.formarray.studentid);
                $("#studentName").text("Student ID: " + json.formarray.surname);

                //get student affective area
                var regNo = "regNo=" + json.formarray.regno;
                $.post('<?php echo site_url('setup/fetchaffectivearea'); ?>', regNo).done(function(data){
                    var data = $.parseJSON(data);
                    if(data !=0){
                        $("#punctuality").val(data.punctuality);
                        $("#neatness").val(data.neatness);
                        $("#politeness").val(data.politeness);
                        $("#honesty").val(data.honesty);
                        $("#relwithstaff").val(data.relationshipwithstaffs);
                        $("#relwithothers").val(data.relationshipwithothers);
                        $("#leadership").val(data.leadership);
                        $("#emotionalstability").val(data.emotionalstability);
                        $("#health").val(data.health);
                        $("#attitude").val(data.attitudetoschoolwork);
                        $("#attentiveness").val(data.attentiveness);
                        $("#perseverance").val(data.persevearance);
                        $("#attendance").val(data.attendanceinclass);
                        $("#reliability").val(data.reliability);
                        $("#selfcontrol").val(data.selfcontrol);
                        $("#cooperation").val(data.cooperation);
                        $("#responsibility").val(data.responsibility);
                        $("#initiative").val(data.initiative);
                        $("#orgability").val(data.organisationalability);
                        $("#fluency").val(data.fluency);
                        $("#games").val(data.games);
                        $("#sports").val(data.sports);
                        $("#drawing").val(data.drawingandpainting);
                        $("#music").val(data.musicalskills);
                        $("#handlingtools").val(data.handlingoftools);
                    }else{
                        $("#punctuality").val(0);
                        $("#neatness").val(0);
                        $("#politeness").val(0);
                        $("#honesty").val(0);
                        $("#relwithstaff").val(0);
                        $("#relwithothers").val(0);
                        $("#leadership").val(0);
                        $("#emotionalstability").val(0);
                        $("#health").val(0);
                        $("#attitude").val(0);
                        $("#attentiveness").val(0);
                        $("#perseverance").val(0);
                        $("#attendance").val(0);
                        $("#reliability").val(0);
                        $("#selfcontrol").val(0);
                        $("#cooperation").val(0);
                        $("#responsibility").val(0);
                        $("#initiative").val(0);
                        $("#orgability").val(0);
                        $("#fluency").val(0);
                        $("#games").val(0);
                        $("#sports").val(0);
                        $("#drawing").val(0);
                        $("#music").val(0);
                        $("#handlingtools").val(0);
                    }

                });
                //$("#btnsubmit").val();
                //$("#btnsubmit").val('edit').text('Update')
                return false;
            }
        });
        return false;
    }   
    function saveRatings(){
        var punctuality = $("#punctuality").val();
        var neatness = $("#neatness").val();
        var politeness = $("#politeness").val();
        var honesty = $("#honesty").val();
        var relwithstaff = $("#relwithstaff").val();
        var relwithothers = $("#relwithothers").val();
        var leadership = $("#leadership").val();
        var emotionalstability = $("#emotionalstability").val();
        var health = $("#health").val();
        var attitude = $("#attitude").val();
        var attentiveness = $("#attentiveness").val();
        var perseverance = $("#perseverance").val();
        var attendance = $("#attendance").val();
        var reliability = $("#reliability").val();
        var selfcontrol = $("#selfcontrol").val();
        var cooperation = $("#cooperation").val();
        var responsibility = $("#responsibility").val();
        var initiative = $("#initiative").val();
        var orgability = $("#orgability").val();
        var fluency = $("#fluency").val();
        var games = $("#games").val();
        var sports = $("#sports").val();
        var drawing = $("#drawing").val();
        var music = $("#music").val();
        var handlingtools = $("#handlingtools").val();
        // if(punctuality=='Rate Students'  || neatness=='Rate Students' || politeness=='Rate Students' || honesty=='Rate Students' || relwithstaff=='Rate Students' || relwithothers=='Rate Students' || leadership=='Rate Students' || emotionalstability=='Rate Students' || health=='Rate Students' || attitude=='Rate Students' || attentiveness=='Rate Students' || perseverance=='Rate Students' || attendance=='Rate Students' || reliability=='Rate Students' || selfcontrol=='Rate Students' || cooperation=='Rate Students' || responsibility=='Rate Students' || initiative=='Rate Students' || orgability=='Rate Students' || fluency=='Rate Students' || games=='Rate Students' || sports=='Rate Students' || drawing=='Rate Students' || music=='Rate Students' || handlingtools=='Rate Students'){
        //     alert("All fields are required");
        // }else{

        // }
        var formdata = $("#assessmentform").serialize();
        $.post('<?php echo site_url('setup/updateaffectivearea'); ?>', formdata).done(function(data){
            alert(data);
        });        
    } 
</script>