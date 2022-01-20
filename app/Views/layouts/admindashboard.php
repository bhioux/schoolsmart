<?php $pathcss = $pathjs = base_url()."/"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <!-- Required meta tags -->

        <!-- Meta -->
        <meta name="description" content="FEDERAL UNIVERSITY OF TECHNOLOGY AKURE ENHANCED STAFF VEHICLE REGISTRATION">
        <meta name="author" content="ADEOLU BLESSING OLANIYAN">

        <title>FUTA PRIMARY SCHOOL</title>
        
        <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/favicon.png"/>
        <link href="<?= base_url() ?>/assets/css/loader.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url() ?>/assets/js/loader.js"></script>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>/assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="<?= base_url() ?>/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link href="<?= base_url() ?>/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/forms/theme-checkbox-radio.css">
        <link href="<?= base_url() ?>/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL CUSTOM STYLES -->
        <!--  END CUSTOM STYLE FILE  -->
        <?= $this->renderSection("style"); ?>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="<?= base_url() ?>/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
       
        <?= $this->renderSection("styles"); ?>
    </head>
   
    <body class="alt-menu sidebar-noneoverflow">
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
            </div></div></div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        <div class="header-container fixed-top">
            <?= $this->renderSection("header"); ?>                    
        </div>
        <!--  END NAVBAR  -->
        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container sidebar-closed sbar-open" id="container">

            <div class="overlay"></div>
            <div class="cs-overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">   
                <?= $this->renderSection("mainnav"); ?>
            </div>
            <!--  END SIDEBAR  -->
                
            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">                   
                    <?= $this->renderSection("content") ?>
                </div>
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->

        
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="<?= base_url() ?>/assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/libs/jquery.validate.js"></script>
        <script src="<?= base_url() ?>/assets/js/libs/additional-methods.js"></script>
        <script src="<?= base_url() ?>/bootstrap/js/popper.min.js"></script>
        <script src="<?= base_url() ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="<?= base_url() ?>/assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="<?= base_url() ?>/plugins/apex/apexcharts.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/dashboard/dash_1.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        

    </body>
    <?= $this->renderSection("script"); ?>
</html>
