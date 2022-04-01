<?php
   //var_dump($_SESSION['studentview']); exit;
    $menu = $_SESSION['menu'] ?? [];

    function mapMenu($subj, $code){
        foreach($subj as $grade){
           if(in_array($code, $grade)){
             return (object)$grade;
           }
         }
         return false;
      }
      //$engrec = mapSubjects($gradebook, "ENG");
?>
<nav id="sidebar">

    <ul class="navbar-nav theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="/">
                <img src="<?= base_url() ?>/assets/img/Logo - 90x90.png" class="navbar-logo" alt="logo">
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="/" class="nav-link"> FUTA SEC</a>
        </li>
    </ul>

    <!-- <ul class="navbar-nav theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="index.html">
                <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="index.html" class="nav-link"> CORK </a>
        </li>//
    </ul> -->

    <ul class="list-unstyled menu-categories" id="accordionExample">
        <!-- <li class="menu active">
            <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span>Dashboard</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                <li>
                    <a href="<?= site_url('student/studentprofile') ?>"> My Profile </a>
                </li>
            </ul>
        </li> -->

        <?php
            if(isset($_SESSION['category']) && strtoupper($_SESSION['category'])=="STUDENT"){
        ?>
        <li class="menu active">
            <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span><?= strtoupper($_SESSION['category']) ?></span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                <?php
                if(isset($menu) && sizeof($menu)>0){
                    foreach($menu as $link){
                ?>
                <li>
                    <a href="<?= site_url($link->menuroute) ?>" title="<?= $link->menudescription ?>"> <?= $link->menutitle ?> </a>
                </li>
                <?php
                    }
                }
                    
                ?>
            </ul>
        </li>
        <?php
            }
        ?>
        <?php
            if(isset($_SESSION['category']) && strtoupper($_SESSION['category'])=="STAFF"){
        ?>
        <li class="menu active">
            <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span><?= strtoupper($_SESSION['category']) ?></span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                <?php
                if(isset($menu) && sizeof($menu)>0){
                    foreach($menu as $link){
                ?>
                <li>
                    <a href="<?= site_url($link->menuroute) ?>" title="<?= $link->menudescription ?>"> <?= $link->menutitle ?> </a>
                </li>
                <?php
                    }
                }
                    
                ?>
            </ul>
        </li>
        <?php
            }
        ?>

<?php
            if(isset($_SESSION['category']) && strtoupper($_SESSION['category'])=="ADMIN"){
        ?>
        <li class="menu active">
            <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <span><?= strtoupper($_SESSION['category']) ?></span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                <?php
                if(isset($menu) && sizeof($menu)>0){
                    foreach($menu as $link){
                ?>
                <li>
                    <a href="<?= site_url($link->menuroute) ?>" title="<?= $link->menudescription ?>"> <?= $link->menutitle ?> </a>
                </li>
                <?php
                    }
                }
                    
                ?>
            </ul>
        </li>
        <?php
            }
        ?>

        <!-- <li class="menu">
            <a href="" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    <span>Application Form</span>
                </div>
            </a>
        </li> -->

        <li class="menu">
            <a href="<?= site_url("/logout") ?>" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="user user-account"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    <span>Logout</span>
                </div>
            </a>
        </li>

        
    </ul>
</nav>

        
