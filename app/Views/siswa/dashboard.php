<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="card card-default">
    <div class="card-header">Selamat Datang, <?= session()->get('name') ?></div>
</div>

<?= $this->endSection() ?>