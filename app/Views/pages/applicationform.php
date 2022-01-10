
<?= $this->extend('layouts/admindashboard') ?>

<?= $this->section('styles') ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
   
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    
    <!-- END PAGE LEVEL STYLES -->
<?= $this->endSection() ?>

<?= $this->section('mainnav') ?>
    <?= $this->include('partials/mainnav') ?>
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    <?= $this->include('partials/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('partials/applicationform') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/flatpickr/flatpickr.js"></script>
    <script src="plugins/noUiSlider/nouislider.min.js"></script>
    <script src="plugins/flatpickr/custom-flatpickr.js"></script>
    <script src="plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <script>        
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
<?= $this->endSection() ?>