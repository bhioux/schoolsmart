<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php echo $meta; ?>

    <?php echo $title; ?>

    <!-- vendor css -->
    <?php echo $css; ?>

  </head>
  <body class="az-body az-body-sidebar az-body-dashboard-nine">

    <div class="az-sidebar az-sidebar-sticky az-sidebar-indigo-dark">
      <div class="az-sidebar-header">
        <a href="index.html" class="az-logo">az<span>i</span>a</a>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500x500" alt=""></div>
        <div class="media-body">
          <h6>Aziana Pechon</h6>
          <span>Premium Member</span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <?php echo $mainnav; ?><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-nine">
      <?php echo $header; ?>
      <div class="az-content-header">
        <div class="az-content-header-top">
          <div>
            <h2 class="az-content-title mg-b-5 mg-b-lg-8">Hi, welcome back!</h2>
            <p class="mg-b-0">Your campaign monitoring dashboard template.</p>
          </div>
          <div class="az-dashboard-date">
            <div class="date">
              <div>20</div>
              <div>
                <span>OCT 2018</span>
                <span>Sunday</span>
              </div>
            </div><!-- az-dashboard-date -->
            <i class="icon ion-md-arrow-forward"></i>
            <div class="date">
              <div>27</div>
              <div>
                <span>OCT 2018</span>
                <span>Monday</span>
              </div>
            </div><!-- az-dashboard-date -->
          </div><!-- az-dashboard-date -->
        </div><!-- az-content-body-title -->
        <div class="nav-wrapper">
          <nav class="nav az-nav-line">
            <a href="#" class="nav-link active">Overview</a>
            <a href="#" class="nav-link">Earnings</a>
            <a href="#" class="nav-link">Reviews</a>
            <a href="#" class="nav-link">Notifications</a>
            <a href="#" class="nav-link">Web Settings</a>
            <a href="#" class="nav-link">Report Settings</a>
          </nav>
        </div><!-- nav-wrapper -->
      </div><!-- az-content-header -->
      <div class="az-content-body">

        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card card-dashboard-twentytwo">
              <div class="media">
                <div class="media-icon bg-purple"><i class="typcn typcn-chart-line-outline"></i></div>
                <div class="media-body">
                  <h6>32.53% <small class="down">-0.5%</small></h6>
                  <span>Bounce Rate</span>
                </div>
              </div>
              <div class="chart-wrapper">
                <div id="flotChart1" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card card-dashboard-twentytwo">
              <div class="media">
                <div class="media-icon bg-primary"><i class="typcn typcn-chart-line-outline"></i></div>
                <div class="media-body">
                  <h6>7,682 <small class="up">+0.1%</small></h6>
                  <span>Page Views</span>
                </div>
              </div>
              <div class="chart-wrapper">
                <div id="flotChart2" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
              <div class="media">
                <div class="media-icon bg-pink"><i class="typcn typcn-chart-line-outline"></i></div>
                <div class="media-body">
                  <h6>68.8 <small class="down">-2.1%</small></h6>
                  <span>New Sessions</span>
                </div>
              </div>
              <div class="chart-wrapper">
                <div id="flotChart3" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card card-dashboard-twentytwo">
              <div class="media">
                <div class="media-icon bg-teal"><i class="typcn typcn-chart-line-outline"></i></div>
                <div class="media-body">
                  <h6>2m:35s <small class="up">+0.8%</small></h6>
                  <span>Avg. Time on Site</span>
                </div>
              </div>
              <div class="chart-wrapper">
                <div id="flotChart4" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-xl-9 mg-t-20">
            <div class="card card-dashboard-twentyone">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <div class="card-body">
                    <h6 class="az-content-label">Users By Country</h6>
                    <p>The top locations where users of your product are located for this month</p>

                    <div class="list-group">
                      <div class="list-group-item">
                        <span>United States</span>
                        <span>5,508</span>
                        <div class="progress">
                          <div class="progress-bar wd-85p bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><!-- list-group-item -->
                      <div class="list-group-item">
                        <span>United Kingdom</span>
                        <span>5,122</span>
                        <div class="progress">
                          <div class="progress-bar wd-75p bg-indigo" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><!-- list-group-item -->
                      <div class="list-group-item">
                        <span>Russia</span>
                        <span>4,750</span>
                        <div class="progress">
                          <div class="progress-bar wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><!-- list-group-item -->
                      <div class="list-group-item">
                        <span>China</span>
                        <span>4,300</span>
                        <div class="progress">
                          <div class="progress-bar wd-55p bg-info" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><!-- list-group-item -->
                      <div class="list-group-item">
                        <span>Australia</span>
                        <span>4,018</span>
                        <div class="progress">
                          <div class="progress-bar wd-45p bg-teal" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div><!-- list-group-item -->
                    </div><!-- list-group -->
                  </div>
                </div>
                <div class="col-md-8">
                  <div id="vmap" class="vmap-wrapper"></div>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-md-4 col-xl-3 mg-t-20">
            <div class="card card-body card-dashboard-twentythree ht-xl-100p">
              <h6 class="card-title tx-14 mg-b-10">Mobile Sessions</h6>
              <p class="mg-b-15">The percentage of users who uses mobile devices compare to other devices.</p>

              <div class="d-flex flex-column align-items-center mg-b-25">
                <div>
                  <div class="az-donut-chart chart1">
                    <div class="slice one"></div>
                    <div class="slice two"></div>
                    <div class="chart-center">
                      <span></span>
                    </div>
                  </div>
                </div>
              </div><!-- d-flex -->

              <div class="row row-sm">
                <div class="col-6">
                  <label><span class="bg-indigo"></span> Mobile</label>
                  <h5>6,098</h5>
                </div>
                <div class="col-6">
                  <label><span class="bg-gray-500"></span> Desktop</label>
                  <h5>3,902</h5>
                </div>
              </div><!-- row -->
            </div>
          </div>
          <div class="col-md-8 col-xl-6 mg-t-20">
            <div class="card card-dashboard-audience-metrics ht-md-100p">
              <div class="card-header">
                <h6 class="card-title">Audience Metrics</h6>
                <p class="mg-b-15">Measures your user's sessions and page views metrics to your website for this month.</p>
              </div><!-- card-header -->
              <div class="card-body">
                <div>
                  <h4>120,500</h4>
                  <label><span class="bg-primary"></span>Users</label>
                </div>
                <div>
                  <h4>360,108</h4>
                  <label><span class="bg-teal"></span>Page Views</label>
                </div>
                <div>
                  <h4>150,712</h4>
                  <label><span class="bg-pink"></span>Sessions</label>
                </div>
              </div><!-- card-top-content -->
              <div class="chart-wrapper">
                <div id="flotChart5" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-xl-6 mg-t-20">
            <div class="card card-dashboard-audience-metrics">
              <div class="card-header">
                <h6 class="card-title">Traffic Sources</h6>
                <p class="mg-b-15">Measures your user's sources that generate traffic metrics to your website for this month.</p>
              </div><!-- card-header -->
              <div class="card-body">
                <div>
                  <h4>86,376</h4>
                  <label><span class="bg-purple"></span>Organic</label>
                </div>
                <div>
                  <h4>25,001</h4>
                  <label><span class="bg-primary"></span>Direct</label>
                </div>
                <div>
                  <h4>12,909</h4>
                  <label><span class="bg-teal"></span>Referral</label>
                </div>
              </div><!-- card-top-content -->
              <div class="chart-wrapper">
                <div id="flotChart6" class="flot-chart"></div>
              </div><!-- chart-wrapper -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- az-content-body -->
      <?php echo $footer; ?>
    </div><!-- az-content -->


    <?php echo $js; ?>

    <?php echo $dashboardscripts; ?>

    <?php echo $formscripts; ?>
    
  </body>
</html>
