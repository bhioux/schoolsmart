<?php
 $studentview = $_SESSION['studentview'] ?? [];
?>
<div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                <nav class="breadcrumb-one float-left">
                    <a href="updateprofile">Edit Profile</a>
                </nav>

                <nav class="breadcrumb-one float-right" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('/logout') ?>">Logout</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page"><span>UI Kit</span></li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_SESSION['message'])){
    ?>
        <div class="alert alert-info">
            <?php //print_r($_SESSION['message']); ?>
            sdfdsfdsfds
        </div>
    <?php
    }
?>

<div class="row row-form">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Profile</h3>
                    <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="assets/img/90x90.jpg" alt="avatar">
                    <p class="">
                        <?php
                        if(isset($_SESSION['username'])){
                            echo $studentview->fullname ?? '';
                            echo '<br />';
                            echo $_SESSION['username']; 
                        }
                        
                        ?>
                    </p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item test-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> <b><?= @strtoupper($_SESSION['category']) ?></b>
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><?= $studentview->class ?? '' ?>
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><?= $studentview->email ?? '' ?>
                            </li>
                            <!-- <li class="contacts-block__item">
                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>Jimmy@gmail.com</a>
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> +1 (530) 555-12121
                            </li> -->
                            <li class="contacts-block__item">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>

        <div class="work-experience layout-spacing ">
                            
            <div class="widget-content widget-content-area">

                <h3 class="">AFFECTIVE AREAS</h3>
                
                <div class="timeline-alter">
                
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Punctuality</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Excellent</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Neatness</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Average</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Politeness</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Good</p>
                        </div>
                    </div>
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Honesty</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Good</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Relationship with others</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Excellent</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Leadership</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Average</p>
                        </div>
                    </div>
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Emotional Stability</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Good</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Health</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Excellent</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Attitude to School Work</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Average</p>
                        </div>
                    </div>
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Attentiveness</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Good</p>
                        </div>
                    </div>

                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">Perseverance</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Excellent</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

        <div class="skills layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">SOCIAL AND STUDY HABIT</h3>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Creativity</span> <span>45%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Verbal Fluency</span> <span>50%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Games</span> <span>70%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Sports</span> <span>60%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Handling tools</span> <span>50%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Drawing & Painting</span> <span>70%</span> </div></div>
                </div>
                <div class="progress br-30">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Musical Skills</span> <span>60%</span> </div></div>
                </div>

            </div>
        </div>

        <div class="main-container sidebar-closed sbar-open" id="container">
            <!--  BEGIN CONTENT AREA  -->        
        
            <div class="col-xl-12 col-lg-12 col-sm-12 ">

                <h3 style="margin-bottom: 20px;">Academic Performances</h3>

                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>No. in Class</th>
                                    <th>Position</th>
                                    <th>Awards</th>
                                    <th class="no-content">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2000/2001</td>
                                    <td>Primary 2</td>
                                    <td>45</td>
                                    <td>6</td>
                                    <td>2011/04/25</td>
                                    <td><a href="http://"><b><em>View Report</em></b></a></td>
                                </tr>
                                <tr>
                                    <td>2001/2002</td>
                                    <td>Primary 3</td>
                                    <td>46</td>
                                    <td>8</td>
                                    <td>2011/07/25</td>
                                    <td><a href="http://"><b><em>View Report</em></b></a></td>
                                </tr>
                                <tr>
                                    <td>2002/2003</td>
                                    <td>Primary 4</td>
                                    <td>44</td>
                                    <td>6</td>
                                    <td>2009/01/12</td>
                                    <td><a href="http://"><b><em>View Report</em></b></a></td>
                                </tr>
                                <tr>
                                    <td>2003/2004</td>
                                    <td>Primary 5</td>
                                    <td>46</td>
                                    <td>8</td>
                                    <td>2011/07/25</td>
                                    <td><a href="http://"><b><em>View Report</em></b></a></td>
                                </tr>
                                <tr>
                                    <td>2004/2005</td>
                                    <td>Primary 6</td>
                                    <td>44</td>
                                    <td>6</td>
                                    <td>2009/01/12</td>
                                    <td><a href="http://"><b><em>View Report</em></b></a></td>
                                </tr>
                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>No. in Class</th>
                                    <th>Position</th>
                                    <th>Awards</th>
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