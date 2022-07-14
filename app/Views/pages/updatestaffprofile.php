
<?= $this->extend('layouts/admindashboard') ?>

<?= $this->section('styles') ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
   
    <!-- <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css"> -->

    <link href="<?= base_url() ?>/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/flatpickr.min.css" rel="stylesheet" type="text/css">
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

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/plugins/dropify/dropify.min.css">
    <link href="<?= base_url() ?>/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL STYLES -->
<?= $this->endSection() ?>

<?= $this->section('mainnav') ?>
    <?= $this->include('partials/mainnav') ?>
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    <?= $this->include('partials/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('partials/updatestaffprofile') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?= base_url() ?>/assets/js/scrollspyNav.js"></script>
    <script src="<?= base_url() ?>/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url() ?>/plugins/noUiSlider/nouislider.min.js"></script>
    <script src="<?= base_url() ?>/plugins/flatpickr/custom-flatpickr.js"></script>
<!--     <script src="plugins/flatpickr/flatpickr4.6.9.js"></script>
    <script src="plugins/flatpickr/init.js"></script>
    <script src="plugins/flatpickr/application.js"></script>
    <script src="plugins/flatpickr/theme.js"></script>    
    <script src="plugins/flatpickr/index.js"></script> -->
    <script>
        var f3 = flatpickr(document.getElementById('rangeCalendarFlatpickr'), {
            mode: "range"
        });
    </script>
    <script>
        var f5 = flatpickr(document.getElementById('basicFlatpickr1'));
    </script>
  <!--   <script type="text/javascript">
        var f6 = flatpickr(document.getElementById('monthSelectPlugin'),
    </script> -->

    <script src="<?= base_url() ?>/plugins/noUiSlider/custom-nouiSlider.js"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>
    <script src="<?= base_url() ?>/plugins/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10 
        });
    </script>
    <script src="<?= base_url() ?>/plugins/dropify/dropify.min.js"></script>
    <script src="<?= base_url() ?>/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/users/account-settings.js"></script>

<!--     <script>        
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()

        var Webflow = Webflow || [];
        Webflow.push(function () {
            document.getElementsByClassName('date').flatpickr({
                mode: "range"
            });
        });
    </script> -->
    <!-- END PAGE LEVEL SCRIPTS -->
<?= $this->endSection() ?>