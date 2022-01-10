<ul class="nav">
  <li class="nav-label">Main Menu</li>
  <li class="nav-item active show">
    <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Dashboard</a>
    <nav class="nav-sub">
      <?php
/*      foreach ($variable as $key => $value) {
        # code...
      }*/
      //var_dump($adminmenu);
      //var_dump($adminmenu->recordarray); exit;
      $adminnav = json_decode($adminmenu);
      foreach($adminnav as $menu){
        echo '<a href="'.site_url('admin/'.$menu->menulink).'" class="nav-sub-link">'.ucwords($menu->menutext).'</a>';
      }
      ?>
      <!-- <a href="dashboard-one.html" class="nav-sub-link">Web Analytics</a>
      <a href="dashboard-two.html" class="nav-sub-link">Sales Monitoring</a>
      <a href="dashboard-three.html" class="nav-sub-link">Ad Campaign</a>
      <a href="dashboard-four.html" class="nav-sub-link">Event Management</a>
      <a href="dashboard-five.html" class="nav-sub-link">Helpdesk Management</a>
      <a href="dashboard-six.html" class="nav-sub-link">Finance Monitoring</a>
      <a href="dashboard-seven.html" class="nav-sub-link">Cryptocurrency</a>
      <a href="dashboard-eight.html" class="nav-sub-link">Executive / SaaS</a>
      <a href="dashboard-nine.html" class="nav-sub-link active">Campaign Monitoring</a>
      <a href="dashboard-ten.html" class="nav-sub-link">Product Management</a> -->
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Apps &amp; Pages</a>
    <nav class="nav-sub">
      <a href="app-mail.html" class="nav-sub-link">Mailbox</a>
      <a href="app-chat.html" class="nav-sub-link">Chat</a>
      <a href="app-calendar.html" class="nav-sub-link">Calendar</a>
      <a href="app-contacts.html" class="nav-sub-link">Contacts</a>
      <a href="page-profile.html" class="nav-sub-link">Profile</a>
      <a href="page-invoice.html" class="nav-sub-link">Invoice</a>
      <a href="page-signin.html" class="nav-sub-link">Sign In</a>
      <a href="page-signup.html" class="nav-sub-link">Sign Up</a>
      <a href="page-404.html" class="nav-sub-link">Page 404</a>
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i>UI Elements</a>
    <nav class="nav-sub">
      <a href="elem-accordion.html" class="nav-sub-link">Accordion</a>
      <a href="elem-alerts.html" class="nav-sub-link">Alerts</a>
      <a href="elem-buttons.html" class="nav-sub-link">Buttons</a>
      <a href="elem-cards.html" class="nav-sub-link">Cards</a>
      <a href="elem-icons.html" class="nav-sub-link">Icons</a>
      <a href="elem-modals.html" class="nav-sub-link">Modals</a>
      <a href="elem-navigation.html" class="nav-sub-link">Navigation</a>
      <a href="elem-pagination.html" class="nav-sub-link">Pagination</a>
      <a href="elem-tooltip.html" class="nav-sub-link">Tooltip</a>
      <a href="elem-popover.html" class="nav-sub-link">Popover</a>
      <a href="elem-progress.html" class="nav-sub-link">Progress</a>
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i>Forms</a>
    <nav class="nav-sub">
      <a href="form-elements.html" class="nav-sub-link">Form Elements</a>
      <a href="form-layouts.html" class="nav-sub-link">Form Layouts</a>
      <a href="form-validation.html" class="nav-sub-link">Form Validation</a>
      <a href="form-wizards.html" class="nav-sub-link">Form Wizards</a>
      <a href="form-editor.html" class="nav-sub-link">WYSIWYG Editor</a>
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Charts</a>
    <nav class="nav-sub">
      <a href="chart-morris.html" class="nav-sub-link">Morris Charts</a>
      <a href="chart-flot.html" class="nav-sub-link">Flot Charts</a>
      <a href="chart-chartjs.html" class="nav-sub-link">ChartJS</a>
      <a href="chart-sparkline.html" class="nav-sub-link">Sparkline</a>
      <a href="chart-peity.html" class="nav-sub-link">Peity</a>
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-map"></i>Maps</a>
    <nav class="nav-sub">
      <a href="map-google.html" class="nav-sub-link">Google Maps</a>
      <a href="map-leaflet.html" class="nav-sub-link">Leaflet</a>
      <a href="map-vector.html" class="nav-sub-link">Vector Maps</a>
    </nav>
  </li><!-- nav-item -->
  <li class="nav-item">
    <a href="" class="nav-link with-sub"><i class="typcn typcn-tabs-outline"></i>Tables</a>
    <nav class="nav-sub">
      <a href="table-basic.html" class="nav-sub-link">Basic Tables</a>
      <a href="table-data.html" class="nav-sub-link">Data Tables</a>
    </nav>
  </li><!-- nav-item -->
</ul><!-- nav -->