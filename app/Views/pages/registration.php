
<?= $this->extend('layouts/admindashboard') ?>

<?= $this->section('styles') ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
   
    <link href="<?= base_url() ?>/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/plugins/bootstrap-select/bootstrap-select.min.css">
    <link href="<?= base_url() ?>/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->
<?= $this->endSection() ?>

<?= $this->section('mainnav') ?>
    <?= $this->include('partials/mainnav') ?>
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    <?= $this->include('partials/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div id="notifier"></div>
    <?= $this->include('partials/registration') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?= base_url() ?>/assets/js/scrollspyNav.js"></script>
    <script src="<?= base_url() ?>/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url() ?>/plugins/noUiSlider/nouislider.min.js"></script>
    <script src="<?= base_url() ?>/plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="<?= base_url() ?>/plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>
    <script src="<?= base_url() ?>/plugins/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>/plugins/table/datatable/datatables.js"></script>
    <script>
        
    </script>

    <script>        
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script src="<?= base_url() ?>/scripts/registration.js"></script>
    <script>
        
            
            // `studentid`, `passport`, `surname`, `othernames`, `dob`, `class`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `mothername`, `motheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup`, `last_updated`

           
            
            

            // $("#btnsubmit").click(function(e){
            //     e.preventDefault();
            //     console.log("Safe here");
            // })

            
       
    </script>

<?= $this->endSection() ?>