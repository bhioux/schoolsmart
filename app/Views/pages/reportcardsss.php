<?= $this->extend('layouts/admindashboard') ?>

<?= $this->section('styles') ?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url() ?>/assets/css/elements/miscellaneous.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/forms/theme-checkbox-radio.css">
    <link href="<?= base_url() ?>/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
<?= $this->endSection() ?>

<?= $this->section('mainnav') ?>
    <?= $this->include('partials/mainnav') ?>
<?= $this->endSection() ?>

<?= $this->section('header') ?>
    <?= $this->include('partials/header') ?>
<?= $this->endSection() ?>

<?= $this->section('title') ?>
    <?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('partials/reportcardsss') ?>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?= base_url() ?>/assets/js/scrollspyNav.js"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
<?= $this->endSection() ?>