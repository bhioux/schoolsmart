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
        <meta name="description" content="FEDERAL UNIVERSITY OF TECHNOLOGY AKURE PRIMARY SCHOOL">
        <meta name="author" content="ADEOLU BLESSING OLANIYAN">

        <title>FUTA PRIMARY SCHOOL</title>

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
        <!-- <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/loader.js"></script> -->

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

    </head>
    <body class="form">                    
                
                <!--  BEGIN CONTENT AREA  -->       
                    <?= $this->renderSection("content") ?>
                    

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="assets/js/libs/jquery.validate.js"></script>
        <script src="assets/js/libs/additional-methods.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- END GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/authentication/form-2.js"></script>
    </body>
</html>
