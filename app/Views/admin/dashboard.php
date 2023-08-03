<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Admin Dashboard</div>
            <div class="panel-body">
                <h1>Hello, <?= session()->get('name') ?></h1>
                <!-- <h3><a href="<?= site_url('logout') ?>">Logout</a></h3> -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-secret"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">10</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3"> <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Siswa</span>
                <span class="info-box-number">500</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3"> <span class="info-box-icon bg-success elevation-1"><i class="fas fa-school"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">DU/DI</span>
                <span class="info-box-number">56</span>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>