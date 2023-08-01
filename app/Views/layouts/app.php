<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?? 'Prakerin - SPK SAW' ?></title>
    <style>
        #wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            flex: 1 0 100%;
        }
    </style>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css') ?>">
    <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition sidebar layout-fixed">
    <div class="wrapper">
        <?= $this->include('layouts/partial/top_menu'); ?>
        <?= $this->include('layouts/partial/side_menu'); ?>
        <div class="content-wrapper">
            <div class="content-header"></div>
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection("body") ?>
                </div>
            </section>
        </div>
    </div>

    <script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
    <?= $this->renderSection('js'); ?>
</body>

</html>