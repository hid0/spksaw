<?= $this->extend("layouts/auth") ?>

<?= $this->section("body") ?>
<div class="login-box">
    <div class="login-logo">
        <a href=""><img src="<?= base_url('img/logo-smk.webp') ?>" alt="Logo SMK" srcset="Logo SMK"></a>
    </div>
    <div class="heroe">

        <h4>
            <center>
                Sistem Rekomendasi Siswa untuk Penempatan Prakerin
                <h4>SMK Walisongo Pecangaan</h4>
            </center>
        </h4>

    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form class="" action="<?= base_url('login') ?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <center><button type="submit" class="btn btn-success"> Login </button></center>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="" action="<?= base_url('login') ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?= $this->endSection() ?>