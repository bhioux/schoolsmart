<?php
 //var_dump($_SESSION['studentview']); exit;
 $studentview = $_SESSION['studentview'] ?? [];
?>
<div class="row row-form">
    <div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                <nav class="breadcrumb-one float-left">
                    <a href="<?= base_url() ?>/updatestaffprofile">Edit Profile</a>
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

<div class="row layout-spacing">

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
                        <!-- <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> Web Developer
                        </li> -->
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><?= @strtoupper($_SESSION['category']) ?>
                        </li>
                        <!-- <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>New York, USA
                        </li> -->
                        <li class="contacts-block__item">
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></circle></svg><?= $studentview->email ?? '' ?></a>
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> <?= $studentview->phonenumber ?? '' ?>
                        </li>
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

    <div class="education layout-spacing ">
      <div class="widget-content widget-content-area">
        <h3 class="">Assigned Classes</h3>
                                <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Classes</th>
                                        <th>No. of Student</th>
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
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Classes</th>
                                        <th>No. of Student</th>
                                        <th class="no-content">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
        
      </div>
    </div>

    <div class="work-experience layout-spacing">
        
      <div class="widget-content widget-content-area">

        <a href="<?= base_url() ?>/gradebook/setup"><h3 class="btn btn-secondary">Gradebook Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/traitssetup"><h3 class="btn btn-secondary">Observable Traits' Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/affectiveareasetup"><h3 class="btn btn-secondary">Affective Area Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/socialhabitsetup"><h3 class="btn btn-secondary">Social Habit Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/billsetup"><h3 class="btn btn-secondary">Students Bill Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/commentssetup"><h3 class="btn btn-secondary">Comments Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/awardsetup"><h3 class="btn btn-secondary">Prizes & Awards Setup</h3></a>
        <br>
        <a href="<?= base_url() ?>/assessmentsetup"><h3 class="btn btn-secondary">Assessment Type Setup</h3></a>
        
        <!-- <div class="timeline-alter"> -->
        
          <!-- <div class="item-timeline">
            <div class="t-meta-date">
              <p class="">Assessment 1</p>
            </div>
            <div class="t-dot">
            </div>
            <div class="t-text">
              <a href="gradebooksetup">Setup CA 1</a>
              <p>Netfilx Inc.</p>
              <p>Designer Illustrator</p>
            </div>
          </div> -->

          <!-- <div class="item-timeline">
            <div class="t-meta-date">
              <p class="">Assessment 2</p>
            </div>
            <div class="t-dot">
            </div>
            <div class="t-text">
              <a href="gradebooksetup">Setup CA 2</a>
              <p>Google Inc.</p>
              <p>Designer Illustrator</p>
            </div>
          </div> -->

          <!-- <div class="item-timeline">
            <div class="t-meta-date">
              <p class="">Examination</p>
            </div>
            <div class="t-dot">
            </div>
            <div class="t-text">
              <a href="gradebooksetup">Setup Exam</a>
              <p>Design Reset Inc.</p>
              <p>Designer Illustrator</p>
            </div>
          </div> -->

        <!-- </div> -->
      </div>

    </div>

  </div>

  <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

    <div class="experience layout-spacing ">
      <div class="widget-content widget-content-area">
        <div class="row layout-spacing">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 layout-top-spacing">
            <div class="education layout-spacing ">
              <div class="widget-content widget-content-area">
                <h3 class="">Education</h3>
                <div class="timeline-alter">
                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">04 Mar 2009</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>Royal Collage of Art</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>
                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">25 Apr 2014</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>Massachusetts Institute of Technology (MIT)</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>
                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">04 Apr 2018</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>School of Art Institute of Chicago (SAIC)</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 layout-top-spacing">
            <div class="work-experience layout-spacing ">
          
              <div class="widget-content widget-content-area">

                <h3 class="">Work Experience</h3>
                  
                <div class="timeline-alter">
                
                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">04 Mar 2009</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>Netfilx Inc.</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>

                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">25 Apr 2014</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>Google Inc.</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>

                  <div class="item-timeline">
                    <div class="t-meta-date">
                      <p class="">04 Apr 2018</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                      <p>Design Reset Inc.</p>
                      <p>Designer Illustrator</p>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="skills layout-spacing ">
      <div class="widget-content widget-content-area">
        <h3 class="">Skills</h3>
        <div class="progress br-30">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>PHP</span> <span>25%</span> </div></div>
        </div>
        <div class="progress br-30">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Wordpress</span> <span>50%</span> </div></div>
        </div>
        <div class="progress br-30">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>Javascript</span> <span>70%</span> </div></div>
        </div>
        <div class="progress br-30">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>jQuery</span> <span>60%</span> </div></div>
        </div>

      </div>
    </div>

    <div class="bio layout-spacing ">
      <div class="widget-content widget-content-area">
        <h3 class="">Bio</h3>
        <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>

        <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula scelerisque vulputate.</p>

        <div class="bio-skill-box">

          <div class="row">
              
            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                
              <div class="d-flex b-skills">
                <div>
                </div>
                <div class="">
                  <h5>Sass Applications</h5>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                </div>
              </div>

            </div>

            <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                
              <div class="d-flex b-skills">
                <div>
                </div>
                <div class="">
                  <h5>Github Countributer</h5>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                </div>
              </div>

            </div>


          </div>

        </div>

      </div>                                
    </div>

  </div>

</div>


            